<div class="row">
  <div class="col m2 s4">
   <img src="<?=$user->getPic()?>" style='width:90px;' alt="" class="circle responsive-img"/>
  </div>  
  <div class="col m10 s8 ">
    <h5 class="flow-text"><?=$user->nome?></h5>
    <?php if($user->qtdTrocaRealizadas > 0): ?>
      <b><?=$user->qtdTrocaRealizadas?></b> troca<?=Util::hasPlural($user->qtdTrocaRealizadas)?> realizada<?=Util::hasPlural($user->qtdTrocaRealizadas)?>
      <br>
      Média das avaliações<br> 
      <?php for($i=0;$i<5;$i++): ?>
        <?php if($i+1 > $user->getAvaliacao()): ?>
          <i class="material-icons grey-text">star</i>
        <?php else: ?>
          <i class="material-icons amber-text">star</i>
        <?php endif; ?>
      <?php endfor; ?>  
    <?php else: ?>
      Nenhuma troca realizada.
    <?php endif; ?>
    <br>
    <?php if($user->id != Yii::app()->user->id): ?>
      <br>
      <a class="btn blue darken-3 hide-on-small-only" href='<?=$this->createUrl('/troca/propor',[
        'id' => $user->id,
      ])?>'>
        Propor troca
      </a>
      <div class="fixed-action-btn hide-on-med-and-up" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large blue darken-3" href='<?=$this->createUrl('/troca/propor',[
          'id' => $user->id,
        ])?>'>
          <i class="material-icons">add</i>
        </a>
      </div>
    <?php endif;?>
  </div>  
</div>
<br>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1" class=" black-text">Avaliações</a></li>
        <li class="tab col s3"><a href="#test2" class=" black-text">Itens para troca</a></li>
        <li class="tab col s3"><a href="#test3" class=" black-text">Itens desejados</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
      <br>
      <?php if(count($trocas) > 0): ?>
        <?php foreach ($trocas as $t): ?>
        <?php
          if($t->usuarioSolicitante_id == $user->id){
            $comentario = $t->msgAvaliacaoQueDecide;
            $rating = $t->avaliacaoQueDecide;
            $u = $t->usuarioQueDecide;
          } else {
            $comentario = $t->msgAvaliacaoSolicitante;
            $rating = $t->avaliacaoSolicitante;
            $u = $t->usuarioSolicitante;
          }
        ?>
        <div class="col s12 m6">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s2">
                <img src="<?=$u->getPic()?>" alt="" class="circle responsive-img">
              </div>
              <div class="col s10">
                <span class="black-text">
                 <?=$comentario;?> 
                </span>
              </div>
            </div>
              <div class="right">
                <?php for($i=0;$i<5;$i++): ?>
                  <?php if($i+1 > $rating): ?>
                    <i class="material-icons grey-text">star</i>
                  <?php else: ?>
                    <i class="material-icons amber-text">star</i>
                  <?php endif; ?>
                <?php endfor; ?>  
              </div>
              <br>
          </div>
        </div>
        <?php endforeach; ?>         
      <?php else: ?>         
        <p class="flow-text">Nenhum troca finalizada.</p>
      <?php endif; ?> 
    </div>
    <div id="test2" class="col s12">
      <br>
      <?php if(count($user->itensParaTroca) > 0): ?>
        <?php foreach ($user->itensParaTroca as $ipt): ?>
          <div class="col s12 m6">
            <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s2">
                  <img src="<?= $ipt->item->urlFoto?>" alt="" class="responsive-img">
                </div>
                <div class="col s10 flow-text">
                  <span class="black-text">
                  <?= $ipt->item->nome ?> <?=strlen($ipt->nome)>1 ? ' - ' . $ipt->nome : '';?>
                  - <?= $ipt->isNovo ? 'Novo' : 'Usado'; ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="flow-text">Nenhum item nesta lista.</p>
      <?php endif; ?>

    </div>
    <div id="test3" class="col s12">
      <br>      
      <?php if(count($user->itensDesejados) > 0): ?>
        <?php foreach ($user->itensDesejados as $id): ?>
          <div class="col s12 m6">
            <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s2">
                  <img src="<?= $id->item->urlFoto?>" alt="" class="responsive-img">
                </div>
                <div class="col s10 flow-text">
                  <span class="black-text">
                  <?= $id->item->nome ?> <?=strlen($id->nome)>1 ? ' - ' . $id->nome : '';?>
                  - <?= $id->isNovo ? 'Novo' : 'Usado'; ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="flow-text">Nenhum item nesta lista.</p>
      <?php endif; ?>
    </div>
  </div>
<style type="text/css">
  .tabs .indicator{
    background: #1565C0!important;
  }
</style>