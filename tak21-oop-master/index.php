<?php

$host =
$db =
$user =
$passwd =
$charset =

try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $passwd);
} catch (\PDOException $e) {
    throw new \PDOException($e->getmessage(), (int)$e->getCode());
}

$stmt = $pdo->prepare('SELECT * FROM tasks;');
$stmt->execute();

$result = $stmt->fetchall(PDO::FETCH_OBJ);

class Task {

    public $description;
    protected $is_completed = false;

    public function __construct ($desc) {

        $this->description = $desc;

    }

    public function complete () {

        $this->is_completed = true;

    }

    public function isComplete () {

        return $this->is_completed;

    }
    
}

$tasks = [
    new Task('Täita Tahvlis päevik'),
    new Task('Poest leiba ja piima'),
    new Task('TAK-21le raamatupoe ülesande hinded sisse'),
];

$tasks[0]->complete();

require_once('index.view.php');

