<?php

/**
 * This is the model class for table "eventos".
 *
 * The followings are the available columns in table 'eventos':
 * @property integer $id
 * @property string $codocu
 * @property string $estadofinal
 * @property string $estadoinicial
 * @property string $descripcion
 * @property string $creadopor
 * @property string $creadoel
 */
class Eventos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Eventos the static model class
	 */
	public $descripcioncompleta;
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{eventos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('codocu', 'length', 'max'=>3),
			array('codocu','required','message'=>'Tienes que ingresar el documento'),
			array('estadofinal','required','message'=>'Tienes que ingresar el estado final'),
			array('estadoinicial','required','message'=>'Tienes que ingresar el estado origen'),
			array('descripcion','required','message'=>'Tienes que ingresar una descripcion'),
			//array('estadofinal, estadoinicial', 'length', 'max'=>2),
			array('descripcion', 'length', 'max'=>30),
			
			array('creadopor', 'length', 'max'=>20),
			array('creadoel', 'length', 'max'=>15),
			array('titulomsg1', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codocu, estadofinal, estadoinicial, descripcion, creadopor, creadoel', 'safe', 'on'=>'search'),
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
			'docume' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codocu' => 'Codocu',
			'estadofinal' => 'Estadofinal',
			'estadoinicial' => 'Estadoinicial',
			'descripcion' => 'Descripcion',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('estadofinal',$this->estadofinal,true);
		$criteria->compare('estadoinicial',$this->estadoinicial,true);
		$criteria->compare('descripcion',$this->descripcion,true);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function search_doc($documento)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('estadofinal',$this->estadofinal,true);
		$criteria->compare('estadoinicial',$this->estadoinicial,true);
		$criteria->compare('descripcion',$this->descripcion,true);


		$criteria->addcondition(" codocu='".$documento."'  ");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

public function Sepuedecambiarestado($docum,$estado1,$estado2) {	
		  $modeloevento=$this->find("estadoinicial='".$estado1."' and codocu='".$docum."' and estadofinal='".$estado2."'");
		  if (!$cadenita===null) {
		  	   
		  	   				 	return true;
		  	   				
				}else {
					return false;
				}


                                
                                
                                }
                                
                                
                                
   public function afterfind(){
       $this->descripcioncompleta="[".$this->codocu."]-".$this->docume->desdocu."-".$this->descripcion;
   }                             

}