<a class="waves-effect waves-light btn right grey">Recusar</a> 
<a style='margin-right: 4px;' class="waves-effect waves-light btn indigo right">Arquivar</a> 
        
<h5>Avaliar troca
</h5><br>
<?php $stars = 3; ?>
<div class="card-panel">
	<div class="row" style="border-bottom: 2px solid #ddd;padding-bottom:12px;">
		<div class="col s6">
			<div style="text-align:center" class="flow-text">
				<br>
				Valor da troca
				<h2 class="green-text">+195</h2>
			</div>		
		</div>	
		<div class="col s6">
			<div style="text-align:center">
				<a href='<?=$this->createUrl('/perfil/index')?>'>
					<img src="<?=Yii::app()->baseUrl;?>/images/female.jpeg" style='width:90px;' alt="" class="circle responsive-img"/>
				</a>
				<br>
				Reputação de <?=CHtml::link('Jane Doe',$this->createUrl('/perfil/index'))?><br>
				<?php for($i=0;$i<5;$i++): ?>
					<?php if($i+1 > $stars): ?>
						<i class="material-icons grey-text">star</i>
					<?php else: ?>
						<i class="material-icons amber-text">star</i>
					<?php endif; ?>
				<?php endfor; ?>	
			</div>		
		</div>	
	</div>
	<div class="row">
		<div class="s12 flow-text">
			<small style="color:#777">Você reberá:</small><br> console PS4, 2 jogos de PS4
    		<br>
			<small style="color:#777">Você oferece:</small><br> console PS3, 10 jogos de PS3
		</div>
	</div>
</div>
<br>
<h5><i class="material-icons">message</i></h5><br>

<div class="col s12 m8 offset-m2 l6 offset-l3">
	<div class="card-panel grey lighten-5 z-depth-1">
	  <div class="row valign-wrapper">
	    <div class="col s10">
	      <span class="black-text">
	        Oi, com podemos fazer para finalizar a troca?
	      </span>
	    </div>
	    <div class="col s2">
	      <img src="images/female.jpeg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
	    </div>
	  </div>
	</div>
</div>
    

<div class="col s12 m8 offset-m2 l6 offset-l3">
	<div class="card-panel grey lighten-5 z-depth-1">
	  <div class="row valign-wrapper">
	    <div class="col s2">
	      <img src="images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
	    </div>
	    <div class="col s10">
	      <span class="black-text">
	        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  aute irure dolor in reprehenderit in voluptate velit esse cillu
	      </span>
	    </div>
	  </div>
	</div>
</div>
    

