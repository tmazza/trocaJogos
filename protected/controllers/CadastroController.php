<?php
class CadastroController extends MainController {

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
    $url = $lista == ItemUsuario::TipoDesejado ? 'desejo' : 'paraTroca';
    $model = new ItemUsuario;

    if(isset($_POST['ItemUsuario'])){
      $tipo = $_POST['tipo'];
      $model->attributes = $_POST['ItemUsuario'];
      $model->tipo = $lista;
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
        if($lista == ItemUsuario::TipoParaTroca 
          && count($this->user->itensParaTroca) >= ItemUsuario::LimiteGratuito)
        {
          Util::ferr('Você atingiu o limite de ' . ItemUsuario::LimiteGratuito . ' itens para sua conta gratuita. Assine para não ter limites.');
          $this->redirect($this->createUrl('/assinatura/index'));
        }

        if(!$model->save()){
          echo 'asda';
          exit;
        }
        Util::fsuc('Item incluído.');
        $this->redirect($this->createUrl('/cadastro/'.$url));
      }
    }

    $this->render('add',[
      'model' => $model,
      'lista' => $lista,
      'jogos' => Item::model()->getJogos(),
      'consoles' => Item::model()->getConsoles(),
    ]);
  }

}
