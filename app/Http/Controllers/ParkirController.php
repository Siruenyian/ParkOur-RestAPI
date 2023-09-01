<?php

namespace App\Http\Controllers;

use App\Application\Command\BayarParkir\BayarParkirCommand;
use App\Application\Command\BayarParkir\BayarParkirRequest;
use App\Application\Command\CariParkir\CariParkirCommand;
use App\Application\Command\CariParkir\CariParkirRequest;
use App\Application\Query\ListParkirQuery\ListParkirQueryInterface;
use Exception;
use Illuminate\Http\Request;
class ParkirController extends Controller
{

    public function __construct(
        private ListParkirQueryInterface $listparkirQuery
    )
    {
    }
    // function untuk search gedung, harus exact match ig
    public function CariTempat($nama)
    {

        $tempat = $this->listparkirQuery->execute($nama);


        if (!$tempat) {
            return response()->json("Tempat tidak ditemukan", 501);
        }
        return response()->json($tempat, 200);
    }

//    test with 1530eb83-5619-451a-b2f7-ffec38183a69, ALKSNDAKJ
    public function CariParkir(Request $request, CariParkirCommand $command)
    {
        $tempatId=$request->input('tempatId');;
        $platNomor=$request->input('platNomor');;
        $input = array("1D", "2D", "3D", "4D", "5D");
        //update transaksi table juga
        $tempat_parkir=$input[array_rand($input)];
        $cariparkirRequest = new CariParkirRequest(
            $tempatId, $platNomor
        );
        try {
            //add retrieve id
            $id=$command->execute($cariparkirRequest);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
        return response()->json([$id, $tempat_parkir], 200);
    }
//This is for bayar parkir, jgn salah
    public function BayarParkir(Request $request, BayarParkirCommand $command)
    {
        $transaksiId=$request->input('transaksiId');;
        $platNomor=$request->input('platNomor');;
        $bayarparkirRequest = new BayarParkirRequest(
            $transaksiId,$platNomor
        );
        try {
            $command->execute($bayarparkirRequest);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
        return response()->json("pembayaran sukses", 200);
    }

}
