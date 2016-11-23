<?php

/**
 * This is the model class for table "item_desejado".
 *
 * The followings are the available columns in table 'item_desejado':
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
class ItemDesejado extends ItemTroca
{

  public function __construct()
  {
    $this->tipo = 2;
  }

	public function scopes()
	{
		return [
			'doUsuario' => [
				'condition' => 'usuario_id = ' . Yii::app()->user->id,
				'order' => 'id DESC',
			],
		];
	}

}
