<h5>Incluir item 
<?php if($lista == CadastroController::ListaDesejos): ?>
  na lista de desejos
<?php else: ?>
  para troca
<?php endif; ?>
</h5>
<?=CHtml::beginForm();?>
  <div class="card-panel">
    <?=CHtml::errorSummary($model)?>
    <br>
    <div class="input-field col s12"><br>
      <select id='tipo' name='tipo'>
        <option value="" disabled selected>Selecione...</option>
        <option value="1">Jogo</option>
        <option value="0">Console</option>
      </select>
      <label>Jogo ou console?</label>
    </div>
    <br>

    <div class="input-field col s12 campoform" id='lista-console'><br>
      <select id='tipo' name='<?=$nomeModel?>[item_id]'>
        <option value="" disabled selected>Selecione...</option>
        <?php foreach ($consoles as $c): ?>
          <option value="<?=$c->id?>"><?=$c->nome?></option>
        <?php endforeach; ?>
      </select>
      <label>Qual?</label>
      <br>
    </div>

    <div class="input-field col s12 campoform" id='lista-jogo'><br>
      <select id='tipo' name='<?=$nomeModel?>[item_id]'>
        <option value="" disabled selected>Selecione...</option>
        <?php foreach ($jogos as $j): ?>
          <option value="<?=$j->id?>"><?=$j->nome?></option>
        <?php endforeach; ?>
      </select>
      <label>De qual console é o jogo?</label>
    </div>

    <div class="input-field col s12 campoform" id='nome-jogo'><br>
      <label>Qual o nome do jogo?</label>
      <input  name='<?=$nomeModel?>[nome]' />
      <br>
    </div>

    <div class="switch campoform" id='estado'>
      <label>&nbsp;&nbsp;&nbsp;Em que estado está?</label><br><br>
      <label>
        Usado
        <input type="checkbox"  name='<?=$nomeModel?>[isNovo]'>
        <span class="lever"></span>
        Novo
      </label>
    </div>

    <button class="btn blue darken-3 right" type="submit">
      Incluir
    </button>

  </div>
<?=CHtml::endForm();?>

<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });            
  $('#tipo').change(function(){
    var value = $(this).val();
    $('.campoform').hide();
    $('#lista-jogo select,#lista-console select').prop('disabled', false);
    if(value == 0){
      $('#lista-console').slideDown();
      $('#lista-jogo select').prop('disabled', 'disabled');
    } else {
      $('#lista-jogo').slideDown();
      $('#nome-jogo').slideDown();
      $('#lista-console select').prop('disabled', 'disabled');
    }
    $('#estado').slideDown();

  });  
</script>
<style type="text/css">
  #lista-console, #lista-jogo, #estado, #nome-jogo { display: none; }
  label { color: #000!important; font-size: 15px!important; }
</style>