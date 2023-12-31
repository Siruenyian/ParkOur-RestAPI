<?php

declare(strict_types=1);

namespace App\Core\Models\Parkir;
use App\Core\Models\Tempat\Tempat;
use App\Core\Models\Transaksi\Transaksi;
use InvalidArgumentException;

class Parkir
{
    private int $lantai;
    private int $availMobil;
    private int $availMotor;
    private int $maxMobil;
    private Tempat $tempat;
    /**
     * @return int
     */
    public function getLantai(): int
    {
        return $this->lantai;
    }

    /**
     * @return int
     */
    public function getAvailMobil(): int
    {
        return $this->availMobil;
    }

    /**
     * @return int
     */
    public function getAvailMotor(): int
    {
        return $this->availMotor;
    }

    /**
     * @return int
     */
    public function getMaxMobil(): int
    {
        return $this->maxMobil;
    }

    /**
     * @return int
     */
    public function getMaxMotor(): int
    {
        return $this->maxMotor;
    }
    private int $maxMotor;

    /**
     * @param int $lantai
     * @param int $availMobil
     * @param int $availMotor
     * @param int $maxMobil
     * @param int $maxMotor
     */
    public function __construct(int $lantai, int $availMobil, int $availMotor, int $maxMobil, int $maxMotor, Tempat $tempat)
    {
        $this->lantai = $lantai;
        $this->availMobil = $availMobil;
        $this->availMotor = $availMotor;
        $this->maxMobil = $maxMobil;
        $this->maxMotor = $maxMotor;
        $this->tempat=$tempat;
    }
    public function DecreaseAvailability($jenisKendaraan){
        if ($jenisKendaraan!=Transaksi::MOBIL & $jenisKendaraan!=Transaksi::MOTOR) {
            throw new InvalidArgumentException('jenis_kendaraan_tidak_sesuai');
        }
        switch ($jenisKendaraan) {
            case Transaksi::MOBIL:
                $this->availMobil-=1;
                break;
            case Transaksi::MOTOR:
                $this->availMotor-=1;
                break;
            default:
                $variabel=3000;
        }
    }
}
