<?php

namespace App\Application\Command\MasukParkir;

use App\Core\Models\Tempat\TempatId;
use App\Core\Models\Transaksi\Transaksi;
use App\Core\Models\Transaksi\TransaksiId;
use App\Core\Repository\TempatRepositoryInterface;
use App\Core\Repository\TransaksiRepositoryInterface;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Throwable;
use Illuminate\Support\Facades\Log;
class MasukParkirCommand
{
    public function __construct(
        private TempatRepositoryInterface $tempatRepository,
        private TransaksiRepositoryInterface $transaksiRepository
    ) { }
    public function execute(MasukParkirRequest $request): array
    {
        Log::debug('An informational message.');
        $tempat = $this->tempatRepository->byId(new tempatId($request->tempatId));
        if (!$tempat) throw new InvalidArgumentException("tempat tidak ditemukan");
        //TODO: create new transaction

        DB::beginTransaction();
        try {
            $transaksiId=new TransaksiId();
//          TODO: ML Detect kendaraan maybe?
            $jenisKendaraan= Transaksi::MOBIL;
            $newTransaksi = new Transaksi(
                $transaksiId,
                $tempat,
                $request->plat_nomor,
                new DateTime("now", new DateTimeZone("Asia/Jakarta")),
                null,
                $jenisKendaraan,
                0,
                0,
                false
            );
            $newTransaksi->cariTempatParkir();
            //live update Tempat juga, kurangin available
            $this->transaksiRepository->save($newTransaksi);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return [$newTransaksi->getId()->id(), $newTransaksi->getTempat()->getNama(), $newTransaksi->getLantai()];

    }
}
