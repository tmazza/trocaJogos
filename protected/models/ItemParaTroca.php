<?php

/**
 * This is the model class for table "item_paraTroca".
 *
 * The followings are the available columns in table 'item_paraTroca':
 * @property integer $id
 * @property string $nome
 * @property integer $usuario_id
 * @property integer $item_id
 * @property integer $isNovo
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 * @property Item $item
 */
class ItemParaTroca extends CActiveRecord
{
  public $tableClass;
  public $tipo;

  const LimiteGratuito = 20;

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'item_paraTroca';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    return array(
      array('usuario_id, item_id, isNovo', 'required'),
      array('usuario_id, item_id, isNovo', 'numerical', 'integerOnly'=>true),
      array('id, nome, usuario_id, item_id, isNovo', 'safe'),
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
    );
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return ItemParaTroca the static model class
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
