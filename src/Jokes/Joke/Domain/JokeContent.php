<?php
declare(strict_types=1);

namespace Jokes\Joke\Domain;

final class JokeContent
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}