<?php

use app\assets\UserAsset;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */


$this->title = 'Пользователи';

UserAsset::register($this);
?>
<div class="site-index">
    <h1>Пользователи</h1>

    <div class="body-content">
        <form id="addform">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
        <h2 id="status" style="margin-bottom: 10px;"></h2>
        <div id="user-table"></div>
        <div id="data-table"></div>
    </div>
</div>
