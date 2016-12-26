<?php

/**
 * This is the model class for table "tenores".
 *
 * The followings are the available columns in table 'tenores':
 * @property string $coddocu
 * @property string $mensaje
 * @property string $posicion
 * @property string $creadoel
 * @property string $modificadopor
 * @property string $modificadoel
 * @property string $creadopor
 * @property string $activo
 * @property string $logo
 * @property integer $id
 */
class Tenores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tenores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenores}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coddocu,sociedad, posicion', 'required'),
			array('coddocu', 'length', 'max'=>3),
			array('posicion, activo', 'length', 'max'=>1),
			//array('creadoel, modificadoel', 'length', 'max'=>20),
			//array('modificadopor, creadopor', 'length', 'max'=>25),
			array('logo', 'length', 'max'=>360),
			array('mensaje,sociedad', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('coddocu, estilomail,mensaje, posicion, activo, logo, id', 'safe', 'on'=>'search'),
		array('coddocu, estilomail,mensaje, posicion, activo,'
                    . ' logo,css_th,css_body,css_h1,css_p,css_table,css_td,css_tr'
                    , 'safe', 'on'=>'insert,update'),
		
                    
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'coddocu' => 'Coddocu',
			'mensaje' => 'Mensaje',
			'posicion' => 'Posicion',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'creadopor' => 'Creadopor',
			'activo' => 'Activo',
			'logo' => 'Logo',
			'id' => 'ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search_por_docu($docu)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('posicion',$this->posicion,true);




		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('id',$this->id);
        $criteria->addcondition("coddocu='".$docu."'");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('posicion',$this->posicion,true);




		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function buscatenor($docu,$pos,$sociedad)
    {
        $docu = MiFactoria::cleanInput($docu);
        $pos = MiFactoria::cleanInput($pos);
        $sociedad = MiFactoria::cleanInput($sociedad);
        $crite = New CDbCriteria;
        $crite->addCondition("coddocu=:vdocu", 'AND');
        $crite->addCondition("posicion=:vpos",'AND');
        $crite->addCondition("sociedad=:vsociedad",'AND');
        $crite->params=array(
            ":vpos"=>$pos,
            ":vdocu"=>$docu,
            ":vsociedad"=>$sociedad,
        );
        return self::model()->find($crite);

    }
    
    public static function buscaestilo($docu,$pos,$sociedad,$etiqueta)
    {
       $registro= self::buscatenor($docu, $pos, $sociedad);
       $campo='css_'.$etiqueta;
      // var_dump($campo);die();
       return (is_null($registro->{$campo}))?'':$registro->{$campo};

    }

    public  function estiliza($mensaje=null){
        $patrones=array('/class=[\"\']{1}[A-Za-z0-9]*[\"\']{1}/','/\<span/','/\<tr/','/\<td/','/\<th/');
        //$campos=array('css_body','css_tr','css_td','css_th');
        $reemplazos=array(
            '',
            '<span '.$this->css_body,
            '<tr '.$this->css_tr,
            '<td '.$this->css_td,
             '<th '.$this->css_th,
            );
       $mensaje=preg_replace ($patrones , $reemplazos , (is_null($mensaje))?$this->mensaje:$mensaje);
       return $mensaje;
        
    }
    
    
    
    public function beforesave(){
        $this->estilomail=CHtml::encode($this->estilomail);
        $this->css_h1=CHtml::encode($this->css_h1);
        $this->css_p=CHtml::encode($this->css_p);
        $this->css_table=CHtml::encode($this->css_table);
        $this->css_td=CHtml::encode($this->css_td);
        $this->css_tr=CHtml::encode($this->css_tr);
        $this->css_body=CHtml::encode($this->css_body);
        $this->css_th=CHtml::encode($this->css_th);
        return parent::beforeSave();
    }
    public function afterfind(){
        $this->estilomail=CHtml::decode($this->estilomail);
        $this->css_h1=CHtml::decode($this->css_h1);
        $this->css_p=CHtml::decode($this->css_p);
        $this->css_table=CHtml::decode($this->css_table);
        $this->css_td=CHtml::decode($this->css_td);
        $this->css_tr=CHtml::decode($this->css_tr);
        $this->css_body=CHtml::decode($this->css_body);
         $this->css_th=CHtml::decode($this->css_th);
        
        return parent::beforeSave();
    }
    
}



