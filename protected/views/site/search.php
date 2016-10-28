<?php $usuarios = User::model()->findAll([
  'order' => 'nome ASC', 
]); ?>
<?php foreach ($usuarios as $u): ?>
  <?php if($u->id != Yii::app()->user->id): ?>
    <li><a href='<?=$this->createUrl('/perfil/index',['id'=>$u->id]);?>'>
        <?=ucfirst($u->nome);?>
    </a></li>
  <?php endif; ?>
<?php endforeach; ?>
