<?php

class Masterequipo extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{masterequipo}}';
	}


	public function behaviors()
	{
		return array(
			'TreeBehavior' => array(
				'class' => 'ext.behaviors.XTreeBehavior',
				'treeLabelMethod'=> 'getTreeLabel',
				'label'=>$this->descripcion,
				'menuUrlMethod'=> 'getMenuUrl',
				'treeUrlMethod'=>'accion',
				/*'id'=>'codigo',*/
				/*'parent_id'=>'hidpadre'*/
			),
		);
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codart', 'required'),
			array('codart','exist','allowEmpty' => false, 'attributeName' => 'codigo', 'className' => 'Maestrocompo','message'=>'Este material no existe'),
			array('codigopadre','exist','allowEmpty' => true, 'attributeName' => 'codigo', 'className' => 'Masterequipo','message'=>'Este codigo de equipo no existe'),
			array('codigopadre','checkigual'),
			array('codart','checkrotativo','on'=>'insert,update'),

			//array('marca', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>40),
			array('modelo', 'length', 'max'=>25),
			array('numeroparte', 'length', 'max'=>20),
			array('codart', 'length', 'max'=>14),
			array('codigo, descripcion,codigopadre,id,cant, hidpadre,marca, modelo, numeroparte, codart, id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codigo, descripcion, marca, modelo, numeroparte, codart, id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'masterequipo' => array(self::BELONGS_TO, 'Masterequipo', 'codigopadre'),
			'canthijos'=>array(self::STAT, 'Masterequipo', 'hidpadre'),
			'parent' => array(self::BELONGS_TO, 'Masterequipo', 'parent_id'),
			'children' => array(self::HAS_MANY, 'Masterequipo', 'parent_id'),
			'childCount' => array(self::STAT, 'Masterequipo', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	/*public function attributeLabels()
	{
		return array(
			 'id' => Yii::t('ui', 'ID'),
                'parent_id' => Yii::t('ui', 'Parent'),
                'label' => Yii::t('ui', 'Label'),
                'position' => Yii::t('ui', 'Position'),
		);
	}
	/**
	 * @return string tree label
	 */
	public function getTreeLabel()
	{
		return $this->label . ':' . $this->childCount;
	}
	/**
	 * @return array menu url
	 */
	public function getMenuUrl()
	{
		if(Yii::app()->controller->action->id=='adminMenu')
			return array('admin', 'id'=>$this->id);
		else
			return array('index', 'id'=>$this->id);
	}
	/**
	 * Retrieves a list of child models
	 * @param integer the id of the parent model
	 * @return CActiveDataProvider the data provider
	 */
/*	public function getDataProvider($id=null)
	{
		if($id===null)
			$id=$this->TreeBehavior->getRootId();
		$criteria=new CDbCriteria(array(
			'condition'=>'parent_id=:id',
			'params'=>array(':id'=>$id),
			'order'=>'label',
			'with'=>'childCount',
		));
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'numeroparte' => 'N Parte',
			'codart' => 'Cod Material',

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

		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('marca',$this->marca);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('numeroparte',$this->numeroparte,true);
		$criteria->compare('codart',$this->codart,true);
		//$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Masterequipo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() {

  if($this->isNewRecord ) {
	  $this->codigo = $this->Correlativo ( 'codigo' , $criteria = null , '547' , null );
	  if($this->codigo <>'5470000000') {
		  if ( is_null ( $this->codigopadre )  or  $this->codigopadre=="" ){
			  $this->codigopadre = '5470000000';
			  $this->hidpadre=self::findByCodigo($this->codigopadre)->id;
			  $this->parent_id=self::findByCodigo($this->codigopadre)->id;

		  }else {
			 // var_dump($this->codigopadre);yii::app()->end();
		  }
		  $this->hidpadre=self::findByCodigo($this->codigopadre)->id;
		  $this->parent_id=self::findByCodigo($this->codigopadre)->id;
	  }else {

	  }

  }
		$regmaestro=Maestrocompo::model()->findByPk($this->codart);
		$this->descripcion=$regmaestro->descripcion;
		$this->marca=$regmaestro->marca;
		$this->modelo=$regmaestro->modelo;
		$this->numeroparte=$regmaestro->nparte;
		unset($regmaestro);
	return parent::beforeSave();
}

	public static function findByCodigo($codig){
		$codig=MiFactoria::cleanInput($codig);
		return self::model()->find("codigo=:vpadre",array(":vpadre"=>$codig));
	}

	public function checkrotativo($attribute,$params) {
		$maestrito=Maestrocompo::model()->findByPk($this->codart);
		IF(!is_null($maestrito))
		if(!$maestrito->esrotativo=='1')
			$this->adderror('codart','Este material no puede ser asociado al equipo porque no es rotativo');


	}

	public function checkigual($attribute,$params) {

		IF($this->codigo==$this->codigopadre and strlen(trim($this->codigo))>0)
				$this->adderror('codigopadre','El código padre y el código de este equipo no deben ser iguales');


	}

	public function accion(){
		return yii::app()->createUrl('Masterequipo/update/',array('id'=>$this->id));
	}





}
