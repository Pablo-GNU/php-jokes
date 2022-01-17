<?php

declare(strict_types=1);

namespace Jokes\Joke\Application;

use Jokes\Joke\Domain\Joke;
use Jokes\Joke\Domain\JokeNotFound;
use Jokes\Joke\Domain\JokeRepositoryInterface;

class JokeFinder
{
    private JokeRepositoryInterface $repository;

    public function __construct(JokeRepositoryInterface $jokeRepository)
    {
        $this->repository = $jokeRepository;
    }

    public function findJoke(int $id): Joke
    {
        $joke = $this->repository->findJoke($id);

        if(is_null($joke)){
            throw new JokeNotFound("The joke.sh was not found");
        }

        return $joke;
    }

}