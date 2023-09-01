<?php

declare(strict_types=1);

namespace App\Core\Models\Transaksi;

use Ramsey\Uuid\Uuid;

class TransaksiId
{
    private $id;

    public function __construct(string $id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function equals(TempatId $TempatId): bool
    {
        return $this->id === $TempatId->id;
    }
}
