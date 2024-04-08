<?php

declare(strict_types=1);

namespace Entities\Quizz;

class QuestionCollection extends \ArrayObject
{
  public function __construct(private array $questions = [], private int $position = 0)
  {
    $this->questions = $questions;
  }

  public function offsetSet(mixed $offset, mixed $value): void
  {
    if (!($value instanceof Question)) {
      throw new \InvalidArgumentException("Must be a question!");
    }

    parent::offsetSet($offset, $value);
  }

  public function count(): int
  {
    return count($this->questions);
  }
}
