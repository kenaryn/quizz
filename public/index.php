<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Entities\Quizz\Quizz;

$json = file_get_contents('./quizz.json');
$json_data = json_decode($json);
$quizz = Quizz::create($json_data);

try {
  // $connexion = new PDO('mysql:host=mysql-srv;dbname=quizz_db','kena','IAmFreeNow!411');
  // $stmt = $connexion->prepare('select * from Quizz');
  // $stmt->execute();
  // while ($row = $stmt->fetch()) {
  //   print_r($row);
  // }
    $list = Quizz::list();
    print_r($list);
} catch (PDOException $e) {
  echo "error: " . $e->getMessage() . ', error code: ' . $e->getCode(), PHP_EOL;
  echo 'The error occured in . ' . $e->getFile() . ' at line '. $e->getLine(), PHP_EOL;
}

echo '<br>';
print_r(Quizz::findById(1));
print_r(Quizz::filter('language'));