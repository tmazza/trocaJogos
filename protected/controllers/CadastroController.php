<?php
class CadastroController extends MainController {

  const ListaDesejos = 1;
  const ListaParaTroca = 2;

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionDesejo()
  {
    $this->render('desejo',[
      'itens' => ItemDesejado::model()->doUsuario()->findAll(),
    ]);
  }

  public function actionParaTroca()
  {
    $this->render('paraTroca');
  }

  public function actionAdd($lista)
  {
    $nomeModel = $lista == self::ListaDesejos ? 'ItemDesejado' : 'ItemParaTroca';
    $model = new $nomeModel;

    if(isset($_POST[$nomeModel])){
      $model->attributes = $_POST[$nomeModel];
      $model->usuario_id = Yii::app()->user->id;
      $model->isNovo = (int) $model->isNovo;
      if($model->validate()){
        $model->save();
        $url = $lista == self::ListaDesejos ? 'desejo' : 'paraTroca';
        $this->redirect($this->createUrl('/cadastro/'.$url));
      }
    }

    $this->render('add',[
      'nomeModel' => $nomeModel,
      'model' => $model,
      'lista' => $lista,
      'jogos' => Item::model()->getJogos(),
      'consoles' => Item::model()->getConsoles(),
    ]);
  }

}
