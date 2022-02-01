<?php

declare(strict_types=1);

namespace App\Joke;

include_once __DIR__.'/../vendor/autoload.php';

use Jokes\Joke\Application\JokeReader;
use Jokes\Joke\Domain\JokeNoFIleException;
use Jokes\Joke\Domain\JokeNoJokeConfiguredException;
use Jokes\Joke\Infrastructure\Persistence\File\YamlRepository;

try{
    $jokeRepository = new YamlRepository(__DIR__.'/../config/jokes.yml');
} catch (JokeNoFIleException $e){
    echo $e->getMessage().PHP_EOL;
    exit(1);
}

try {
    $jokeReader = new JokeReader($jokeRepository);
    $joke = $jokeReader();
    echo $joke->content()->value().PHP_EOL;
}catch (JokeNoJokeConfiguredException $e){
    echo $e->getMessage().PHP_EOL;
    exit(1);
}

exit(0);