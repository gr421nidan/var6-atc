<?php

use app\models\Tel;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Debt $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="debt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->dropDownList(\yii\helpers\ArrayHelper::map(User::find()->where(['role' => 'client'])->andWhere(['exists', Tel::find()->where('Tel.username = User.username')])->all(), 'username', 'username'), ['prompt' => 'Выберите абонента']) ?>

    <?= $form->field($model, 'type')->dropDownList(['абонентская' => 'Абонентская', 'повременная' => 'Повременная',], ['prompt' => 'Выберите тип задолжности']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
