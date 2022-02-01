<?php
declare(strict_types=1);

namespace Jokes\Joke\Domain;

final class JokeContent
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}