<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Entities\Quizz\Quizz as Quizz;
use Entities\Quizz\Question as Question;
use Entities\Quizz\ResponseCollection as ResponseCollection;

class QuizzTest extends TestCase
{
  public function test_1()
  {
    $quizz = new Quizz();
    $this->assertSame('No title choosen', $quizz->getTitle());
  }

  public function test_2()
  {
    $quizz = new Quizz('Quizz about PHP');
    $this->assertSame('Quizz about PHP', $quizz->getTitle());
  }

  public function test_3()
  {
    $quizz = new Quizz('Quizz about PHP');
    $quizz->addQuestion(new Question('What is a constructor?', new ResponseCollection(['a bird', 'a dog', 'an invention!'])));
    $quizz->addQuestion(new Question('What is an attribute?'));
    $this->assertSame('Quizz about PHP', $quizz->getTitle());
    $this->assertSame(2, $quizz->getQuestion()->count());
  }
}
