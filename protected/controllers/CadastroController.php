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
      'itens' => $this->user->itensDesejados,
    ]);
  }

  public function actionParaTroca()
  {
    $this->render('paraTroca',[
      'itens' => $this->user->itensParaTroca,
    ]);
  }

  public function actionAdd($lista)
  {
    $nomeModel = $lista == self::ListaDesejos ? 'ItemDesejado' : 'ItemParaTroca';
    $url = $lista == self::ListaDesejos ? 'desejo' : 'paraTroca';
    $model = new $nomeModel;

    if(isset($_POST[$nomeModel])){
      $tipo = $_POST['tipo'];
      $model->attributes = $_POST[$nomeModel];
      $model->usuario_id = Yii::app()->user->id;
      $model->isNovo = (int) ($model->isNovo == 'on');
      if($model->validate()){

        # fluxo alternativo 1
        if($tipo == 1 && strlen($model->nome) < 2){
          $this->user->descontaUm();
          Util::ferr('Nome deveria ter sido informado. 1 ponto foi reduzido da sua reputação.');
          $this->redirect($this->createUrl('/cadastro/'.$url));
        }

        # fluxo alternativo 2
        if($lista == self::ListaParaTroca 
          && count($this->user->itensParaTroca) >= ItemParaTroca::LimiteGratuito)
        {
          Util::ferr('Você atingiu o limite de ' . ItemParaTroca::LimiteGratuito . ' itens para sua conta gratuita. Assine para não ter limites.');
          $this->redirect($this->createUrl('/assinatura/index'));
        }

        $model->save();
        Util::fsuc('Item incluído.');
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
