<?php

/**
 * This is the model class for table "{{regimen}}".
 *
 * The followings are the available columns in table '{{regimen}}':
 * @property integer $id
 * @property string $desregimen
 * @property string $dias
 * @property integer $porcextras
 * @property integer $porcdomingo
 * @property integer $porcfer
 * @property integer $horasdia
 * @property integer $facdominical
 * @property string $frecpago
 * @property string $turno
 * @property string $acumuladomingo
 * @property string $tarifamensual
 *
 * The followings are the available model relations:
 * @property Detot[] $detots
 */
class Regimen extends ModeloGeneral
{
	
    
     
    
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{regimen}}';
	}

        
        public function init(){
            $this->campossensibles=array(
        'hinicio','horasdia','turno'
            );
            return parent::init();
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desregimen,hinicio,turno,horasdia', 'required'),
                     array('desregimen,hinicio,turno,horasdia,activo', 'safe'),
			array('porcextras, porcdomingo, porcfer, horasdia', 'numerical', 'integerOnly'=>true),
                    array('tarifamensual', 'checkvalores'),
			array('desregimen', 'length', 'max'=>30),
			array('dias, frecpago', 'length', 'max'=>5),
			array('turno, acumuladomingo, tarifamensual', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, desregimen, dias, porcextras, porcdomingo, porcfer, horasdia, facdominical, frecpago, turno, acumuladomingo, tarifamensual', 'safe', 'on'=>'search'),
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
			'detots' => array(self::HAS_MANY, 'Detot', 'hidregimen'),
                        'dailyworks' => array(self::HAS_MANY, 'Dailywork', 'hidturno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'desregimen' => 'Descripcion',
			'dias' => 'Programa',
			'porcextras' => 'Fac HE',
			'porcdomingo' => 'Fac Dom',
			'porcfer' => 'Fac Fer',
			'horasdia' => 'Horas dia',
			//'facdominical' => 'Cargo dominical',
			'frecpago' => 'Frec Pago',
			'turno' => 'Turno',
			'acumuladomingo' => 'Dominical',
			'tarifamensual' => 'Mensual',
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
		$criteria->compare('desregimen',$this->desregimen,true);
		$criteria->compare('dias',$this->dias,true);
		$criteria->compare('porcextras',$this->porcextras);
		$criteria->compare('porcdomingo',$this->porcdomingo);
		$criteria->compare('porcfer',$this->porcfer);
		$criteria->compare('horasdia',$this->horasdia);
		//$criteria->compare('facdominical',$this->facdominical);
		$criteria->compare('frecpago',$this->frecpago,true);
		$criteria->compare('turno',$this->turno,true);
		$criteria->compare('acumuladomingo',$this->acumuladomingo,true);
		$criteria->compare('tarifamensual',$this->tarifamensual,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Regimen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function checkvalores($attribute,$params) {
            if($this->horasdia > 24 ){
                $this->adderror('horasdia',"Este valor es imposible");return;
            }
              if($this->tarifamensual=='1'){
                    if($this->acumuladomingo=='1')
                        $this->adderror('acumuladomingo',"No se debe de acumular el dominical en el acuerdo plano mensual");return;
                }
            
			}
                        
       public function horafin($fecha){
           $diferencia= strtotime($this->hinicio)-strtotime(date('Y-m-d'));  
            return date('Y-m-d H:i',strtotime(date('Y-m-d')+$diferencia+$this->horasdia*60*60));
       }
       
       public function getLimiteSuperior($fecha){
           $diferencia= strtotime($this->hinicio)-strtotime(date('Y-m-d'));           
           return date('Y-m-d H:i',strtotime($fecha)+$diferencia+$this->horasdia*60*60);
       }
        public function getLimiteInferior($fecha){
            $diferencia= strtotime($this->hinicio)-strtotime(date('Y-m-d'));
           return date('Y-m-d H:i',strtotime($fecha)+$diferencia);
       }
       
}
