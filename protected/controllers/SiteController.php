<?php
class SiteController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionIndex(){
    if(Yii::app()->user->isGuest){
      $this->redirect($this->createUrl('/site/login'));
    } else {
      $this->render('index',[
        'trocas' => Troca::model()->minhasTrocasAtivas()->findAll(['order'=>'id DESC']),
      ]);
    }
  }

  public function actionCadastro()
  {
    $model = new CadastroForm;

    if (isset($_POST['CadastroForm'])) {
        $model->attributes = $_POST['CadastroForm'];
        if($model->validate()){
          $user = User::model()->add($model);
          if($user){
            if($model->logaUsuario($user)){
              Util::fsuc('Olá ' . $user->nome);
            }
          }
          $this->redirect($this->createUrl('/site/index'));
        }
    }

    $this->render('cadastro',array(
      'model' => $model,
    ));
  }

  public function actionLogin($rt=false) {
    $model = new LoginForm;
    if (isset($_POST['LoginForm'])) {
        $model->attributes = $_POST['LoginForm'];
        if ($model->validate() && $model->login()) {
          $this->redirect($this->createUrl('/site/index'));
        }
    }
    $this->render('login', [
      'model' => $model,
    ]);
  }

  public function actionLogout() {
      Yii::app()->user->logout(FALSE);
      $this->redirect(Yii::app()->homeUrl);
  }

  public function actionInsert($nome)
  {
    $email = strtolower($nome).rand(0,100).'@email.com';
    $user = User::addUser($nome,$email,'345');
    echo $email;
    echo '<hr>';
    $itens = Item::model()->findAll("visivel = 1");

    foreach ($itens as $i) {
      $id = new ItemUsuario();
      $id->tipo = ItemUsuario::TipoDesejado;
      $id->item_id = $i->id;
      $id->usuario_id = $user->id;
      $id->isNovo = 1;
      if(!$id->save()){
        echo '<pre>';
        print_r($id->getErrors());
        exit;
      }
      $id = new ItemUsuario();
      $id->tipo = ItemUsuario::TipoParaTroca;
      $id->item_id = $i->id;
      $id->usuario_id = $user->id;
      $id->isNovo = 1;
      if(!$id->save()){
        echo '<pre>';
        print_r($id->getErrors());
        exit;
      }
    }

  }

}
