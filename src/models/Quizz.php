<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Quizz
{
  // public function __construct(readonly private string $title = 'No title choosen', private ?QuestionCollection $questions)
  public function __construct(readonly private string $title = 'No title choosen', private QuestionCollection $questions = new CollectionQuestion())
  {
    $this->title = $title;
    $this->questions = $questions;
  }

  public function __get(string $title): string
  {
    return $this->title;
  }

  public function getQuestion(): QuestionCollection
  {
    return $this->questions;
  }

  public function addQuestion(Question $question): void
  {
    $this->questions[] = $question;
  }

  public static function create(mixed $jsonObject): Quizz
  {
    $res = new Quizz();
    return $res;
  }
}
