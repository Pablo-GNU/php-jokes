<?php
declare(strict_types=1);

namespace Jokes\Joke\Domain;

final class Joke
{

    public function __construct(private JokeContent $content)
    {
    }

    public function content(): JokeContent
    {
        return $this->content;
    }
}