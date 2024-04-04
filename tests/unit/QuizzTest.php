<?php

use PHPUnit\Framework\TestCase;

use Entities\Quizz\Quizz as Quizz;

class QuizzTest extends TestCase
{
  public function test_1()
  {
    $quizz = new Quizz();
    $this->assertSame('No title choosen', $quizz->title);
  }

  public function test_2()
  {
    $quizz = new Quizz('Quizz about PHP');
    $this->assertSame('Quizz about PHP', $quizz->title);
  }
}
