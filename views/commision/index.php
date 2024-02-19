<?php

use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Commisions';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->identity->role_id === null) {
    echo '<p>У вас еще нет роли.</p>';
    return;
}

function getVisibleColumns($roleId)
{
    switch ($roleId) {
        case 1: // Админ
            return ['id', 'priority', 'date', 'gadget_name', 'malfunction', 'gadget_info', 'client', 'status', 'date_complete', 'date_add', 'comments', 'description'];
        case 2: // Мастер
            return ['id', 'priority', 'gadget_name', 'malfunction', 'date_complete'];
        case 3: // Менеджер
            return ['id', 'priority', 'date', 'status', 'date_complete', 'description'];
        default: // Другие роли видят только общие поля
            return ['id', 'priority', 'date', 'gadget_name', 'status', 'date_complete'];
    }
}

$visibleColumns = getVisibleColumns(Yii::$app->user->identity->role_id);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => array_merge(
        [
            ['class' => 'yii\grid\SerialColumn'],
        ],
        array_map(
            function ($column) {
                return [
                    'attribute' => $column,
                    'value' => function ($model) use ($column) {
                        return $model->$column;
                    },
                ];
            },
            $visibleColumns
        ),
       
    ),
]);


