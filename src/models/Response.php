<?php

declare(strict_types=1);

namespace Entities\Quizz;

class Response
{
  public function __construct(private string $title, private bool $isValid = false)
  {
    $this->title = $title;
    $this->isValid = $isValid;
  }
}