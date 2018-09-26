<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequisicaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title='Deslocamentos';
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="requisicao-index">

	<h1><?=Html::encode($this->title) ?></h1>
	<?php //echo $this->render('_search', ['model' => $searchModel]);  ?>
	<?php /*
	  <p>
	  <?=Html::a('Create Requisicao', ['create'], ['class' => 'btn btn-success']) ?>
	  </p> */
	?>	 
	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'pager' => [
			'firstPageLabel' => '<<',
			'lastPageLabel' => '>>',
		],
		'columns' => [
			//['class' => 'yii\grid\SerialColumn'],
			'id_req',
			'id_sipac',
			//'executada',
			[
				'attribute' => 'executada',
				'format' => 'boolean',
			],
			//'id_secao',
			//'id_servico',
			//'id_veic',
			[
				'attribute' => 'veiculo',
				'value' => 'veiculo.placa',
				'header' => 'Placas',
			],
			// 'pedagio',
			// 'pernoite',
			// 'extra',			
			// 'anota',
			// 'data_hora_req',
			[
				'attribute' => 'data_util',
			//'format' => ['date', 'php:d-m-Y'],
			],
			'hora_ini',
			'hora_saida',
			'hora_fim',
			'hora_chegada',
			'km_saida',
			'km_chegada',
			[
				//'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
				'header' => 'rodagem',
				'value' => function ($data) {
					return ($data->km_chegada - $data->km_saida); // $data['name'] for array data, e.g. using SqlDataProvider.
				},
			],
			['class' => 'yii\grid\ActionColumn'],
		],
	]);
	?>
</div>
