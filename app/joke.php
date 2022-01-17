<?php

declare(strict_types=1);

namespace App\Joke;

include_once __DIR__.'/../vendor/autoload.php';

//use Garden\Cli\Cli;

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

//$cli = new Cli();
//
//$cli->description('Read some Jokes.')
//    ->opt('create:c', 'Create a Joke.', false)
//    ->opt('read:r', 'Read a Joke.', false, 'integer')
//    ->opt('update:u', 'Update a Joke.', false, 'integer')
//    ->opt('delete:d', 'Delete a Joke.', false,'integer');
//
//// Parse and return cli args.
//$args = $cli->parse($argv, true);

try {
    $jokeReader = new JokeReader($jokeRepository);
    $joke = $jokeReader->getJoke();
    echo $joke->getContent().PHP_EOL;
}catch (JokeNoJokeConfiguredException $e){
    echo $e->getMessage().PHP_EOL;
    exit(1);
}
exit(0);