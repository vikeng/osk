<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
?>
<?= GridView::widget([
    'tableOptions' => ['class' => 'table'],
    'dataProvider' => $dataProvider,
    'id' => 'data-table',
    'sorter' => null,
    'summary' => '',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'city_id',
            'value' => function (Users $model) {
                return ArrayHelper::getValue($model, 'city.name');
            },
            'enableSorting' => false,
        ],
        [
            'label' => 'Навык',
            'value' => function (Users $model) {
                return $model->getSkillsAsString();
            },
        ],
    ],
]) ?>

