<?php

declare(strict_types=1);

namespace Entities\Quizz;

class ResponseCollection implements \ArrayAccess, \Countable
{
  public function count(): int
  {
    return count($this->values);
  }

  public function rewind(): void
  {
    $this->position = 0;
  }

  public function key(): int
  {
    return $this->position;
  }

  public function current(): Question
  {
    return $this->values[$this->position];
  }

  public function next(): void
  {
    $this->position++;
  }

  public function valid(): bool
  {
    return isset($this->values[$this->position]);
  }
}
