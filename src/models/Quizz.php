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

  public static function create($jsonObject): Quizz
  {

    $obj = new Quizz($jsonObject->title);
    foreach ($jsonObject->questions as $k => $v) {
      $question = new Question($v->text);
      foreach ($v->responses as $key => $r) {
        $response = new Response($r->text,$r->isValid);
        $question->addResponse($response);
      }
      $obj->addQuestion($question);
    }
    return $obj;
  }
}
