<?php

/**
 * This is the model class for table "{{opera_tempplan}}".
 *
 * The followings are the available columns in table '{{opera_tempplan}}':
 * @property integer $hidplan
 * @property string $fechacontrol
 * @property string $fechaejec
 * @property string $porc
 * @property string $tiempofalta
 * @property string $color
 * @property string $texto
 * @property integer $iduser
 */
class OperaTempplan extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{opera_tempplan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('hidplan, iduser', 'numerical', 'integerOnly'=>true),
			//array('fechacontrol, fechaejec', 'length', 'max'=>20),
			array('hidplan,fechaejec,labor,porc', 'safe'),
                    array('fechaejec', 'chkfecha','on'=>'editatemp'),
                    array('hidplan,texto,fechaejec,labor', 'safe','on'=>'editatemp,copiatemp'),
                     array('texto,fechaejec,labor', 'safe','on'=>'search_por_user'),
                    //array('hidplan,texto,fechaejec,labor', 'safe','on'=>'editatemp'),
			//array('tiempofalta', 'length', 'max'=>50),
			//array('color, texto', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hidplan, fechacontrol, fechaejec, porc, tiempofalta, color, texto, iduser', 'safe', 'on'=>'search'),
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
                    'operaplanes' => array(self::BELONGS_TO, 'OperaPlanes', 'hidplan'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hidplan' => 'Hidplan',
			'fechacontrol' => 'Fechacontrol',
			'fechaejec' => 'Fechaejec',
			'porc' => 'Porc',
			'tiempofalta' => 'Tiempofalta',
			'color' => 'Color',
			'texto' => 'Texto',
			'iduser' => 'Iduser',
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

		$criteria->compare('hidplan',$this->hidplan);
		$criteria->compare('fechacontrol',$this->fechacontrol,true);
		$criteria->compare('fechaejec',$this->fechaejec,true);
		$criteria->compare('porc',$this->porc,true);
		$criteria->compare('tiempofalta',$this->tiempofalta,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function search_por_user()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
$criteria->addCondition("iduser=".yii::app()->user->id);
//$criteria->params=array(":viduser"=>yii::app()->user->id);
		$criteria->compare('hidplan',$this->hidplan);
		$criteria->compare('fechacontrol',$this->fechacontrol,true);
		$criteria->compare('fechaejec',$this->fechaejec,true);
		$criteria->compare('porc',$this->porc,true);
		$criteria->compare('tiempofalta',$this->tiempofalta,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('labor',$this->labor,TRUE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperaTempplan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function beforesave(){
            IF($this->isNewRecord){
                $this->fechacontrol=date('Y-m-d H:i:s');
                $this->iduser=yii::app()->user->id;
                $fechaultima=$this->operaplanes->ultimafecha;
                if(!is_null($fechaultima)){
                  $fechafinal= date('Y-m-d H:i:s',strtotime($fechaultima) + 60*60*($this->operaplanes->frecuencia));
                }
                $this->tiempofalta= MiFactoria::tiempopasado(date('Y-m-d H:i:s'),$fechafinal,'h');
            }
            return parent::beforesave();
        }
        
        public function color($valor){
            if($valor <= 40)
                return "success";
            if($valor <= 80 and $valor > 40 )
                return "warning";
            if($valor >= 80 )
                return "danger";
        }
        public function aftersave(){
            if(!($this->isNewRecord) and $this->cambiocampo('fechaejec')
                    ){
            $reglog=New OperaLogtareas('basico');
                            $reglog->setAttributes(array(
                                    'hidplan'=>$this->hidplan,
                                    'fechaejec'=>$this->fechaejec,
                                        'explicacion'=>$this->texto,
                                    ));
                            $reglog->save();
                            $this->delete();
            return parent::aftersave();
            }
        }
        public function chkfecha($attribute,$params) {
	    //  $matriz= Docomprat::model()->findAll("idsesion=:idsesionx",array("idsesionx"=>Yii::app()->user->getId())); 
		if(strtotime($this->fechaejec)>strtotime(date('Y-m-d H:i:s')))
                    $this->adderror('fehaejec','Esta fecha es el futuro');
           
        }
}
