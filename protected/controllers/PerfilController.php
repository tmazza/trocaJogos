<?php
class PerfilController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionIndex(){
    $this->render('index');
  }

}
