<?php

declare(strict_types=1);

namespace Entities\Quizz;

class ResponseCollection implements \ArrayAccess, \Countable
{
  public function __construct(private array $responses = [], private int $position = 0, private int $response = 0) {
    $this->responses = $responses;
    $this->position = $position;
    $this->response = $response;
  }
  
  public function count(): int
  {
    return count($this->responses);
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
    return $this->response[$this->position];
  }

  public function next(): void
  {
    $this->position++;
  }

  public function valid(): bool
  {
    return isset($this->response[$this->position]);
  }

  public function offsetExists(mixed $offset): bool
  {
    return isset($this->responses[$offset]);
  }

  public function offsetGet(mixed $offset): Response
  {
    return $this-> responses[$offset];
  }

  public function offsetSet(mixed $offset, mixed $value): void
  {
    if (!($value instanceof Response)) {
      throw new \InvalidArgumentException("Must be a Response!");
    }
  }

  public function offsetUnset(mixed $offset): void
  {
    unset($this->responses[$offset]);
  }
}
