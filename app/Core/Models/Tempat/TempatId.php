<?php

declare(strict_types=1);

namespace App\Core\Models\Tempat;

use Ramsey\Uuid\Uuid;

class TempatId
{
    private $id;

    public function __construct(string $id)
    {
        if (Uuid::isValid($id)) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException("Invalid TempatId format.");
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    /**
     * @param TempatId $TempatId
     * @return bool
     */
    public function equals(TempatId $TempatId): bool
    {
        return $this->id === $TempatId->id;
    }
}
