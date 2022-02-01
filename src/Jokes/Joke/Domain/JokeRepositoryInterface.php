<?php

declare(strict_types=1);

namespace Jokes\Joke\Domain;

interface JokeRepositoryInterface {
    public function getRandomJoke(): ?Joke;
}