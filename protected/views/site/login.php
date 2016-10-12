<div class="uk-grid">
  <div class="uk-width-medium-1-2 uk-width-small-1-1">
    <div class="uk-align-center">
      <br><br>
      <br><br>
      <?= CHtml::link('Criar uma conta', $this->createUrl('/site/cadastro'),array('class'=>'uk-button uk-button-link','style'=>'width:100%')); ?>
      <div >
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => [
              'class'=>'uk-form uk-form-stacked'
            ],
        ));
        ?>
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('tabindex'=>1)); ?>
        <?php echo $form->error($model, 'username'); ?>
        <br>
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('tabindex'=>2)); ?>
        <?php echo $form->error($model, 'password'); ?>
        <br>
        <br>
        <?php echo CHtml::submitButton('Entrar', []); ?>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</div>