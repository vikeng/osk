<?php

require "db.php";
require "directory.php";

$names = ['Иванов', 'Сергеев', 'Антонов', 'Столяров', 'Петрухин'];

$user = $names[array_rand($names)];
$city_id = array_rand($cities);
$skills_id = array_rand($skills, mt_rand(1, 3));
if (is_numeric($skills_id)) {
    $skills_id = [$skills_id];
}

$sql = "INSERT INTO Users(name,city_id) VALUES(:user,:city_id) ";
$query = $pdo->prepare($sql);
$query->execute(['user' => $user, 'city_id' => $city_id]);
if (count($skills_id) > 0) {
    $user_id = $pdo->lastInsertId();
    $sql = "INSERT INTO Users_Skills(user_id,skill_id) VALUES(:user_id,:skill_id) ";
    $query = $pdo->prepare($sql);
    foreach ($skills_id as $skill_id) {
        $query->execute(['user_id' => $user_id, 'skill_id' => $skill_id]);
    }
}


