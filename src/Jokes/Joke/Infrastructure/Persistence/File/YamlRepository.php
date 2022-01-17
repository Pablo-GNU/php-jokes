<?php
declare(strict_types=1);

namespace Jokes\Joke\Infrastructure\Persistence\File;

use Jokes\Joke\Domain\Joke;
use Jokes\Joke\Domain\JokeContent;
use Jokes\Joke\Domain\JokeNoFIleException;
use Jokes\Joke\Domain\JokeNoJokeConfiguredException;
use Jokes\Joke\Domain\JokeNoJokeIndexException;
use Jokes\Joke\Domain\JokeRepositoryInterface;

class YamlRepository implements JokeRepositoryInterface
{

    private string $path;

    private array $jokes;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->readJokes();
    }

    private function readJokes()
    {
        if(!is_file($this->path)){
            throw new JokeNoFIleException("Your jokes file dont exist");
        }

        $fileContent = yaml_parse_file($this->path);

        if(!array_key_exists('jokes', $fileContent)){
            throw new JokeNoJokeIndexException("Your jokes file dont have \"jokes\" index");
        }

        $this->jokes = $fileContent['jokes'] ?? [];

    }

    public function getRandomJoke(): Joke
    {
        if(empty($this->jokes)){
            throw new JokeNoJokeConfiguredException("You dont have any joke.sh configured");
        }

        return (new Joke(
            new JokeContent($this->jokes[random_int(0, count($this->jokes)-1)])
        ));
    }

    public function findJoke(int $id): ?Joke
    {
        if(!array_key_exists($id, $this->jokes)){
            return null;
        }

        return (new Joke(
            new JokeContent($this->jokes[$id])
        ));
    }
}