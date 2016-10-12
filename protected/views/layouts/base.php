<!DOCTYPE html>
<html lang='pt' style="background:#dedede;">
	  <head>
	    <title><?=$this->pagTitulo;?></title>

	    <meta charset="utf-8" />
	    <!-- <link rel="manifest" href="laucher/manifest.json"> -->

	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="<?=$this->pagDescricao?>">
	    <meta name="keywords" content="<?=$this->pagPalavras?>">

	    <!-- favicon -->
	    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl;?>/favicon.ico?v3"/>

	    <!-- estilos -->
	</head>

	<body>
		<?php
		if(!Yii::app()->user->isGuest){
			echo CHtml::link('Sair',$this->createUrl('/site/logout'));
		}
		?>
		<?php Util::flashMessages();?>
	  <?=$content;?>
	</body>
</html>
