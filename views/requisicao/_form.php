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

	<?=$model->isNewRecord ? $form->field($model, 'cancelada')->hiddenInput(['value' => 0])->label(false) : $form->field($model, 'cancelada')->dropDownList(['0'=>'não', '1'=>'sim'], ['autofocus' => true]) ?>
	<?=$model->isNewRecord ? $form->field($model, 'executada')->hiddenInput(['value' => 0])->label(false) : $form->field($model, 'executada')->dropDownList(['0'=>'não', '1'=>'sim']) ?>
	<?=$form->field($model, 'id_sipac')->textInput() ?>
	<?=$form->field($model, 'id_secao')->dropDownList(ArrayHelper::map(\app\models\Secao::find()->all(), 'id_secao', 'nome_secao'), ['prompt' => 'Selecione']) ?>

	<?=$form->field($model, 'id_servico')->dropDownList(ArrayHelper::map(\app\models\Servico::find()->all(), 'id_servico', 'nome_servico'), ['prompt' => 'Selecione']) ?>

	<?=$form->field($model, 'id_veic')->dropDownList(ArrayHelper::map(\app\models\Veiculo::find()->where(['ativo' => 1])->all(), 'id_veiculo', 'placa'), ['prompt' => 'Selecione']) ?> 

	<?=$form->field($model, 'id_mot')->dropDownList(ArrayHelper::map(\app\models\Motorista::find()->where(['ativo' => 1])->all(), 'id_mot', 'nome_mot'), ['prompt' => 'Selecione']) ?>

	<?=$form->field($model, 'data_util')->widget(DatePicker::className(), ['language' => 'pt_BR', 'dateFormat' => 'yyyy-MM-dd']) ?>

	<?=$form->field($model, 'hora_ini')->textInput() ?>

	<?=$form->field($model, 'hora_fim')->textInput() ?>

	<?=$form->field($model, 'anota')->textarea() ?>

	<?=$model->isNewRecord ? null : $form->field($model, "hora_saida")->textInput(); ?>

	<?=$model->isNewRecord ? null : $form->field($model, "hora_chegada")->textInput(); ?>

	<?=$model->isNewRecord ? null : $form->field($model, "km_saida")->textInput(); ?>

	<?=$model->isNewRecord ? null : $form->field($model, "km_chegada")->textInput(); ?>

	<div class="form-group">
		<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
