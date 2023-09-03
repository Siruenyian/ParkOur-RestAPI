<?php

declare(strict_types=1);

namespace App\Core\Models\User;

use Ramsey\Uuid\Uuid;

class UserId
{
    private $id;

    public function __construct(string $id)
    {
        if (Uuid::isValid($id)) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException("Invalid UserId format.");
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    public function equals(UserId $TempatId): bool
    {
        return $this->id === $TempatId->id;
    }
}
