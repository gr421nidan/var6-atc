<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Debt $model */

$this->title = 'Create Debt';
$this->params['breadcrumbs'][] = ['label' => 'Debts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
