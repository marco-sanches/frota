<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Requisicao */

$this->title=$model->id_req;
$this->params['breadcrumbs'][]=['label' => 'Requisicões'];//, 'url' => ['index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="requisicao-view">
	<?=
	DetailView::widget([
		'model' => $model,		
		'attributes' => [
			[
				'attribute' => 'id_sipac',				
				'format' => 'html',
				'label' => '<span style="color:red">SIPAC</span>',
				'value' => $model->id_sipac,
				'visible' => $model->id_sipac == null ? false : true,
			],
			'id_req',
			'anota',
			[
				'attribute' => 'id_secao',
				'label' => 'Código da seção',
				'type' => 'raw',
				'value' => app\models\Secao::findOne($model->id_secao)->id_secao
			],
			[
				'attribute' => 'id_secao',
				'label' => 'Seção requisitante',
				'type' => 'raw',
				'value' => app\models\Secao::findOne($model->id_secao)->nome_secao
			],
			[
				'attribute' => 'id_servico',
				'type' => 'raw',
				'value' => app\models\Servico::findOne($model->id_servico)->nome_servico,
			],
			[
				'attribute' => 'id_veic',
				'type' => 'raw',
				'value' => app\models\Veiculo::findOne($model->id_veic)->placa,
			],
			[
				'attribute' => 'id_mot',
				'type' => 'raw',
				'value' => app\models\Motorista::findOne($model->id_mot)->nome_mot,
			],
			[
				'attribute' => 'data_hora_req',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->data_hora_req, 'dd/MM/yyyy H:i'),
			],
			//'data_hora_req',
			[
				'attribute' => 'data_util',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->data_util, 'dd/MM/yyyy'),
			],
			[
				'attribute' => 'hora_ini',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->hora_ini, 'H:i'),
			],
			[
				'attribute' => 'hora_fim',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->hora_fim, 'H:i'),
			],
			[
				'attribute' => 'executada',				
				'format' => 'html',
				'value' => $model->executada == 0 ? '<strong><span style="color:red">não</span></strong>' : '<strong><span style="color:green">sim</span></strong>'			
			],			
			[
				'attribute' => 'hora_saida',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->hora_saida, 'H:i'),
				'visible' => $model->hora_saida == null ? false : true,
			],
			[
				'attribute' => 'hora_chegada',
				'type' => 'raw',
				'value' => Yii::$app->formatter->asDatetime($model->hora_chegada, 'H:i'),
				'visible' => $model->hora_chegada == null ? false : true,
			],
			[
				'attribute' => 'km_saida',
				'type' => 'raw',
				'value' => $model->km_saida,
				'visible' => $model->km_saida == null ? false : true,
			],
			[
				'attribute' => 'km_chegada',
				'type' => 'raw',
				'value' => $model->km_chegada,
				'visible' => $model->km_chegada == null ? false : true,
			],
			[
				'attribute' => 'extra',
				'type' => 'raw',
				'value' => $model->extra,
				'visible' => $model->extra == null || $model->extra == 0  ? false : true,
			],			
		],
	])	
	?>
</div>
