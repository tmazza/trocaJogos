<?php

/**
 * This is the model class for table "troca_itemOferecido".
 *
 * The followings are the available columns in table 'troca_itemOferecido':
 * @property integer $troca_id
 * @property integer $itemParaTroca_id
 */
class TrocaItemOferecido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'troca_itemOferecido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('troca_id, itemParaTroca_id', 'required'),
			array('troca_id, itemParaTroca_id', 'numerical', 'integerOnly'=>true),
			array('troca_id, itemParaTroca_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
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
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrocaItemOferecido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
