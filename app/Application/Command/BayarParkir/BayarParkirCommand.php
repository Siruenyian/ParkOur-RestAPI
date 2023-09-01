<?php

namespace App\Application\Command\BayarParkir;

use App\Application\Command\CariParkir\CariParkirRequest;
use App\Core\Models\Tempat\TempatId;
use App\Core\Models\Transaksi\Transaksi;
use App\Core\Models\Transaksi\TransaksiId;
use App\Core\Repository\TempatRepositoryInterface;
use App\Core\Repository\TransaksiRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DateTime;
use DateTimeZone;
use InvalidArgumentException;

class BayarParkirCommand
{
    public function __construct(
        private TempatRepositoryInterface $tempatRepository,
        private TransaksiRepositoryInterface $transaksiRepository
    ) { }
    public function execute(BayarParkirRequest $request): void
    {
//        TODO: Implement bayar
        Log::debug('Bayar dl.');
        $transaksi = $this->transaksiRepository->byId(new transaksiId($request->transaksiId));
        if (!$transaksi) throw new InvalidArgumentException("transaksi tidak ditemukan");
        //add safety kalo bayar udah true
        //TODO: create new transaction
        DB::beginTransaction();
        try {
            $updatedTransaksi=$transaksi->SelesaiParkir();
            $this->transaksiRepository->update($updatedTransaksi);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
    }
}
