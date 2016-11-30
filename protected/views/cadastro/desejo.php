<a class="btn blue darken-3 hide-on-small-only right" href='<?=$this->createUrl('/cadastro/add',[
	'lista' => ItemUsuario::TipoDesejado,
])?>'>
  Incluir novo item
</a>
<h5>
	Lista de itens desejados
</h5>
<?php if(count($itens)>0):?>
	<?php foreach ($itens as $id): ?> 
		<br>
		<div class="col s12 m8 offset-m2 l6 offset-l3">
			<div class="card-panel grey lighten-5 z-depth-1">
			  <div class="row valign-wrapper">
			    <div class="col m2 s12">
			      <img src="<?= $id->item->urlFoto?>" alt="" class="responsive-img">
			    </div>
			    <div class="col m10 s12 flow-text">
			      <span class="black-text">
			        <?= $id->item->nome ?> <?=strlen($id->nome)>1 ? ' - ' . $id->nome : '';?>
			        - <?= $id->isNovo ? 'Novo' : 'Usado'; ?>
			      </span>
			    </div>
			  </div>
			  <a href="#!" class="right btn grey" onclick="return confirm('Certeza?');">Remover</a>
			</div>
		</div>
		
	<?php endforeach; ?>
<?php else: ?>
	<p class="flow-text">
		Nenhum item na lista de desejos.
	</p>
<?php endif; ?>



<div class="fixed-action-btn hide-on-med-and-up" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large blue darken-3" href='<?=$this->createUrl('/cadastro/add',[
	'lista' => ItemUsuario::TipoDesejado,
])?>'>
    <i class="material-icons">add</i>
  </a>
</div>