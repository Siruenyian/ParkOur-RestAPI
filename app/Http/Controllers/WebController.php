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
use App\Infrastructure\Query\MySQL\DisplayTempatDetailQuery;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function __construct(
        private CariTempatQueryInterface $cariTempatQuery,
        private DisplayTempatDetailQuery $displayTempatDetailQuery,
        private DisplayTempatQuery $displayTempatQuery,

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
        return response()->json($tempat, 200);
    }

    public function DisplayTempat()
    {

        $tempat = $this->displayTempatQuery->execute();

        if (!$tempat) {
            return "Tidak ada tempat";
        }
        return view('displaytempat',["tempat"=>$tempat]);
    }

    public function DisplayTempatDetail($id)
    {
        $tempatdetail = $this->displayTempatDetailQuery->execute($id);
        if (!$tempatdetail) {
            return "Tidak ada tempat";
        }
        return view('displaytempatdetail',["tempatdetail"=>$tempatdetail]);
    }
    public function AdminDashboard()
    {
        $user = Auth::user();
        //could be better but this will do for now
        $tempat = $this->displayTempatQuery->execute();
        $tempatdetail=[];
        foreach ($tempat as $value) {
            $tempatdetail[] = $this->displayTempatDetailQuery->execute($value->id_tempat);
            if (!$tempatdetail) {
                return "Tidak ada tempat";
            }
        }
        if (!$tempat) {
            return "Tidak ada tempat";
        }

        return view('admin.dashboard',["user"=>$user,"tempat"=>$tempatdetail]);
    }
    public function UserDashboard($id)
    {
        $user = Auth::user();
        $tempatdetail = $this->displayTempatDetailQuery->execute($id);
        if (!$tempatdetail) {
            return "Tidak ada tempat";
        }
//        this part violates cqrs, but I dont have time
        $sql="SELECT COUNT(plat_nomor) AS cnt FROM transaksi
                WHERE id_tempat=:id";
        $count = DB::selectOne($sql, [
            'id' => $id,
        ]);
        if (!$count) {
            return null;
        }
        return view('user.dashboard',["user"=>$user,"tempatdetail"=>$tempatdetail, "totaltransaction"=>$count->cnt]);
    }

}
