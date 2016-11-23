<h5>Proposta de troca
<?php if($troca->isSolicitante()): ?>
		aguardando avaliação de <?=CHtml::link(ucfirst($user->nome),$this->createUrl('/perfil/index',[
		'id' => $user->id,
	]))?>	
<?php else: ?>
	feita por <?=CHtml::link(ucfirst($user->nome),$this->createUrl('/perfil/index',[
		'id' => $user->id,
	]))?>
<?php endif; ?>
</h5>

<br>

<div class="flow-text">Acerte com <?=CHtml::link(ucfirst($user->nome),$this->createUrl('/perfil/index',[
		'id' => $user->id,
	]))?>	 como farão a troca </div class="flow-text">

<div class="hide-on-small-only card-panel grey lighten-5 z-depth-1" style="margin-right:45%">
    <span class="black-text">
      <?=CHtml::beginForm()?>
        <div class="input-field col s12">
          <textarea name='msg' id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Enviar mensagem</label>
        </div>
	      <button type="submit" class="btn right blue darken-3">
	      	Enviar <i class=" material-icons right">send</i>
	      </button>
      <?=CHtml::endForm()?>
    </span>
</div>
<div class="hide-on-med-and-up card-panel grey lighten-5 z-depth-1" style="margin-right:10%">
    <span class="black-text">
      <?=CHtml::beginForm()?>
	        <div class="input-field col s12">
	          <textarea name='msg' id="textarea1" class="materialize-textarea"></textarea>
	          <label for="textarea1">Enviar mensagem</label>
	        </div>
	      <button type="submit" class="btn right blue darken-3">
	      	Enviar <i class=" material-icons right">send</i>
	      </button>
      <?=CHtml::endForm()?>
    </span>
</div>
<br>


<?php foreach ($troca->mensagems as $m): ?>
	<?php if($m->euEnvie()): ?>
		<div class="hide-on-small-only card-panel grey lighten-5 z-depth-1" style="text-align:right; margin-right:45%">
		    <span class="black-text">
		      <?=$m->corpo;?>
		    	<i class="left material-icons dp48">message</i>
		    </span>
		</div>
		<div class="hide-on-med-and-up card-panel grey lighten-5 z-depth-1" style="text-align:right;margin-right:10%">
		    <span class="black-text">
		      <?=$m->corpo;?>
		    	<i class="left material-icons dp48">message</i>
		    </span>
		</div>
	<?php else: ?>
		<div class="hide-on-small-only card-panel grey lighten-5 z-depth-1" style="margin-left:45%">
		    <span class="black-text">
		      <?=$m->corpo;?>
		      <div style="text-align:right">
			    	<img src="<?=$user->getPic()?>" alt="" class="circle" style='width:50px'>
			    </div>
		    </span>
		</div>
		<div class="hide-on-med-and-up card-panel grey lighten-5 z-depth-1" style="margin-left:10%">
		    <span class="black-text">
		      <?=$m->corpo;?>
		      <div style="text-align:right">
		      	<img src="<?=$user->getPic()?>" alt="" class="circle " style='width:40px'>
		      </div>
		    </span>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
   
<br><br><br>
<?php if($troca->isSolicitante()): ?>
	<a class="waves-effect waves-light btn right grey" onclick="return confirm('Confirma cancelamento?')" href='<?=$this->createUrl('/troca/cancelar',['id'=>$troca->id]);?>'>
		Cancelar proposta
	</a> 
<?php else: ?>
	<a class="waves-effect waves-light btn right grey">Recusar</a> 
	<a style='margin-right: 4px;' class="waves-effect waves-light btn blue darken-3 right">Marcar como realizada</a> 
<?php endif; ?>
<div class="flow-text">Resumo da troca</div>
<div class="card-panel">
	<div class="row">
		<div class="col m9 s12">
			<div class=" flow-text">
				<small style="color:#777">Você reberá:</small><br> <?=$troca->getStringRecebe()?>
	    		<br>
				<small style="color:#777">Você oferece:</small><br> <?=$troca->getStringOferece()?>
			</div>
		</div>
		<div class="col m3 s12">
			<div class="hide-on-med-and-up"><br></div>
			<div style="text-align:center">
				Valor da troca
				<?php $valor = $troca->getValor(); ?>
				<?php if($valor >= 0): ?>
					<h4 class="green-text">
						<?=$valor?>
					</h4>
				<?php else: ?>
					<h4 class="red-text">
						<?=$valor?>
					</h4>
				<?php endif; ?>
			</div>		
			<div style="text-align:center">
				<a href='<?=$this->createUrl('/perfil/index')?>'>
					<img src="<?=$user->getPic();?>" style='width:90px;' alt="" class="circle responsive-img"/>
				</a>
				<br>
				Reputação de <?=CHtml::link(ucfirst($user->nome),$this->createUrl('/perfil/index',[
					'id' => $user->id,
				]))?><br>
				<?php for($i=0;$i<5;$i++): ?>
					<?php if($i+1 > $user->getAvaliacao()): ?>
						<i class="material-icons grey-text">star</i>
					<?php else: ?>
						<i class="material-icons amber-text">star</i>
					<?php endif; ?>
				<?php endfor; ?>	
			</div>		
		</div>	
	</div>
</div>

<br><br><br>