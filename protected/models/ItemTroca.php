<?php

/**
 * This is the model class for table "item_troca".
 *
 * The followings are the available columns in table 'item_troca':
 * @property integer $troca_id
 * @property integer $itemParaTroca_id
 * @property integer $tipo
 */
class ItemTroca extends CActiveRecord
{

	const Oferecido = 1;
	const Solicitado = 2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_troca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('troca_id, itemParaTroca_id, tipo', 'required'),
			array('troca_id, itemParaTroca_id, tipo', 'numerical', 'integerOnly'=>true),
			array('troca_id, itemParaTroca_id, tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'troca' => [self::BELONGS_TO,'Troca','troca_id'],
			'itemParaTroca' => [self::BELONGS_TO,'ItemUsuario','itemParaTroca_id',
				'condition' => 'tipo = ' . ItemUsuario::TipoParaTroca,
			],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'troca_id' => 'Troca',
			'itemParaTroca_id' => 'Item Para Troca',
			'tipo' => 'Tipo',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemTroca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
