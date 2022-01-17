<?php

declare(strict_types=1);

namespace Jokes\Joke\Application;

use Jokes\Joke\Domain\Joke;
use Jokes\Joke\Domain\JokeRepositoryInterface;

class JokeReader
{
    private JokeRepositoryInterface $repository;

    public function __construct(JokeRepositoryInterface $jokeRepository)
    {
        $this->repository = $jokeRepository;
    }

    public function getJoke(): Joke
    {
        return $this->repository->getRandomJoke();
    }

}