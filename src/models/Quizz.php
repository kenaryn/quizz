<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Quizz
{
  public function __construct(private string $title = 'No title choosen', private int $id = 0, private QuestionCollection $questions = new QuestionCollection())
  {
    $this->id = $id;
    $this->title = $title;
    $this->questions = $questions;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setTitle(string $title): void
  {
    $this->title = $title;
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

    $obj = new Quizz(title: $jsonObject->title);
    foreach ($jsonObject->questions as $k => $v) {
      $question = new Question($v->text);
      foreach ($v->responses as $key => $r) {
        $response = new Response(text: $r->text, isValid: $r->isValid);
        $question->addResponse($response);
      }
      $obj->addQuestion($question);
    }
    return $obj;
  }

  public static function list(): \ArrayObject
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Quizz');
    $stmt->execute();
    $list = new \ArrayObject();
    while ($row = $stmt->fetch()) {
      $list[] = new Quizz(id: $row['id'], title: $row['title']);
    }
    return $list;
  }

  public static function filter(string $text): \ArrayObject
  {
    /**
     * Filter contents by sub-string in title.
     */
    $stmt = Database::getInstance()->getConnexion()->prepare("select * from Quizz where title like :textSearched;");
    $stmt->execute(['textSearched' => '%' . $text . '%']);
    $list = new \ArrayObject();
    while ($row = $stmt->fetch()) {
      $list[] = new Quizz(id: $row['id'], title: $row['title']);
    }
    return $list;
  }


  public static function findById(int $id): ?Quizz
  {
    /**
     * Display a row by its id.
     */
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Quizz where id = :id;');
    $stmt->execute(['id' => $id]);
    if ($row = $stmt->fetch()) {
      return new Quizz(id: $row['id'], title: $row['title']);
    }
    return null;
  }

  public static function save(Quizz $quizz): void
  {
    echo "SAVE";
    $stmt = Database::getInstance()->getConnexion()->prepare("INSERT into Quizz (title) values (:title);");
    $stmt->execute(['title' => $quizz->getTitle()]);
  }

  public static function update(Quizz $quizz): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('UPDATE Quizz set title = :title WHERE id = :id');
    $stmt->execute(['title' => $quizz->getTitle(), 'id' => $quizz->getId()]);
  }

  public static function delete(Quizz $quizz): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('DELETE from Quizz WHERE id = :id');
    $stmt->execute(['id' => $quizz->getId()]);
  }
}
