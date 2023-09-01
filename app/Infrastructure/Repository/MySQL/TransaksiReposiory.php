<?php

namespace App\Infrastructure\Repository\MySQL;
use App\Core\Models\Tempat\Tempat;
use App\Core\Models\Tempat\TempatId;
use App\Core\Repository\TransaksiRepositoryInterface;
use App\Core\Models\Transaksi\Transaksi;
use App\Core\Models\Transaksi\TransaksiId;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
class TransaksiReposiory implements TransaksiRepositoryInterface
{

    public function byId(TransaksiId $id): ?Transaksi
    {
        // TODO: Implement byId() method.
        $row = DB::table('transaksi')->where('id_transaksi', $id->id())->first();
        if (!$row) return null;
        $row_tempat = DB::table('tempat')->where('id_tempat', $row->id_tempat)->first();
        if (!$row_tempat) return null;

        $tempat=new Tempat(new TempatId($row_tempat->id_tempat),
        $row_tempat->nama, $row_tempat->alamat, $row_tempat->latitude, $row_tempat->longitude, $row_tempat->price_mobil, $row_tempat->price_motor);

        return new Transaksi(new TransaksiId($row->id_transaksi),
            $tempat, $row->plat_nomor, new DateTime($row->tgl_masuk, new DateTimeZone("Asia/Jakarta")), new DateTime($row->tgl_keluar, new DateTimeZone("Asia/Jakarta")), $row->jenis_kendaraan, $row->biaya,$row->status_bayar);
    }

    public function byDate(DateTime $dateTime): ?array
    {
        // TODO: Implement byDate() method.
        return null;
    }

    public function save(Transaksi $transaksi): void
    {
        // TODO: Implement save() method.
        $payload = $this->constructPayloadWithoutIdAndTime($transaksi);
        $payload['id_transaksi'] = $transaksi->getId()->id();
        $payload['tgl_masuk'] = new DateTime('now', new DateTimeZone("Asia/Jakarta"));
        DB::table('transaksi')->insert($payload);

    }

    public function update(Transaksi $transaksi): void
    {
        // TODO: Implement update() method.
        $payload=[];
        $payload['tgl_keluar'] = new DateTime('now', new DateTimeZone("Asia/Jakarta"));
        $payload['biaya'] = $transaksi->getBiaya();
        $payload['status_bayar'] = $transaksi->getStatusBayar();
        DB::table('transaksi')
            ->where('id_transaksi', $transaksi->getId()->id())
            ->update($payload);
    }


    private function constructPayloadWithoutIdAndTime(Transaksi $transaksi)
    {
//        $table->uuid('id_transaksi')->primary();
//        $table->string('plat_nomor');
//        $table->dateTime('tgl_masuk');
//        $table->dateTime('tgl_keluar')->nullable();
//        $table->string('jenis_kendaraan');
//        $table->integer('biaya')->nullable();
//        $table->boolean('status_bayar')->default(false);;
//        $table->uuid('id_tempat');
//        $table->foreign('id_tempat')->references('id_tempat')->on('tempat')->onUpdate('cascade');;

        return [
            "plat_nomor" => $transaksi->getPlatNomor(),
            "jenis_kendaraan" => $transaksi->getJenisKendaraan(),
            "id_tempat" => $transaksi->getTempat()->getId()->id(),

        ];
    }
}
