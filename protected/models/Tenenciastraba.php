<?php

/**
 * This is the model class for table "{{tenenciastraba}}".
 *
 * The followings are the available columns in table '{{tenenciastraba}}':
 * @property integer $id
 * @property string $codte
 * @property string $codtra
 *
 * The followings are the available model relations:
 * @property Tenencias $codte0
 * @property Trabajadores $codtra0
 */
class Tenenciastraba extends CActiveRecord
{
	const CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS='280';
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenenciastraba}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codte, codtra', 'length', 'max'=>4),
                    array('codte, codtra', 'required', 'on'=>'insert,update'),
                     array('codtra+codte', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update'),
		array('activo', 'safe','on'=>'estado'),
		
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codte, codtra', 'safe', 'on'=>'search'),
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
			'tenencias' => array(self::BELONGS_TO, 'Tenencias', 'codte'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
                    'nprocesosdocu' => array(self::STAT, 'Procesosdocu', 'hidtra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codte' => 'Codte',
			'codtra' => 'Codtra',
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
	public function search_por_tenencia($codte)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
       $parametro=  MiFactoria::cleanInput($codte);
		$criteria=new CDbCriteria;

		
		$criteria->addCondition('codte=:VCODTE');
                $criteria->params=array(':VCODTE'=>$codte);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenenciastraba the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforesave(){
            if($this->isNewRecord)
            $this->activo='1';
            return parent::beforesave();
        }
        
        public static function getIdHidtraByTrabajador($codte){ 
            if(is_null($codte))
                $codte='100';
    //if(yii::app()->user->id==$id){
                $codi=Yii::app()->user->getField('codtra');
          //  }else{
                //$codi=Yii::app()->user->um->getFieldValue(Yii::app()->user->um->loadUserById($id,true),'codtra');
                //yii::app()->user->um->getFieldValue(yii::app()->user->id,'codpro');
            //}
    $hallados=self::model()->findAll("codtra=:vcodtra and codte=:vcodte",array(":vcodtra"=>$codi,":vcodte"=>$codte));
    if(count($hallados)>0){
        return $hallados[0]->id; 
    }else{
        return null;
    }
    
}
        
}
