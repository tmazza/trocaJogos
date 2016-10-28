<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'cadastro-form-asd-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
      'class' => 'uk-form uk-form-stacked'
    ),
));
?>
<fieldset>
    <legend>Criar uma conta</legend>
    <div class="uk-grid">
      <div >
        <?php echo $form->labelEx($model,'nome'); ?>
        <?php echo $form->textField($model,'nome',array('class'=>'uk-width-1-1')); ?>
        <?php echo $form->error($model,'nome'); ?>
      </div>
      <div >
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->emailField($model,'email',array('class'=>'uk-width-1-1')); ?>
        <?php echo $form->error($model,'email'); ?>
      </div>
      <div>
        <?php echo $form->labelEx($model,'senha'); ?>
        <?php echo $form->passwordField($model,'senha',array('class'=>'uk-width-1-1')); ?>
        <?php echo $form->error($model,'senha'); ?>
      </div>
      <div>
        <?php echo $form->labelEx($model,'senhaConfirma'); ?>
        <?php echo $form->passwordField($model,'senhaConfirma',array('class'=>'uk-width-1-1')); ?>
        <?php echo $form->error($model,'senhaConfirma'); ?>
      </div>
    </div>
    <br>
    <div class="uk-text-right">
      <?php echo CHtml::submitButton('Criar conta', [
        'class'=>'waves-effect waves-light btn blue darken-3',

      ]); ?>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
<?=CHtml::link('Já tem cadastro?', $this->createUrl('/site/login'));?>
