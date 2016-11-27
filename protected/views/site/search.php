<?php if(!Yii::app()->user->isGuest): ?>
  <?php $usuarios = Troca::model()->getMelhores(); ?>
  <li class="collection-header black-text">
    <h5 style="padding-left:20px;">Trocas possíveis</h5>
  </li>

  <?php if(count($usuarios) <= 0): ?>
    <div class="card-panel red" style="line-height:20px;margin: 10px;">
      Não há nenhuma pessoa que possua o que você deseja e ao mesmo tempo
      queira o que você possui. 
    </div>
  <?php endif; ?>

  <?php $comTroca = []; ?>
  <?php foreach ($usuarios as $u): ?>
    <?php $comTroca[] = $u->id; ?>
    <?php if($u->id != Yii::app()->user->id): ?>
      <li><a href='<?=$this->createUrl('/perfil/index',['id'=>$u->id]);?>'>
          <?=ucfirst($u->nome);?>
      </a></li>
    <?php endif; ?>
  <?php endforeach; ?>

  <hr style="color: white;">
  <li class="collection-header black-text">
    <h5 style="padding-left:20px;font-size:16px;color:#777;">Outras pessoas</h5>
  </li>

  <?php $outros = User::model()->findAll("id != " . Yii::app()->user->id); ?>
  <?php foreach ($outros as $u): ?>
    <?php if(!in_array($u->id, $comTroca)): ?>
      <?php if($u->id != Yii::app()->user->id): ?>
        <li><a style="font-size:12px" href='<?=$this->createUrl('/perfil/index',['id'=>$u->id]);?>'>
            <?=ucfirst($u->nome);?>
        </a></li>
      <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>