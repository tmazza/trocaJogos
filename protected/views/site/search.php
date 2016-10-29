<?php $usuarios = User::model()->findAll([
  'order' => 'nome ASC', 
]); ?>
<li class="collection-header black-text">
  <h5 style="padding-left:20px;">Outros usuários</h5>
</li>
<?php foreach ($usuarios as $u): ?>
  <?php if($u->id != Yii::app()->user->id): ?>
    <li><a href='<?=$this->createUrl('/perfil/index',['id'=>$u->id]);?>'>
        <?=ucfirst($u->nome);?>
    </a></li>
  <?php endif; ?>
<?php endforeach; ?>
