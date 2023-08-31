<?php

declare(strict_types=1);

namespace App\Core\Models\Transaksi;

use Ramsey\Uuid\Uuid;

class TransaksiId
{
    private $id;

    public function __construct(string $id)
    {
        if (Uuid::isValid($id)) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException("Invalid TransaksiId format.");
        }
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
