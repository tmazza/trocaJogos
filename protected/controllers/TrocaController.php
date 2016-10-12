<?php
class TrocaController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionAvaliar(){
    $this->render('avaliar');
  }

}
