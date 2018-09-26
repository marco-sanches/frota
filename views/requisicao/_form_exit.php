<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Requisicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisicao-form">

	<?php $form=ActiveForm::begin(); ?>
	
	<?= $model->km_saida != null ? $form->field($model, 'executada')->hiddenInput(['value' => 1])->label(false): null ?>
	
	<?=$form->field($model, 'anota')->textarea()?>

	<?=$model->km_saida != null ? null : $form->field($model, "hora_saida")->textInput(); ?>

	<?=$model->km_saida == null ? null : $form->field($model, "hora_chegada")->textInput(); ?>

	<?=$model->km_saida != null ? null : $form->field($model, "km_saida")->textInput(); ?>

	<?=$model->km_saida == null ? null : $form->field($model, "km_chegada")->textInput(); ?>
	
	<?=$form->field($model, 'pedagio')->hiddenInput(['value' => 0])->label(false) ?>
	
	<?=$form->field($model, 'pernoite')->hiddenInput(['value' => 0])->label(false) ?>
	
	<?=$model->km_saida == null ? null : $form->field($model, "extra")->textInput(['value' => '00:00']); ?>

	<div class="form-group">
		<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
