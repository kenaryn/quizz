<?php declare(strict_types=1);

namespace Entities\Quizz;

class Database
{
  private static ?Database $instance = null;
  private ?\PDO $connexion = null;

  private function __construct() {
    $this->connexion = new \PDO('mysql:host=mysql-srv;dbname=quizz_db','kena','IAmFreeNow!411');
  }

  public static function getInstance(): Database {
    if (self::$instance == null) self::$instance = new Database();
    return self::$instance;
  }

  public function getConnexion(): \PDO
  {
    return $this->connexion;
  }
}