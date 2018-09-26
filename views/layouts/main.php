<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
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
		<?php
		NavBar::begin([
			//'brandLabel' => false,
			//'brandUrl' => false,
			'options' => [
				'class' => 'navbar-default navbar-fixed-top',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-left'],
			'items' => [
				['label' => 'Inicial', 'url' => ['/site/index']],
				['label' => 'Nova', 'url' => ['requisicao/create']],
				['label' => 'Listar', 'url' => ['requisicao/index']],
				['label' => 'Sobre', 'url' => ['/site/about']],
				//['label' => 'Contact', 'url' => ['/site/contact']],
				Yii::$app->user->isGuest ? (
					['label' => 'Login', 'url' => ['/site/login']]
					) : (
					'<li>'
					. Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
					. Html::submitButton(
						'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
					)
					. Html::endForm()
					. '</li>'
					)
			],
		]);
		NavBar::end();
		?>

			<div class="container">
			<?=
			Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			])
			?>
				<?=$content ?>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; Instituto Nacional do Seguro Social <?=date('Y') ?></p>

				<p class="pull-right"><?=Yii::powered() ?></p>				
			</div>
		</footer>

<?php $this->endBody() ?>
	</body>
</html>
		<?php $this->endPage() ?>
