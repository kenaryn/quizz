<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Response
{
  public function __construct(private string $text, private int $id = 0, private bool $isValid = false)
  {
    $this->id = $id;
    $this->text = $text;
    $this->isValid = $isValid;
  }

  public function isValid(): bool
  {
    return $this->isValid;
  }

  public function getText(): string
  {
    return $this->text;
  }

  public static function listResponsesById(int $id): ResponseCollection
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Question, Response where numQuizz = :id and numQuestion = Question.id;');
    $stmt->execute(['id' => $id]);
    $list = new ResponseCollection();
    while ($row = $stmt->fetch()) {
      $list[] = new Response(id:$row['id'], text:$row['text'], isValid:$row['isValid'] == 1 ? true:false);
    }

    return $list;
  }
  
}