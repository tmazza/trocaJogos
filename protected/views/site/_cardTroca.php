<div class="row">
  <div class="col s12">
    <?php if($troca->status == Troca::StatusParaAvaliar): ?>
      <span style="color: red;">Troca aguardando sua avaliação.</span>
    <?php endif; ?>
  	<a href='<?=$this->createUrl('/troca/avaliar',[
  		'id' => $troca->id,
  	]);?>'>
	    <div class="card-panel waves-effect" style="width:100%">
	    	<div class="flow-text" style="float:left; width:350px;color:#000;">
				<small style="color:#777">Você receberá:</small><br> <?=$itensVem?>
	    		<br>
				<small style="color:#777">Você oferece:</small><br> <?=$itensVai?>
	    	</div>
			<div style="width:145px; float:right;text-align:center">
				<h2 class="<?=$prefixo=='+' ? 'green-text' : 'red-text';?>"><?=$prefixo?><?=$valor?></h2>
				<?php for($i=0;$i<5;$i++): ?>
					<?php if($i+1 > $stars): ?>
						<i class="material-icons grey-text">star</i>
					<?php else: ?>
						<i class="material-icons amber-text">star</i>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
	    </div>
  	</a>
  </div>
</div>
