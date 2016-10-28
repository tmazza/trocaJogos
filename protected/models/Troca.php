<?php

/**
 * This is the model class for table "troca".
 *
 * The followings are the available columns in table 'troca':
 * @property integer $id
 * @property integer $usuarioSolicitante_id
 * @property integer $usuarioQueDecide_id
 * @property integer $status
 * @property integer $valorParaUsuarioSolicitante
 * @property integer $valorParaUsuarioQueDecide
 * @property integer $avaliacaoSolicitante
 * @property integer $avaliacaoQueDecide
 * @property string $msgAvaliacaoSolicitante
 * @property string $msgAvaliacaoQueDecide
 *
 * The followings are the available model relations:
 * @property Mensagem[] $mensagems
 * @property Usuario $usuarioQueDecide
 * @property Usuario $usuarioSolicitante
 */
class Troca extends CActiveRecord
{

	const StatusAtiva = 1;
	const StatusArquivada = 0;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'troca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('usuarioSolicitante_id, usuarioQueDecide_id, status, valorParaUsuarioSolicitante, valorParaUsuarioQueDecide', 'required'),
			array('usuarioSolicitante_id, usuarioQueDecide_id, status, valorParaUsuarioSolicitante, valorParaUsuarioQueDecide, avaliacaoSolicitante, avaliacaoQueDecide', 'numerical', 'integerOnly'=>true),
			array('msgAvaliacaoSolicitante, msgAvaliacaoQueDecide', 'safe'),
			array('id, usuarioSolicitante_id, usuarioQueDecide_id, status, valorParaUsuarioSolicitante, valorParaUsuarioQueDecide, avaliacaoSolicitante, avaliacaoQueDecide, msgAvaliacaoSolicitante, msgAvaliacaoQueDecide', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'mensagems' => array(self::HAS_MANY, 'Mensagem', 'troca_id'),
			'usuarioQueDecide' => array(self::BELONGS_TO, 'User', 'usuarioQueDecide_id'),
			'usuarioSolicitante' => array(self::BELONGS_TO, 'User', 'usuarioSolicitante_id'),
			'itensSolicitados' => [self::HAS_MANY,'TrocaItemSolicitado','troca_id'],
			'itensOferecidos' => [self::HAS_MANY,'TrocaItemOferecido','troca_id'],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuarioSolicitante_id' => 'Usuario Solicitante',
			'usuarioQueDecide_id' => 'Usuario Que Decide',
			'status' => 'Status',
			'valorParaUsuarioSolicitante' => 'Valor Para Usuario Solicitante',
			'valorParaUsuarioQueDecide' => 'Valor Para Usuario Que Decide',
			'avaliacaoSolicitante' => 'Avaliacao Solicitante',
			'avaliacaoQueDecide' => 'Avaliacao Que Decide',
			'msgAvaliacaoSolicitante' => 'Msg Avaliacao Solicitante',
			'msgAvaliacaoQueDecide' => 'Msg Avaliacao Que Decide',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Troca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function scopes()
	{
		$id = Yii::app()->user->id;
		return [
			'minhasTrocasAtivas' => [
				'condition' => "(usuarioSolicitante_id = $id OR usuarioQueDecide_id = $id) " 
						. "AND status = " . self::StatusAtiva,
			],
		];
	}

	public function isSolicitante()
	{
		return $this->usuarioSolicitante_id == Yii::app()->user->id;
	}

	public function getValor()
	{
		return $this->isSolicitante() ? $this->valorParaUsuarioSolicitante : $this->valorParaUsuarioQueDecide;
	}

	public function getStringRecebe()
	{
		$recebe = $this->isSolicitante() ? $this->itensSolicitados : $this->itensOferecidos;
		return implode(' <b>+</b> ',$this->getStringListaItens($recebe));
	}
	public function getStringOferece()
	{
		$oferece = $this->isSolicitante() ? $this->itensOferecidos : $this->itensSolicitados;
		return implode(' <b>+</b> ',$this->getStringListaItens($oferece));
	}

	public function getStringListaItens($lista)
	{
		return array_map(function($i){
				$id = $i->itemParaTroca;
				return ($id->item->tipo == 0 ? 'Console' : 'Jogo' ) . ' '
				  . $id->item->nome 
					. (strlen($id->nome)>1 ? ' - ' . $id->nome : '')
					. ' - ' . ($id->isNovo ? 'Novo' : 'Usado');
			}, $lista);
	}

	public function getAvaliacao()
	{
		return $this->isSolicitante() ? $this->usuarioQueDecide->getAvaliacao() : $this->usuarioSolicitante->getAvaliacao();
	}

}
