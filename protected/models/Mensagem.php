<?php

/**
 * This is the model class for table "mensagem".
 *
 * The followings are the available columns in table 'mensagem':
 * @property integer $id
 * @property integer $remetente_id
 * @property integer $troca_id
 * @property string $corpo
 *
 * The followings are the available model relations:
 * @property Troca $troca
 * @property Usuario $remetente
 */
class Mensagem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mensagem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('remetente_id, troca_id, corpo', 'required'),
			array('remetente_id, troca_id', 'numerical', 'integerOnly'=>true),
			array('id, remetente_id, troca_id, corpo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'troca' => array(self::BELONGS_TO, 'Troca', 'troca_id'),
			'remetente' => array(self::BELONGS_TO, 'Usuario', 'remetente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'remetente_id' => 'Remetente',
			'troca_id' => 'Troca',
			'corpo' => 'Corpo',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mensagem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function euEnvie()
	{
		return $this->remetente_id == Yii::app()->user->id;
	}
}
