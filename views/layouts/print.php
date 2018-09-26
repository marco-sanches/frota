<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
	<head>
		<meta charset="<?=Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<?=Html::csrfMetaTags() ?>
		<title><?=Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>

		<div class="wrap">
			

			<div class="container">
				
				<div style="padding-bottom: 5px; margin: 5px"><?php echo Html::img('@web/images/logo.png',['width'=>'20%'])?><div style="float: right;padding: 10px 5px 10px 10px; text-align: center;"><h5><b>Gerência Executiva de Sorocaba/SP<br>Relatório de deslocamento de veículo</b></h5></div></div>
				
				<?=$content ?>
				<div style="text-align: center; padding-top: 50px; color: grey;"><i>assinatura e carimbo do requisitor SIPAC</i></div>
			</div>			
		</div>		

<?php $this->endBody() ?>
	</body>
</html>
		<?php $this->endPage() ?>

