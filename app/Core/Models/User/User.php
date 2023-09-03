<?php

declare(strict_types=1);

namespace App\Core\Models\User;
use App\Core\Models\Tempat\Tempat;
use App\Core\Models\Transaksi\Transaksi;
use App\Core\Models\Transaksi\TransaksiId;
use InvalidArgumentException;

class User
{
    private UserId $id;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return TransaksiId
     */
    public function getTransaksiId(): TransaksiId
    {
        return $this->transaksiId;
    }
    private string $username;
    private TransaksiId $transaksiId;

    /**
     * @param string $username
     * @param TransaksiId $transaksiId
     */
    public function __construct(string $username, TransaksiId $transaksiId)
    {
        $this->username = $username;
        $this->transaksiId = $transaksiId;
    }

}
