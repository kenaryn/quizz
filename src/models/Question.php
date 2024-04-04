<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Question
{
  public function __construct(readonly protected string $title, protected string $contents)
  {
    $this->title = $title;
    $this->contents = $contents;
  }

  public function __get(string $property): string
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    } else {
      throw new \Exception("That property exists not!");
    }
  }
}
