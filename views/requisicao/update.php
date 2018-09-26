<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicao */

$_GET['exit']==0 ? $this->title = 'Alterar requisição nº. ' . $model->id_req : $this->title = 'Saída/Retorno - requisição nº. ' . $model->id_req;
$this->params['breadcrumbs'][] = ['label' => 'Requisicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_req, 'url' => ['view', 'id' => $model->id_req]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requisicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ($_GET['exit']==0) ? $this->render('_form', ['model' => $model]) : $this->render('_form_exit', ['model' => $model]) ?>

</div>
