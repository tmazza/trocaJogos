<?php

/**
 * This is the model class for table "troca_itemSolicitado".
 *
 * The followings are the available columns in table 'troca_itemSolicitado':
 * @property integer $troca_id
 * @property integer $itemParaTroca_id
 */
class TrocaItemSolicitado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'troca_itemSolicitado';
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
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('troca_id',$this->troca_id);
		$criteria->compare('itemParaTroca_id',$this->itemParaTroca_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrocaItemSolicitado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
