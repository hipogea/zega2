<?php

/**
 * This is the model class for table "{{pruebaarbol}}".
 *
 * The followings are the available columns in table '{{pruebaarbol}}':
 * @property string $codigo
 * @property string $codigopadre
 * @property string $descripcion
 */
class Pruebaarbol extends CActiveRecord
{
	public $parentPath;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pruebaarbol}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, codigopadre, descripcion', 'required'),
			array('codigo, codigopadre', 'length', 'max'=>3),
			array('descripcion', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codigo, codigopadre, descripcion', 'safe', 'on'=>'search'),
		);
	}


	public function behaviors()
	{
		return array(
			'TreeBehavior' => array(
				'class' => 'ext.behaviors.XTreeBehavior',
				'treeLabelMethod'=> 'getTreeLabel',
				'label'=>$this->descripcion,
				'menuUrlMethod'=> 'getMenuUrl',
				/*'id'=>'codigo',
				'parent_id'=>'codigopadre',*/
			),
		);
	}


	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Pruebaarbol', 'parent_id'),
			'children' => array(self::HAS_MANY, 'Pruebaarbol', 'parent_id'),
			'childCount' => array(self::STAT, 'Pruebaarbol', 'parent_id'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo' => 'Codigo',
			'codigopadre' => 'Codigopadre',
			'id' => 'Identidad',
			'parent_id' => 'identda padre',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('codigopadre',$this->codigopadre,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pruebaarbol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


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
	public function getDataProvider($id=null)
	{
		if($id===null)
			$id=$this->TreeBehavior->getRootId();
		$criteria=new CDbCriteria(array(
			'condition'=>'codigopadre=:id',
			'params'=>array(':id'=>$id),
			//'order'=>'label',
			'with'=>'childCount',
		));
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

}
