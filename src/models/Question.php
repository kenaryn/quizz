<?php

declare(strict_types=1);

namespace Entities\Quizz;

final class Question
{
  public function __construct(protected string $text, protected int $id = 0, protected ResponseCollection $responses = new ResponseCollection())
  {
    $this->id = $id;
    $this->text = $text;
    $this->responses = $responses;
  }

  // public function __get(string $property): string
  // {
  //   if (property_exists($this, $property)) {
  //     return $this->$property;
  //   } else {
  //     throw new \Exception("That property exists not!");
  //   }
  // }

  public function getTitle(): string
  {
    return $this->text;
  }

  public function addResponse(Response $response): void
  {
    // if ($responses instanceof ResponseCollection) {
    //   foreach ($responses as $response) {
    //     array_push($responses, $response);
    //     // $responses->append($response);
    //   }
    // } else {
    //   throw new \InvalidArgumentException("You must enter a Question!");
    // }
    $this->responses[] = $response;
  }

  public static function listQuestionsById(int $id): QuestionCollection
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Question where numQuizz = :id;');
    $stmt->execute(['id' => $id]);
    $list = new QuestionCollection();
    while ($row = $stmt->fetch()) {
      $list[]= new Question(id:$row['id'], text:$row['text']);
    }
    
    return $list;
  }
}
