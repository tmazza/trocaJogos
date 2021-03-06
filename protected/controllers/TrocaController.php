<?php
class TrocaController extends MainController {

  protected function beforeAction($action){
    return parent::beforeAction($action);
  }

  public function actionAvaliar($id){
    $troca = Troca::model()->findByPk((int) $id);

    if($troca->status == Troca::StatusParaAvaliar){
      $this->redirect($this->createUrl('/troca/qualificar',[
        'id' => $troca->id,
      ]));
    }

    $user = $troca->isSolicitante() ? $troca->usuarioQueDecide : $troca->usuarioSolicitante;

    if(isset($_POST['msg'])){
      $model = new Mensagem();
      $model->corpo = $_POST['msg'];
      $model->remetente_id = Yii::app()->user->id;
      $model->troca_id = $troca->id;
      if($model->save()){
        Util::fsuc('Mensagem enviada.');
      } elseif(strlen($model->corpo) < 1) {
        Util::ferr('Escreva algo.');
      }
    }

    $this->render('avaliar',[
      'troca' => $troca,
      'user' => $user,
    ]);
  }

  public function actionQualificar($id)
  {
    $troca = Troca::model()->findByPk((int) $id);


    if(isset($_POST['rating'])){
      $rating = (int) $_POST['rating'];
      $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;

      if($troca->isSolicitante()){
        # salva avaliação
        $troca->avaliacaoSolicitante = (int) $rating;
        $troca->msgAvaliacaoSolicitante = $comentario;
        $troca->update(['avaliacaoSolicitante','msgAvaliacaoSolicitante']);
        # atualiza o perfil do outro usuário
        $troca->usuarioQueDecide->somaAvaliacoes += $rating;
        $troca->usuarioQueDecide->update(['somaAvaliacoes']);
      } else {
        # salva avaliação
        $troca->avaliacaoQueDecide = (int) $rating;
        $troca->msgAvaliacaoQueDecide = $comentario;
        $troca->update(['avaliacaoQueDecide','msgAvaliacaoQueDecide']);
        # atualiza o perfil do outro usuário
        $troca->usuarioSolicitante->somaAvaliacoes += $rating;
        $troca->usuarioSolicitante->update(['somaAvaliacoes']);
      }
      if($troca->isAvaliadaPelosDois()){
        $troca->arquivar();
      }
      Util::fsuc('Troca avaliada.');
      $this->redirect($this->createUrl('/site/index'));

    }

    $this->render('qualificar',[
      'troca' => $troca,
    ]);
  }

  public function actionPropor($id){
    $user = User::model()->findByPk((int)$id);

    $itensTenho = $this->getItensTenho($user);
    $itensQuero = $this->getItensQuero($user);

    if(isset($_POST['oferece']) && isset($_POST['recebe'])){
      $oferece = array_keys($_POST['oferece']);
      $recebe = array_keys($_POST['recebe']);
      
      $valorOferece = $valorRecebe = 0;
      foreach ($oferece as $id) {
        $ipt = ItemUsuario::model()->findByPk((int)$id);
        $valorOferece+=$ipt->getPontos();
      }
      foreach ($recebe as $id) {
        $ipt = ItemUsuario::model()->findByPk((int)$id);
        $valorRecebe+=$ipt->getPontos();
      }

      $model = new Troca();
      $model->usuarioSolicitante_id = Yii::app()->user->id;
      $model->usuarioQueDecide_id = $user->id;
      $model->status = Troca::StatusAtiva;
      $model->valorParaUsuarioSolicitante = $valorRecebe - $valorOferece;
      $model->valorParaUsuarioQueDecide = $valorOferece - $valorRecebe;
      $model->save();

      foreach ($oferece as $id) {
        $relacao = new ItemTroca();
        $relacao->tipo = ItemTroca::Oferecido;
        $relacao->troca_id = $model->id;
        $relacao->itemParaTroca_id = $id;
        $relacao->save();
      }

      foreach ($recebe as $id) {
        $relacao = new ItemTroca();
        $relacao->tipo = ItemTroca::Solicitado;
        $relacao->troca_id = $model->id;
        $relacao->itemParaTroca_id = $id;
        $relacao->save();
      }

      Util::fsuc('Proposta de troca enviada.');
      $this->redirect($this->createUrl('/perfil/index',[
        'id' => $user->id,
      ]));

    }

    $this->render('propor',[
      'user' => $user,
      'itensQuero' => $itensQuero,
      'itensTenho' => $itensTenho,
    ]);
  }


  public function actionCancelar($id)
  {
    $troca = Troca::model()->findByPk((int) $id);
    $troca->arquivar();
    Util::fsuc('Proposta de troca cancelada.');
    $this->redirect($this->createUrl('/site/index'));
  }

  public function actionRecusar($id)
  {
    $troca = Troca::model()->findByPk((int) $id);
    $troca->arquivar();
    Util::fsuc('Proposta de troca recusada.');
    $this->redirect($this->createUrl('/site/index'));
  }

  public function actionAceitar($id)
  {
    $troca = Troca::model()->findByPk((int) $id);
    $troca->aceitarProposta();
    Util::fsuc('Troca realizada! Avalie como foi troca.');
    $this->redirect($this->createUrl('/troca/avaliar',['id'=>$troca->id]));
  }

  private function getItensTenho($user)
  {
    $meusParaTroca = array_map(function($i){
      return $i->item_id;      
    },$this->user->itensParaTroca);
    $deleDesejados = array_map(function($i){
      return $i->item_id;      
    },$user->itensDesejados);

    return array_intersect($meusParaTroca, $deleDesejados);
  }
  
  private function getItensQuero($user)
  {
    $meusDesejos = array_map(function($i){
      return $i->item_id;      
    },$this->user->itensDesejados);
    $deleParaTroca = array_map(function($i){
      return $i->item_id;      
    },$user->itensParaTroca);

    return array_intersect($meusDesejos, $deleParaTroca);
  }


}
