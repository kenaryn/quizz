<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Entities\Quizz\Quizz;
use Entities\Quizz\Question;
use Entities\Quizz\Response;

$json = file_get_contents('./quizz.json');
$json_data = json_decode($json);
$quizz = Quizz::create($json_data);

try {
  $list = Quizz::list();
  // print_r($list);
} catch (PDOException $e) {
  echo "error: " . $e->getMessage() . ', error code: ' . $e->getCode(), PHP_EOL;
  echo 'The error occured in . ' . $e->getFile() . ' at line ' . $e->getLine(), PHP_EOL;
}

// echo '<br>';
// print_r(Quizz::findById(1));
// echo '<hr>';
// print_r(Quizz::filter('language'));
// echo '<hr>';
// print_r(Question::listQuestionsById(1));
// print_r(Response::listResponsesById(1));
// print_r(Response::listResponsesById(1));

Quizz::save(new Quizz('What is your favourite software paradigm?'));
print_r(Quizz::list());

echo '<hr>';

$malades = Quizz::filter('malades');
foreach ($malades as $key => $quizzToUpdate) {
  $quizzToDelete->setTitle('New astounding quizz');
  Quizz::update($quizzToUpdate);
}

$tares = Quizz::filter('tares');
foreach ($tares as $key => $quizzToDelete) {
  Quizz::delete($quizzToDelete);
}

print_r(Quizz::list());
