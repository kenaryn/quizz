<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Entities\Quizz\Quizz;

$json = file_get_contents('./public/quizz.json');
$json_data = json_decode($json, true);
$quizz = Quizz::create($json_data);
