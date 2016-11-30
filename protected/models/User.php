<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 */
class User extends CActiveRecord
{

	const TipoGratuito = 0;
	const TipoAssinante = 1;

	public $senha2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('nome, email', 'required'),
			array('nome', 'length', 'max'=>128),
			array('email', 'length', 'max'=>400),
			array('senha', 'compare','compareAttribute'=>'senha2','on'=>'register', 
				'message' => 'A senha deve ser repetida.'),
			array('id, nome, email, senha', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'itensDesejados' => [self::HAS_MANY,'ItemUsuario','usuario_id',
				'order' => 'id DESC',
				'condition' => 'tipo = ' . ItemUsuario::TipoDesejado,
			],
			'itensParaTroca' => [self::HAS_MANY,'ItemUsuario','usuario_id',
				'order' => 'id DESC',
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
			'id' => 'ID',
			'nome' => 'Nome',
			'email' => 'Email',
			'senha' => 'Senha',
			'senha2' => 'Repita a senha',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Busca um usuário pelo email. (usado por hoauth login)
	 * @param string $email
	 * @access public
	 * @return User
	 */
	public static function findByEmail($email){
		return self::model()->findByAttributes(array('email' => $email));
	}

	public static function add($form){
		return self::addUser($form->nome,$form->email,$form->senha);
	}

	public static function addSocial($nome,$email,$socialId){
		return self::addUser($nome,$email,null,1,$socialId);
	}

	public static function addUser($nome,$email,$senha=null,$social=0,$socialId=null){
		$model = new User();
		$model->nome = $nome;
		$model->senha = CPasswordHelper::hashPassword($senha);
		$model->email = $email;
		$model->tipo = 1;
		if($model->save()){
			return $model;
		} else {
			return false;
		}
	}

	public function criarNovo(){
		$this->senha = CPasswordHelper::hashPassword($this->senha);
		return $this->save();
	}

	public function scopes(){
		return array();
	}

	public function descontaUm()
	{
		$this->somaAvaliacoes = $this->somaAvaliacoes - 1;
		if($this->somaAvaliacoes < 1)
			$this->somaAvaliacoes = 1;
		$this->update('somaAvaliacoes');
	}

	public function getPic()
	{
		$pics = [
		  'http://www.noviasalcedo.es/wp-content/uploads/2016/05/person-girl-flat.png',
		  'https://mir-s3-cdn-cf.behance.net/project_modules/disp/396f2d24539351.56335ec733642.png',
		  'https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png',
		  'http://www.iconsfind.com/wp-content/uploads/2015/08/20150831_55e46ad551392.png',
		  'http://www.iconsfind.com/wp-content/uploads/2015/10/20151012_561bae5f0713e.png',
		  'http://openplus.ca/images/photo.jpg',
		  'http://www.fdspt.rnu.tn/sites/default/files/teacher/flat-user_24.png',
		  'https://0.s3.envato.com/files/97977535/512/8_resize.png',
		  'https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_hiphop_guy-512.png',
		  'http://previews.123rf.com/images/provector/provector1501/provector150100144/35282212-Flat-Busness-Man-User-Profile-Avatar-in-Suit-icon-design-and-long-shadow-vector-illustration-for-web-Stock-Vector.jpg',
		  'http://media.istockphoto.com/vectors/businessman-profile-icon-male-portrait-flat-vector-id530838837?s=235x235',
		  'http://previews.123rf.com/images/gmast3r/gmast3r1503/gmast3r150300010/37887487-businessman-profile-icon-male-portrait-flat-Stock-Vector.jpg',
		  'http://i.istockimg.com/file_thumbview_approve/63789905/5/stock-illustration-63789905-businessman-asian-race-profile-icon-hispanic-male-portrait.jpg',
		];
		return $pics[$this->id % count($pics)];
	}

	public function getAvaliacao()
	{
		if($this->qtdTrocaRealizadas > 0){
			return ceil($this->somaAvaliacoes / $this->qtdTrocaRealizadas);
		} else {
			return 0;
		}
	}

	public function incrementaTrocas()
	{
		$this->qtdTrocaRealizadas += 1;
		$this->update(['qtdTrocaRealizadas']);
	}

}
