<?php

declare(strict_types=1);

namespace App\Core\Models\Tempat;

class Tempat
{
    private TempatId $id;

    /**
     * @return TempatId
     */
    public function getId(): TempatId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNama(): string
    {
        return $this->nama;
    }

    /**
     * @return string
     */
    public function getAlamat(): string
    {
        return $this->alamat;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return int
     */
    public function getPriceMobil(): int
    {
        return $this->priceMobil;
    }

    /**
     * @return int
     */
    public function getPriceMotor(): int
    {
        return $this->priceMotor;
    }

    /**
     * @param int $priceMobil
     */
    public function setPriceMobil(int $priceMobil): void
    {
        $this->priceMobil = $priceMobil;
    }

    /**
     * @param int $priceMotor
     */
    public function setPriceMotor(int $priceMotor): void
    {
        $this->priceMotor = $priceMotor;
    }

    private string $nama;
    private string $alamat;
    private float $latitude;
    private float $longitude;
    private int $priceMobil;
    private int $priceMotor;




    /**
     * @param TempatId $id
     * @param string $nama
     * @param string $alamat
     * @param float $latitude
     * @param float $longitude
     * @param int $priceMobil
     * @param int $priceMotor
     */
    public function __construct(TempatId $id, string $nama, string $alamat, float $latitude, float $longitude, int $priceMobil, int $priceMotor)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->priceMobil = $priceMobil;
        $this->priceMotor = $priceMotor;
    }


}
