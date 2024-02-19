<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Commision $model */

$this->title = 'Create Commision';
$this->params['breadcrumbs'][] = ['label' => 'Commisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
