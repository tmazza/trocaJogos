<?php

/**
 * This is the model class for table "item_usuario".
 *
 * The followings are the available columns in table 'item_usuario':
 * @property integer $id
 * @property string $nome
 * @property integer $usuario_id
 * @property integer $item_id
 * @property integer $isNovo
 * @property integer $tipo
 */
class ItemUsuario extends CActiveRecord
{

	const TipoDesejado = 1;
	const TipoParaTroca = 2;

	# Limite de cadastro de itens disponíveis para troca
	# para usuário não assinantes
	const LimiteGratuito = 20;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('usuario_id, item_id, isNovo, tipo', 'required'),
			array('usuario_id, item_id, isNovo, tipo', 'numerical', 'integerOnly'=>true),
			array('nome', 'safe'),
			array('id, nome, usuario_id, item_id, isNovo, tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
      'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
      'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'usuario_id' => 'Usuario',
			'item_id' => 'Item',
			'isNovo' => 'Is Novo',
			'tipo' => 'Tipo',
		);
	}

	public function scopes()
	{
		return [
			'paraTroca' => ['condition' => 'tipo = ' . self::TipoParaTroca],
			'desejado' => ['condition' => 'tipo = ' . self::TipoDesejado],
		];
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

  public function getPontos()
  {
    return $this->isNovo ? $this->item->pontuacaoNovo : $this->item->pontuacaoUsado;
  }

}
