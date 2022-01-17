<?php
declare(strict_types=1);

namespace Jokes\Joke\Domain;

final class Joke
{
    private JokeContent $content;

    public function __construct(JokeContent $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content->getContent();
    }
}