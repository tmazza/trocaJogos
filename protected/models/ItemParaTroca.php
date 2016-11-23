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
class ItemParaTroca extends ItemTroca
{

	const LimiteGratuito = 20;
  public function __construct()
  {
    $this->tipo = 'item_paraTroca';
  }

}
