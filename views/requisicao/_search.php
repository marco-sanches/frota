<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequisicaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisicao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_req') ?>

    <?= $form->field($model, 'id_secao') ?>

    <?= $form->field($model, 'id_servico') ?>

    <?= $form->field($model, 'id_veic') ?>

    <?= $form->field($model, 'hora_saida') ?>

    <?php // echo $form->field($model, 'hora_chegada') ?>

    <?php // echo $form->field($model, 'km_saida') ?>

    <?php // echo $form->field($model, 'km_chegada') ?>

    <?php // echo $form->field($model, 'pedagio') ?>

    <?php // echo $form->field($model, 'pernoite') ?>

    <?php // echo $form->field($model, 'extra') ?>

    <?php // echo $form->field($model, 'executada') ?>

    <?php // echo $form->field($model, 'anota') ?>

    <?php // echo $form->field($model, 'data_hora_req') ?>

    <?php // echo $form->field($model, 'data_util') ?>

    <?php // echo $form->field($model, 'hora_ini') ?>

    <?php // echo $form->field($model, 'hora_fim') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
