<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Question
{
  public function __construct(readonly protected string $title, protected ResponseCollection $responses = new ResponseCollection())
  {
    $this->title = $title;
    $this->responses = $responses;
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
