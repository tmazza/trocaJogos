<h5>Trocas para avaliação</h5>
<?php if(count($trocas) > 0): ?>
  <?php foreach ($trocas as $t): ?>
    <?php if($t->euNaoAvaliei()): ?>
    <?php $this->renderPartial('/site/_cardTroca',[
      'troca' => $t,
      'valor' => abs($t->getValor()),
      'prefixo' => $t->getValor() >= 0 ? '+' : '-',
      'itensVem' => $t->getStringRecebe(),
      'itensVai' => $t->getStringOferece(),
      'stars' => $t->getAvaliacao(),
    ]); ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php else: ?>
  <div class="card-panel">
    <p class="flow-text">Nenhuma proposta de troca para avaliação.</p>
    <ul>
      <li>
        Comece cadastrando os <?=CHtml::link('itens que você deseja',$this->createUrl('/cadastro/add',[
          'lista' => ItemUsuario::TipoDesejado,
        ]))?> e os <?=CHtml::link('itens que você possui para troca',$this->createUrl('/cadastro/add',[
          'lista' => ItemUsuario::TipoParaTroca,
        ]))?>. 
      </li>
      <li>
        Depois <b>clique no ícone</b> <i class="button-collapse2 material-icons" data-activates="slide-out2">search</i> para <b>encontra pessoas</b> que tenham o que você deseja.
      </li>
    </ul>
  </div>
<?php endif; ?>
