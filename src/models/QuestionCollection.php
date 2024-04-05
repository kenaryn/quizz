<?php

declare(strict_types=1);

namespace Entities\Quizz;

class QuestionCollection implements \ArrayAccess, \Countable
{
  public function __construct(private array $questions = [], private int $position = 0)
  {
    $this->questions = $questions;
  }

  public function offsetExists(mixed $offset): bool
  {
    return isset($this->questions[$offset]);
  }

  public function offsetGet(mixed $offset): Question
  {
    return $this->questions[$offset];
  }

  public function offsetSet(mixed $offset, mixed $value): void
  {
    if (!($value instanceof Question)) {
      throw new \InvalidArgumentException("Must be a question!");
    }

    if (empty($offset)) {
      $this->questions[] = $value;
    } else {
      $this->questions[$offset] = $value;
    }
  }

  public function offsetUnset(mixed $offset): void
  {
    unset($this->questions[$offset]);
  }

  public function count(): int
  {
    return count($this->questions);
  }
}
