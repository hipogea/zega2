<?php

/**
 * This is the model class for table "{{arbolcerti}}".
 *
 * The followings are the available columns in table '{{arbolcerti}}':
 * @property integer $id
 * @property integer $parent_id
 * @property string $titulo
 * @property string $status
 * @property integer $nivel
 */
class Arbolcerti extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{arbolcerti}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, parent_id, nivel', 'numerical', 'integerOnly'=>true),
			array('titulo, status', 'length', 'max'=>50),
                    array('enlaces,identidad,tipodoc,color,porcentaje,fechavenc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, titulo, status, nivel', 'safe', 'on'=>'search'),
		);
	}

        
         public function behaviors()
    {
        return array(
            'TreeBehavior' => array(
                'class' => 'ext.behaviors.XTreeBehavior',
                'treeLabelMethod'=> 'getTreeLabel',
                'menuUrlMethod'=> 'getMenuUrl',
            ),
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
            'parent' => array(self::BELONGS_TO, 'Arbolcerti', 'parent_id'),
            'children' => array(self::HAS_MANY, 'Arbolcerti', 'parent_id'),
            'childCount' => array(self::STAT, 'Arbolcerti', 'parent_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'titulo' => 'Titulo',
			'status' => 'Status',
			'nivel' => 'Nivel',
		);
	}

        
        /**
     * @return string tree label
     */
    public function getTreeLabel()
    {
        if($this->nivel=='2')
        return ucwords(strtolower ($this->titulo));
        return $this->titulo."   ".$this->childCount;
       
// return CHtml::openTag("span",array("style"=>"background-color:".$this->color.";  font-weight:bold;font-size:16px; color:white;border-radius:13px;padding:4px;")).$data->tipodoc.CHTml::closeTag("span").str_pad($this->titulo,($this->nivel==2)?60:0,'.',STR_PAD_RIGHT).':' . $this->childCount;
    }
    /**
     * @return array menu url
     */
    public function getMenuUrl()
    {
        return 0;
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
            'condition'=>'parent_id=:id',
            'params'=>array(':id'=>$id),
            'order'=>'label',
            'with'=>'childCount',
        ));
        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
            'pagination'=>false,
        ));
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

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('nivel',$this->nivel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Arbolcerti the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
