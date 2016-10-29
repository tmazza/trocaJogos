<h5>Trocas em avaliação</h5>
<?php foreach ($trocas as $t): ?>
	<?php $this->renderPartial('/site/_cardTroca',[
    'troca' => $t,
		'valor' => abs($t->getValor()),
		'prefixo' => $t->getValor() >= 0 ? '+' : '-',
		'itensVem' => $t->getStringRecebe(),
		'itensVai' => $t->getStringOferece(),
		'stars' => $t->getAvaliacao(),
	]); ?>
<?php endforeach; ?>