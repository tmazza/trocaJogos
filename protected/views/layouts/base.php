<!DOCTYPE html>
<html lang='pt' style="background:#dedede;">
	  <head>
	    <title><?=$this->pagTitulo;?></title>


	    <!--Import Google Icon Font-->
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="<?=Yii::app()->baseUrl?>/materialize/css/materialize.min.css"  media="screen,projection"/>
	    <meta charset="utf-8" />
	    <!-- <link rel="manifest" href="laucher/manifest.json"> -->

	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="<?=$this->pagDescricao?>">
	    <meta name="keywords" content="<?=$this->pagPalavras?>">

	    <!-- favicon -->
	    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl;?>/favicon.ico?v1"/>

	    <!-- estilos -->
	</head>

	<body style="padding-bottom: 80px;">
	  <nav>
	    <div class="nav-wrapper blue darken-3">
	      <a href="#" data-activates="slide-out" class="button-collapse" style="margin:0px 8px;display:block!important">
	      	<i class="material-icons">menu</i>
	      </a>
	      <a href="<?=$this->createUrl('/site/index')?>" class="brand-logo" style='font-family: arial;font-size: 26px; font-weight: bold;' >
	      	ExpChange
	      </a>
	      <a href="#" data-activates="slide-out2" class="button-collapse2 right" style="margin:0px 8px;">
	      	<i class="material-icons">search</i>
	      </a>

		    <ul id="slide-out2" class="side-nav">
		    	<?php $this->renderPartial('/site/search'); ?>
		    </ul>
		  <ul id="slide-out" class="side-nav">
		  	<?php if(Yii::app()->user->isGuest): ?>
			    <li><a href="<?=$this->createUrl('/site/logout')?>" class="waves-effect">Entrar</a></li>
		  	<?php else: ?>
			    <li>
			    	<div class="userView">
				      <img class="background" src="images/office.jpg">
				      <a href="<?=$this->createUrl('/site/index')?>"><img class="circle" src="images/yuna.jpg"></a>
				      <a href="<?=$this->createUrl('/site/index')?>"><span class="white-text name">
				     	<?=$this->user->nome?>
				      </span></a>
				      <a href="mailto:<?=$this->user->email?>">
				      <span class="white-text email"><?=$this->user->email?></span></a>
			    	</div>
			    </li>
			    <li><a href="<?=$this->createUrl('/cadastro/desejo');?>" class="waves-effect">Itens desejados</a></li>
			    <li><a href="<?=$this->createUrl('/cadastro/paraTroca');?>" class="waves-effect">Itens para troca</a></li>
			    <li><a class="waves-effect" href="#!">Trocas arquivadas</a></li>
			    <li><a class="waves-effect" href="#!">Editar perfil</a></li>
			    <li><div class="divider"></div></li>
			    <li><a class="waves-effect" href="<?=$this->createUrl('/site/logout')?>">Sair</a></li>
		  	<?php endif; ?>
		  </ul>
	    </div>
	  </nav>
		<div class="container">
			<br>
			<?php Util::flashMessages();?>
			<?=$content;?>
		</div>

	  <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/materialize/js/materialize.min.js"></script>
	  <script type="text/javascript">
		  $(".button-collapse").sideNav();

		  $('.button-collapse2').sideNav({
		      edge: 'right', 
		    }
		  );
	  </script>
	</body>
</html>
