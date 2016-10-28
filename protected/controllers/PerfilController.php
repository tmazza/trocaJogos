<?php
class PerfilController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionIndex($id){
    $this->render('index',[
      'user' => User::model()->findByPk((int)$id),
    ]);
  }

}
