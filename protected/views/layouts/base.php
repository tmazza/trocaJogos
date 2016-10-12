<!DOCTYPE html>
<html lang='pt' style="background:#dedede;">
	  <head>
	    <title><?=$this->pagTitulo;?></title>


	    <!--Import Google Icon Font-->
    	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

	<body>
	  <nav>
	    <div class="nav-wrapper  blue darken-3">
	      <a href="<?=$this->createUrl('/site/index')?>" class="brand-logo">SwapMeet</a>
	      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
	      <a href="#" data-activates="slide-out2" class="button-collapse2 right">
	      	<i class="material-icons">search</i>
	      </a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="sass.html">Sass</a></li>
	        <li><a href="badges.html">Components</a></li>
	        <li><a href="collapsible.html">Javascript</a></li>
	        <li><a href="mobile.html">Mobile</a></li>
	      </ul>

		    <div id="slide-out2" class="side-nav">
		      	<div class="row">
				    <form class="col s12">
				        <div class="input-field">
				          <i class="material-icons prefix black-text">search</i>
				          <input id="icon_prefix" placeholder="Buscar por pessoas" type="text" class="black-text">
				        </div>
				    </form>
			  	</div>		
		  		<div class="row black-text" style="line-height:20px!important;">
				    <div class="col s12">
			  			<h6>Melhores resultados</h6>
			  			<br>
					  	<div class="row">
					  		<div class="col s6" style="text-align:center;">
								   <img src="<?=Yii::app()->baseUrl;?>/images/female.jpeg" style='width:60px;' class="circle"/>
								   <div style="font-size:20px:">
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
								   </div>
					  		</div>
					  		<div class="col s6" style="font-size:21px;text-align:center;">
					  			Jane Doe
					  			<br><br>
					  			<span class="green-text">+160</span>
					  		</div>
					  	</div>
			  			<br>
					  	<div class="row">
					  		<div class="col s6" style="text-align:center;">
								   <img src="<?=Yii::app()->baseUrl;?>/images/male.png" style='width:60px;' class="circle"/>
								   <div style="font-size:20px:">
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
									   	<i style="line-height:16px;display:inline-block;font-size:14px;" class="material-icons amber-text">star</i>
								   </div>
					  		</div>
					  		<div class="col s6" style="font-size:21px;text-align:center;">
					  			Jonny Doe
					  			<br><br>
					  			<span class="green-text">+120</span>
					  		</div>
					  	</div>
			  		</div>
			  	</div>
		    </div>
		  <ul id="slide-out" class="side-nav">
		  	<?php if(Yii::app()->user->isGuest): ?>
			    <li><a href="<?=$this->createUrl('/site/logout')?>" class="waves-effect">Entrar</a></li>
		  	<?php else: ?>
			    <li>
			    	<div class="userView">
				      <img class="background" src="images/office.jpg">
				      <a href="<?=$this->createUrl('/site/index')?>"><img class="circle" src="images/yuna.jpg"></a>
				      <a href="<?=$this->createUrl('/site/index')?>"><span class="white-text name">John Doe</span></a>
				      <a href="mailto:JohnDoe@email.com">
				      <span class="white-text email">JohnDoe@email.com</span></a>
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
