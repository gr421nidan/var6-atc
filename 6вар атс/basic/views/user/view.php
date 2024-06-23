<?php

use app\models\Tel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'username' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'password',
        ],
    ]) ?>
    <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin()): ?>
        <div class="user-debts">
            <h2>Мой телефон</h2>

            <?php $tel = Tel::find()->one(); ?>
            <?php if ($tel): ?>
                <?= DetailView::widget([
                    'model' => $tel,
                    'attributes' => [
                        'tel',
                    ],
                ]) ?>
            <?php else: ?>
                <p>
                    <?= Html::a('Create Tel', ['tel/create', 'username' => Yii::$app->user->identity->username], ['class' => 'btn btn-success']) ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="user-debts">
            <h2>Мои задолженности</h2>

            <?php $debts = $model->debts; ?>
            <?php if (!empty($debts)): ?>
                <?php foreach ($debts as $debt): ?>
                    <?= DetailView::widget([
                        'model' => $debt,
                        'attributes' => [
                            ['format' => 'raw',
                                'value' => '',
                                'label' => 'Задолжность'],
                            'type',
                            'price',
                        ],
                    ]) ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Задолженностей нет.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
