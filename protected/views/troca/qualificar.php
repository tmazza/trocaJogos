<p class="flow-text">Como você qualifica a troca?</p>
<div class="card card-panel">
  <?=CHtml::beginForm();?>
    <br><br>
    
    <?php
    $this->widget('CStarRating',array(
      'name'=>'rating',
      'starWidth'=>400,
      'minRating'=>1,
      'maxRating'=>5,
      'allowEmpty'=>false,
    ));
    ?>
    <br><br><br>
    Comente
    <br>
    <?=CHtml::textarea('comentario',null,[ 
      'class'=>'materialize-textarea',
      'placeholder'=>'Escreva algo...',
    ]);?>
    
    <br>
    <?=CHtml::submitButton('Qualificar troca',['class'=>'btn indigo darken-1']);?>
  <?=CHtml::endForm();?>  
</div>