<?php
declare(strict_types=1);

namespace App\Model\ValueObject;

final class NonEmpty
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
