<?php

declare(strict_types=1);

namespace Jokes\Joke\Application;

use Jokes\Joke\Domain\Joke;
use Jokes\Joke\Domain\JokeRepositoryInterface;

class JokeReader
{
    public function __construct(private JokeRepositoryInterface $repository)
    {
    }

    public function __invoke(): Joke
    {
        return $this->repository->getRandomJoke();
    }

}