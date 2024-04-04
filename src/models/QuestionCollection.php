<?php

declare(strict_types=1);

namespace Entities\Quizz;

class QuestionCollection implements \ArrayAccess
{
  public function __construct(private $values = [], private int $position = 0)
  {
    $this->values = $values;
  }

  public function offsetExists(mixed $offset): bool
  {
    return isset($this->values[$offset]);
  }

  public function offsetGet(mixed $offset): Question
  {
    return $this->values[$offset];
  }

  public function offsetSet(mixed $offset, mixed $value): void
  {
    if (!($value instanceof Question)) {
      throw new \InvalidArgumentException("Must be a question!");
    }

    if (empty($offset)) {
      $this->values[] = $value;
    } else {
      $this->values[$offset] = $value;
    }
  }

  public function offsetUnset(mixed $offset): void
  {
    unset($this->values[$offset]);
  }
}
