<?php

declare(strict_types=1);

namespace App\Core\Models\Transaksi;
use App\Core\Models\Tempat\Tempat;
use InvalidArgumentException;
use DateTime;
class Transaksi
{
    private TransaksiId $id;
    /**
     * @return TransaksiId
     */
    public function getId(): TransaksiId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPlatNomor(): string
    {
        return $this->platNomor;
    }

    /**
     * @return DateTime
     */
    public function getTglMasuk(): DateTime
    {
        return $this->tglMasuk;
    }

    /**
     * @return DateTime
     */
    public function getTglKeluar(): DateTime
    {
        return $this->tglKeluar;
    }

    /**
     * @return string
     */
    public function getJenisKendaraan(): string
    {
        return $this->jenisKendaraan;
    }

    /**
     * @return int
     */
    public function getBiaya(): int
    {
        return $this->biaya;
    }

    private string $platNomor;
    private DateTime $tglMasuk;
    private DateTime $tglKeluar;
    private string $jenisKendaraan;
    private int $biaya;
    const MOBIL = 'MOBIL';
    const MOTOR = 'MOTOR';
    private Tempat $tempat;
    /**
     * @param TransaksiId $id
     * @param string $platNomor
     * @param DateTime $tglMasuk
     * @param ?DateTime $tglKeluar
     * @param string $jenisKendaraan
     * @param int $biaya
     */
    public function __construct(TransaksiId $id, Tempat $tempat,string $platNomor, DateTime $tglMasuk, ?DateTime $tglKeluar, string $jenisKendaraan)
    {
        $this->id = $id;
        $this->platNomor = $platNomor;
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
        $this->tempat = $tempat;
        if ($jenisKendaraan!=self::MOBIL & $jenisKendaraan!=self::MOTOR) {
            throw new InvalidArgumentException('jenis_kendaraan_tidak_sesuai');
        }
        $this->jenisKendaraan = $jenisKendaraan;
        $this->biaya=0;
    }
    private function differenceInHours($starttimestamp,$endtimestamp){
        $difference = abs(($endtimestamp - $starttimestamp)/3600);
        return $difference;
    }

    //    free parking.png
    //    Langsung auto selesai
    public function SelesaiParkir(): int
    {

        switch ($this->jenisKendaraan) {
            case self::MOBIL:
                $harga=$this->tempat->getPriceMobil();
            break;
            case self::MOTOR:
                $harga=$this->tempat->getPriceMotor();
            break;
            default:
                $harga=3000;
        }

        $this->tglKeluar = new DateTime('now');
        $hours=$this->differenceInHours($this->tglMasuk,$this->tglKeluar);
        //hitung tarif
        if ($hours>2){
            return $harga*$hours;
        }
        return $harga*2;
    }

}
