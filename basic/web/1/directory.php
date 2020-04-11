<?php
$citiesStatement = $pdo->query("SELECT id,name FROM City");
$citiesData = $citiesStatement->fetchAll();
foreach ($citiesData as $data) {
    $cities[$data['id']] = $data['name'];
}

$skillsStatement = $pdo->query("SELECT id,name FROM Skills");
$skillsData = $skillsStatement->fetchAll();
foreach ($skillsData as $data) {
    $skills[$data['id']] = $data['name'];
}

