	<?php

/**
 * This is the model class for table "{{masterrelacion}}".
 *
 * The followings are the available columns in table '{{masterrelacion}}':
 * @property integer $id
 * @property integer $cant
 * @property integer $hidhijo
 * @property integer $hidpadre
 *
 * The followings are the available model relations:
 * @property Masterequipo $hidpadre0
 * @property Masterequipo $hidhijo0
 */
class Masterrelacion extends CActiveRecord
{
	
    
    public $codigoficticio;  ///propiedad para usarse para recibir el valor en el form 
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{masterrelacion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cant, hidhijo, hidpadre', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                    array('codigoficticio,id, cant, hidhijo, hidpadre,codigopadre,codigohijo', 'safe', 'on'=>'insert,update'),
			array('id, cant, hidhijo, hidpadre', 'safe', 'on'=>'search'),
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
			'padre' => array(self::BELONGS_TO, 'Masterequipo', 'hidpadre'),
			'hijo' => array(self::BELONGS_TO, 'Masterequipo', 'hidhijo'),
                    //'masterficticio' => array(self::BELONGS_TO, 'Masterequipo', 'codigoficticio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cant' => 'Cant',
			'hidhijo' => 'Hidhijo',
			'hidpadre' => 'Hidpadre',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('hidhijo',$this->hidhijo);
		$criteria->compare('hidpadre',$this->hidpadre);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_por_hijo($codigo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->addCondition("codigopadre=:vid");
		$criteria->params=Array(":vid"=>$codigo);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Masterrelacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        
            public function beforeSave() {
                $registrohijo=  Masterequipo::model()->findByPk($this->hidhijo);
                $this->hidhijo=$registrohijo->id;
                $registropadre=Masterequipo::model()->findByPk($this->hidpadre);
                $this->codigopadre=$registropadre->codigo;
                $this->codigohijo=$registrohijo->codigo;
                $registrohijo->setScenario('herencia');
                $registrohijo->codigopadre=$registropadre->codigo;
                 $registrohijo->parent_id=$registropadre->id;
			$registrohijo->save();unset($registropadre);unset($registrohijo);
                    
                            return parent::beforeSave();
                            }

        
        
        
}
