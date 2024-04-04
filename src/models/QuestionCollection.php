<?php

namespace Entities\Quizz;

class QuestionCollection
{
  public function __construct(private $values = [], private int $position = 0)
  {
    $this->values = $values;
  }
}
