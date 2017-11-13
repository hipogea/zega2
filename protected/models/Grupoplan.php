<?php

/**
 * This is the model class for table "{{grupoplan}}".
 *
 * The followings are the available columns in table '{{grupoplan}}':
 * @property string $codgrupo
 * @property string $desgrupo
 * @property string $interno
 */
class Grupoplan extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{grupoplan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('tarifa,codmon, interno', 'safe','on'=>'BATCH_UPD'),
                     array('tarifa,codmon', 'required','on'=>'BATCH_UPD'),
			array('codgrupo,codcen,tarifa,escenario,codmon', 'required','on'=>'insert,update'),
			array('codgrupo', 'length', 'max'=>3,'on'=>'insert,update'),
			//array('desgrupo', 'length', 'max'=>50),
			array('interno', 'length', 'max'=>1),
			array('codgrupo,escenario, codcen,tarifa,codmon, interno', 'safe','on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codgrupo, interno,escenario,codcen,codmon', 'safe', 'on'=>'search'),
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
			'moneda' => array(self::BELONGS_TO, 'Monedas', 'codmon'),
                        'oficios' => array(self::BELONGS_TO, 'Oficios', 'codgrupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codgrupo' => 'Codgrupo',
			'desgrupo' => 'Desgrupo',
			'interno' => 'Interno',
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

		$criteria->compare('codgrupo',$this->codgrupo,true);
		$criteria->compare('desgrupo',$this->desgrupo,true);
		$criteria->compare('interno',$this->interno,true);
                $criteria->compare('escenario',$this->codgrupo,true);
		$criteria->compare('codcen',$this->desgrupo,true);
		//$criteria->compare('interno',$this->interno,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grupoplan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function tarifamonedadef(){
            if($this->codmon==yii::app()->settings->get('general','general_monedadef')){
              return $this->tarifa;
            }else{
                return $this->tarifa*yii::app()->tipocambio->getCambio($this->codmon,yii::app()->settings->get('general','general_monedadef')); 
            }
            
        }
        
        public static function getEscenarios(){
            return array(
                'A'=>'ESCENARIO A',
                'B'=>'ESCENARIO B',
                'C'=>'ESCENARIO C',
                );
        }
        
        public static function detectaVacancias($codcentro){
            $nescenarios=count(self::getEscenarios());
            $noficios=Oficios::model()->count();
           // $ncentros= Centros::model()->count();
            $ntarifastotal=$nescenarios*$noficios;
            $ntarifas=self::model()->count("codcen=:vcodcentro",array(":vcodcentro"=>$codentro));
            return ($ntarifas < $ntarifastotal)?true:false;
                       
        }
        
         public  function llenaVacancias($codcentro){
             if(self::detectaVacancias($codcentro)){
                 
                 foreach(self::getEscenarios() as $escenario=>$valor){
                      
                     $roficios=Oficios::model()->findAll();
                     foreach( $roficios as $oficio ){
                         $registro=New Grupoplan;
                                if(count(self::model()->findAll("codcen=:vcodcen and escenario=:vescenario and codgrupo=:vcodgrupo",
                                 array(":vcodcen"=>$codcentro,":vescenario"=>$escenario,":vcodgrupo"=>$oficio->codof)))==0)
                                    
                                       
                                //VAR_DUMP($registro);die();
                                $registro->setAttributes(
                                        array(
                                            "codgrupo"=>$oficio->codof,
                                            "codcen"=>$codcentro,
                                             "escenario"=>$escenario,
                                             "codmon"=>yii::app()->settings->get('general','general_monedadef'),
                                            "tarifa"=>1,
                                        )
                                        );
                               $registro->save();
                                    //echo "grabanmdo<br>";
                                
                                 
                     }
                     
                 }
             }
           return 1;
                       
        }
}
