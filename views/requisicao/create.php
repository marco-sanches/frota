<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Requisicao */

$this->title = 'Cadastrar Requisição';
$this->params['breadcrumbs'][] = ['label' => 'Requisições', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
