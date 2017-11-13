<?php

/**
 * This is the model class for table "{{opera_codep}}".
 *
 * The followings are the available columns in table '{{opera_codep}}':
 * @property string $codep
 * @property string $codtra
 * @property string $finicio
 * @property string $codof
 *
 * The followings are the available model relations:
 * @property Trabajadores $codtra0
 * @property Embarcaciones $codep0
 */
class OperaCodep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{opera_codep}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codep, codof', 'length', 'max'=>3),
			array('codtra', 'length', 'max'=>4),
			array('finicio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codep, codtra, finicio, codof', 'safe', 'on'=>'search'),
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
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
			'embarcaciones' => array(self::BELONGS_TO, 'Embarcaciones', 'codep'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codep' => 'Codep',
			'codtra' => 'Codtra',
			'finicio' => 'Finicio',
			'codof' => 'Codof',
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

		$criteria->compare('codep',$this->codep,true);
		$criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('finicio',$this->finicio,true);
		$criteria->compare('codof',$this->codof,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperaCodep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        //busca la embarcacion de acuerdo al usuario 
        //asignado al trabjador y este trabajador a la embarcacion  
        public static function getEp(){
            if(yii::app()->user->isGuest){
                return false;
            }else{
                $codigo=Trabajadores::getCodigoFromUsuario(yii::app()->user->id) ;
                if(is_null($codigo)){
                    return false;
                }else{
                    $registro=self::model()->find("codtra=:vcodtra",array(":vcodtra"=>$codigo));
                     if (is_null($registro)){
                         return false;
                     }else{
                         return array('barco'=>$registro->codep,'ofic'=>$registro->codof);
                     }
                }
                }
            
        }
}
