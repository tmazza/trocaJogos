<?php
class CadastroController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionDesejo(){
    $this->render('desejo');
  }
  public function actionParaTroca(){
    $this->render('paraTroca');
  }

}
