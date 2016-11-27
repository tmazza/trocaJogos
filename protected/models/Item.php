<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property string $nome
 * @property integer $tipo
 * @property string $urlFoto
 * @property integer $pontuacaoNovo
 * @property integer $pontuacaoUsado
 *
 * The followings are the available model relations:
 * @property ItemDesejado[] $itemDesejados
 * @property ItemParaTroca[] $itemParaTrocas
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('nome, tipo, urlFoto, pontuacaoNovo, pontuacaoUsado', 'required'),
			array('tipo, pontuacaoNovo, pontuacaoUsado', 'numerical', 'integerOnly'=>true),
			array('id, nome, tipo, urlFoto, pontuacaoNovo, pontuacaoUsado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'itemDesejados' => array(self::HAS_MANY, 'ItemDesejado', 'item_id'),
			'itemParaTrocas' => array(self::HAS_MANY, 'ItemParaTroca', 'item_id'),
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
			'tipo' => 'Tipo',
			'urlFoto' => 'Url Foto',
			'pontuacaoNovo' => 'Pontuacao Novo',
			'pontuacaoUsado' => 'Pontuacao Usado',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getJogos()
	{
		return $this->findAll([
			'condition' => 'tipo = 1 and visivel = 1',
			'order' => 'nome ASC',
		]);
	}

	public function getConsoles()
	{
		return $this->findAll([
			'condition' => 'tipo = 0 and visivel = 1',
			'order' => 'nome ASC',
		]);
	}

}
