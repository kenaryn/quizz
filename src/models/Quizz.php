<?php

namespace Entities\Quizz;

class Quizz
{
  public function __construct(readonly private string $title = 'No title choosen', private QuestionCollection $questions)
  {
    $this->title = $title;
    $this->questions = $questions;
  }

  public function __get(string $title): string
  {
    return $this->title;
  }
}
