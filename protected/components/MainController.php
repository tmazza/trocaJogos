<?php
/**
 * Utilizado por todos Controller's da aplicação
 */
class MainController extends CController  {

    const fsuc = 'flash-success';
    const ferr = 'flash-error';
    const finf = 'flash-info';

    public $assetsDir;
    public $pagTitulo = 'Troca de jogos';
    public $pagDescricao = '';
    public $pagPalavras = '';
    public $user = false;

    protected function beforeAction($action) {
        $this->addScripts();
        return parent::beforeAction($action);
    }

    private function addScripts(){
      if (Yii::app()->request->isAjaxRequest) {
        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery-ui.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false;
      } else {
        Yii::app()->clientScript->registerCoreScript('jquery');
      }
    }

    public function actionError() {
        $erro = Yii::app()->errorHandler->error;
        $this->render('/site/erro',array(
          'erro' => $erro,
        ));
    }

}
