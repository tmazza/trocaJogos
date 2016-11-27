<?php
class PerfilController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionIndex($id){
    $this->render('index',[
      'trocas' => Troca::model()->findAll([
        'condition' => "(usuarioSolicitante_id = {$id} OR usuarioQueDecide_id = {$id})",
        'order' => 'id DESC',
      ]),
      'user' => User::model()->findByPk((int)$id),
    ]);
  }

}
