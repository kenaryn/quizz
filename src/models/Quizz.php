<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Quizz
{
  public function __construct(private string $title = 'No title choosen', private QuestionCollection $questions = new QuestionCollection())
  {
    $this->title = $title;
    $this->questions = $questions;
  }

  public function getTitle(): string
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
