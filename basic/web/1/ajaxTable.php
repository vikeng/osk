<?php

require "db.php";

$sql = "SELECT Users.id,Users.name AS user,City.name AS city,GROUP_CONCAT(Skills.name SEPARATOR ', ') AS skill FROM Users "
    . "LEFT JOIN City ON Users.city_id=City.id LEFT JOIN Users_Skills ON Users_Skills.user_id=Users.id "
    . "LEFT JOIN Skills ON Skills.id=Users_Skills.skill_id GROUP BY  Users.id;";
$userStatement = $pdo->query($sql);
$users = $userStatement->fetchAll();
?>
<?php if (count($users) > 0): ?>
    <table class="table">
        <tr>
            <th>Пользователь</th>
            <th>Место жительства</th>
            <th>Навыки</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['user'] ?></td>
                <td><?= $user['city'] ?></td>
                <td><?= $user['skill'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <h2>Таблица с пользователями пуста</h2>
<?php endif; ?>
