<h5>Propor troca para <?=ucfirst($user->nome);?></h5>


<?php if(count($itensQuero) < 1 || count($itensTenho) < 1): ?>
  <br>
  <div class="card-panel">
    <div  class="flow-text">
     Você não pode propor uma troca para <?=ucfirst($user->nome);?>.<br>
    </div>
    <?php if(count($itensQuero) < 1): ?>
      <?=ucfirst($user->nome);?> não possui nenhum item que você deseja.
    <?php endif; ?>
    <?php if(count($itensTenho) < 1): ?>
      Você não possui nenhum item que <?=ucfirst($user->nome);?> deseja.
    <?php endif; ?>
  </div>
<?php endif; ?>

<?=CHtml::beginForm();?>
  <div class="row">
    <div class="col m6 s12">
      <p class="flow-text">O que você oferece?</p>
      <div>
        Lista de itens que <b>você possui</b> que são <b>desejados por <?=ucfirst($user->nome);?></b>.
        <br>
        Selecione os itens que você quer oferecer na troca.
        <?php if(count($itensTenho) < 1): ?>
          <p class="flow-text">
            Nenhum item nessa lista :(
          </p>
        <?php else: ?>
          <br>
          <small class="right">Valor em pontos</small>
          <br>
          <?php foreach ($this->user->itensParaTroca as $i): ?>
            <?php if(in_array($i->item_id,$itensTenho)): ?>
              <div class="card-panel">
                <input name="oferece[<?=$i->id?>]" type="checkbox" id="i<?=$i->id?>" class='item item-a' data-valor='<?=$i->getPontos()?>'/>
                <label for="i<?=$i->id?>" class='black-text' style='display: block;'>
                  <?= $i->item->nome ?> <?=strlen($i->nome)>1 ? ' - ' . $i->nome : '';?>
                  - <?= $i->isNovo ? 'Novo' : 'Usado'; ?>
                  <div class="right red-text">
                    <b>-<?= $i->getPontos(); ?></b>
                  </div>
                </label>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col m6 s12">
      <p class="flow-text">O que você quer em troca?</p>
      <div>
        Lista de itens que <b><?=ucfirst($user->nome);?> possui</b> e que são <b>desejados por você</b>.
        <br>
        Selecione os itens que você gostaria de receber.
        <?php if(count($itensQuero) < 1): ?>
          <p class="flow-text">
            Nenhum item nessa lista :(
          </p>
        <?php else: ?>
          <br>
          <small class="right">Valor em pontos</small>
          <br>
          <?php foreach ($user->itensParaTroca as $i): ?>
            <?php if(in_array($i->item_id,$itensQuero)): ?>
              <div class="card-panel">
                <input name="recebe[<?=$i->id?>]" type="checkbox" id="i<?=$i->id?>" class='item item-b' data-valor='<?=$i->getPontos()?>'/>
                <label for="i<?=$i->id?>" class='black-text' style='display: block;'>
                  <?= $i->item->nome ?> <?=strlen($i->nome)>1 ? ' - ' . $i->nome : '';?>
                  - <?= $i->isNovo ? 'Novo' : 'Usado'; ?>
                  <div class="right green-text">
                     <b>+<?= $i->getPontos(); ?></b>
                  </div>
                </label>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <hr class="grey-text">
  <div id='resumo-troca' style="display:none;">
    <p class="flow-text">
      Valor avaliado da troca: <b id='item-mais' class="green-text"></b> - 
      <b id='item-menos' class="red-text"></b> 
      = <span id='valor-troca'></span>
    </p>
    <button type='submit' onclick='return validate()' class="right btn blue darken-3">
      Realizar proposta
    </button>
  </div>
<?=CHtml::endForm();?>

<script>
  $('.item').click(function(){
    $('#resumo-troca').slideDown();
    var valorOferece = 0;
    var valorRecebe = 0;
    $('.item-a:checked').each(function(){
      valorOferece += parseInt($(this).attr('data-valor'));
    });    
    $('.item-b:checked').each(function(){
      valorRecebe += parseInt($(this).attr('data-valor'));
    });
    var valorTroca = valorRecebe - valorOferece;
    $('#item-mais').text(valorRecebe);
    $('#item-menos').text(valorOferece);

    if(valorTroca < 0) classe = 'red-text';
    if(valorTroca > 0) classe = 'green-text';
    if(valorTroca == 0) classe = 'black-text';

    var htmlValorTroca = '<b class="' + classe + '">' + valorTroca + '</b>';
    $('#valor-troca').html(htmlValorTroca);
  });

  function validate(){
    var valorOferece = 0;
    var valorRecebe = 0;
    $('.item-a:checked').each(function(){
      valorOferece += parseInt($(this).attr('data-valor'));
    });    
    $('.item-b:checked').each(function(){
      valorRecebe += parseInt($(this).attr('data-valor'));
    });
    if(valorOferece > 0 && valorRecebe > 0){
      return true;
    } else {
      alert('Selecione pelo menos um item em cada lista.');
      return false;
    }
  }

</script>