<?php

namespace App\Http\Controllers;

use App\Application\Command\BayarParkir\BayarParkirCommand;
use App\Application\Command\BayarParkir\BayarParkirRequest;
use App\Application\Command\MasukParkir\MasukParkirCommand;
use App\Application\Command\MasukParkir\MasukParkirRequest;
use App\Application\Query\CariTempatQuery\CariTempatQueryInterface;
use App\Infrastructure\Query\MySQL\DisplayHistoryDetailQuery;
use App\Infrastructure\Query\MySQL\DisplayHistoryQuery;
use App\Infrastructure\Query\MySQL\DisplayTempatQuery;
use Exception;
use Illuminate\Http\Request;
class APIController extends Controller
{

    public function __construct(
        private CariTempatQueryInterface  $cariTempatQuery,
        private DisplayTempatQuery  $displayTempatQuery,
        private DisplayHistoryQuery       $displayHistoryQuery,
        private DisplayHistoryDetailQuery $displayHistoryDetailQuery
    )
    {
    }
    // function untuk search gedung, harus exact match ig
    public function CariTempat($nama)
    {

        $tempat = $this->cariTempatQuery->execute($nama);


        if (!$tempat) {
            return response()->json("Tempat tidak ditemukan", 501);
        }
        return response()->json( [$tempat], 200);
    }

    public function DisplayTempat()
    {

        $tempat = $this->displayTempatQuery->execute();

        if (!$tempat) {
            return response()->json("Tidak ada tempat", 501);
        }
        return response()->json($tempat, 200);
    }

    public function DisplayHistory()
    {

        $history = $this->displayHistoryQuery->execute();

        if (!$history) {
            return response()->json("History tidak ditemukan", 501);
        }
        return response()->json($history, 200);
    }

    public function DisplayHistoryDetail($transaksiId)
    {
        $history = $this->displayHistoryDetailQuery->execute($transaksiId);

        if (!$history) {
            return response()->json("Detail tidak ditemukan", 501);
        }
        return response()->json($history, 200);
    }

//    test with 1530eb83-5619-451a-b2f7-ffec38183a69, ALKSNDAKJ
    public function MasukParkir(Request $request, MasukParkirCommand $command)
    {
        $tempatId=$request->input('tempatId');;
        $platNomor=$request->input('platNomor');;

        $cariparkirRequest = new MasukParkirRequest(
            $tempatId, $platNomor
        );
        try {
            //add retrieve id
            $arrayResult=$command->execute($cariparkirRequest);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
        return response()->json($arrayResult, 200);
    }
//This is for bayar parkir, jgn salah
    public function BayarParkir(Request $request, BayarParkirCommand $command)
    {
        $transaksiId=$request->input('transaksiId');;
        $tempatId=$request->input('tempatId');;
        $bayarparkirRequest = new BayarParkirRequest(
            $transaksiId, $tempatId
        );
        try {
            $command->execute($bayarparkirRequest);
        } catch (Throwable $e) {
//            return back()->withErrors($e->getMessage())->withInput();
            return response()->json("pembayaran gagal", 500);
        }
        return response()->json("pembayaran sukses", 200);
    }

}
