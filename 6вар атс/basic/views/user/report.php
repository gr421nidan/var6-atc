<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Задолжности по оплате ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-report">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if($totalDebt !=0 || $abonentDebt !=0 || $timeDebt !=0):?>
        <p>Полная задолжность <?= Html::encode($totalDebt) ?> рублей.</p>
        <p>Абонентская задолжность <?= Html::encode($abonentDebt) ?> рублей.</p>
        <p>Повременна задолжность <?= Html::encode($timeDebt) ?> рублей.</p>
    <?php else: ?>
        <p>У данного абонента отсутствуют задолжности!</p>
    <?php endif;?>

</div>
