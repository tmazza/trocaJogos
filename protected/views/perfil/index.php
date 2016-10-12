<?php $stars = 3; ?>
<div class="row">
  <div class="col s4">
   <img src="<?=Yii::app()->baseUrl;?>/images/female.jpeg" style='width:90px;' alt="" class="circle responsive-img"/>
  </div>  
  <div class="col s8 flow-text">
    <h5>Jane Doe</h5>
    <b>12</b> trocas realizadas<br>
    Reputação: 
    <?php for($i=0;$i<5;$i++): ?>
      <?php if($i+1 > $stars): ?>
        <i class="material-icons grey-text">star</i>
      <?php else: ?>
        <i class="material-icons amber-text">star</i>
      <?php endif; ?>
    <?php endfor; ?>  
  </div>  
</div>
<br>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1" class=" black-text">Avaliações</a></li>
        <li class="tab col s3"><a href="#test2" class=" black-text">Itens para troca</a></li>
        <li class="tab col s3"><a href="#test3" class=" black-text">Itens desejados</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
      <br>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/male2.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
               rum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem 
              </span>
            </div>
          </div>
            <div class="right">
              <?php for($i=0;$i<5;$i++): ?>
                <?php if($i+1 > 3): ?>
                  <i class="material-icons grey-text">star</i>
                <?php else: ?>
                  <i class="material-icons amber-text">star</i>
                <?php endif; ?>
              <?php endfor; ?>  
            </div>
            <br>
        </div>
      </div>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/male.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                eir duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we li
              </span>
            </div>
          </div>

            <div class="right">
              <?php for($i=0;$i<5;$i++): ?>
                <?php if($i+1 > 5): ?>
                  <i class="material-icons grey-text">star</i>
                <?php else: ?>
                  <i class="material-icons amber-text">star</i>
                <?php endif; ?>
              <?php endfor; ?>  
            </div>
            <br>
        </div>
      </div>
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/profile_female.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                Lorem ipsum dolorna aliqua. Ut enim ad  aute irure dolor in reprehenderit in voluptate velit esse cillu
              </span>
            </div>
          </div>
          <div class="right">
            <?php for($i=0;$i<5;$i++): ?>
              <?php if($i+1 > 4): ?>
                <i class="material-icons grey-text">star</i>
              <?php else: ?>
                <i class="material-icons amber-text">star</i>
              <?php endif; ?>
            <?php endfor; ?>  
          </div>
          <br>
        </div>
      </div>
          
    </div>
    <div id="test2" class="col s12">
      <br>
      <h5>Itens disponíveis para troca</h5>
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/ps3.jpeg" alt="" class="responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10 flow-text">
              <span class="black-text">
              Console PS3
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/j-ps3-2.jpeg" alt="" class="responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10 flow-text">
              <span class="black-text">
              PES 2017 para  PS3
              </span>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div id="test3" class="col s12">
      <br>
      <h5>Itens desejados</h5>      
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/ps4.jpeg" alt="" class="responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10 flow-text">
              <span class="black-text">
              Console PS4
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="images/j-ps3-1.jpeg" alt="" class="responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10 flow-text">
              <span class="black-text">
                call of duty para  PS3
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<style type="text/css">
  .tabs .indicator{
    background: #1565C0!important;
  }
</style>