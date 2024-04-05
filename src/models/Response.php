<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Response
{
  public function __construct(private string $text, private bool $isValid = false)
  {
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

  
}