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
    public function getTglKeluar(): ?DateTime
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
    public function getBiaya(): ?int
    {
        if($this->statusBayar) {
            return $this->biaya;
        } else {
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
    
            $tglKeluar = new DateTime('now');
            $hours=$this->differenceInHours($this->tglMasuk, $tglKeluar);
            //hitung tarif
            if ($hours>=2){
                $biaya= $harga*$hours;
                return  $biaya;
            }
            return $harga;
        }
    }

    private string $platNomor;
    private DateTime $tglMasuk;
    private ?DateTime $tglKeluar;
    private string $jenisKendaraan;
    private int $lantai;

    /**
     * @return int
     */
    public function getLantai(): int
    {
        return $this->lantai;
    }
    private ?int $biaya;
    const MOBIL = 'MOBIL';
    const MOTOR = 'MOTOR';
    private Tempat $tempat;
    private bool $statusBayar;

    /**
     * @return bool
     */
    public function getStatusBayar(): bool
    {
        return $this->statusBayar;
    }

    /**
     * @return Tempat
     */
    public function getTempat(): Tempat
    {
        return $this->tempat;
    }
    /**
     * @param TransaksiId $id
     * @param string $platNomor
     * @param DateTime $tglMasuk
     * @param ?DateTime $tglKeluar
     * @param string $jenisKendaraan
     * @param int $biaya
     */
    public function __construct(TransaksiId $id, Tempat $tempat,string $platNomor, DateTime $tglMasuk, ?DateTime $tglKeluar,string $jenisKendaraan, int $lantai, ?int $biaya, bool $statusBayar)
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
        $this->lantai= $lantai;
        $this->biaya=$biaya;
        $this->statusBayar=$statusBayar;
    }
    private function differenceInHours($date1,$date2){
        $diff = $date2->diff($date1);

        $hours = $diff->h;
        $hours = $hours + ($diff->days*24);
        return $hours;
    }
    public function cariTempatParkir(){
//        maybe add zona buat panjang array
        $input = array(1, 2, 3, 4, 5);
        $tempat_parkir=$input[array_rand($input)];
        $this->lantai=$tempat_parkir;
    }
    //    free parking.png
    //    Langsung auto selesai
    public function SelesaiParkir(): Transaksi
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
        if ($hours>=2){
            $this->biaya= $harga*$hours;
            return  $this;
        }
        $this->biaya=$harga;
        $this->statusBayar=true;
        return $this;
    }

}
