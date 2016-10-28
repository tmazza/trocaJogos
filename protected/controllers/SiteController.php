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

}
