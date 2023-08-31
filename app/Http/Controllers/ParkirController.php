<?php

namespace App\Http\Controllers;

use App\Application\Query\ListParkirQuery\ListParkirQueryInterface;

class ParkirController extends Controller
{

    public function __construct(
        private ListParkirQueryInterface $listparkirQuery
    )
    {
    }
    public function search($nama)
    {

        $tempat = $this->listparkirQuery->execute($nama);


        if (!$tempat) {
            return response()->json("Tempat tidak ditemukan", 501);
        }
        return response()->json($tempat, 200);
    }
}
