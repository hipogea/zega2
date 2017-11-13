<?php

/**
 * This is the model class for table "{{periodos}}".
 *
 * The followings are the available columns in table '{{periodos}}':
 * @property integer $id
 * @property string $mes
 * @property string $anno
 * @property string $inicio
 * @property string $final
 * @property string $activo
 * @property integer $toleranciaatras
 * @property integer $toleranciadelante
 */
class Periodos extends ModeloGeneral
{

    public $descrilarga;
    /**
	 * @return string the associated database table name
	 */
    
    public $_fechaminima;
     public $_fechamaxima;
    
	public function tableName()
	{
		return '{{periodos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mes, anno, toleranciaatras,desperiodo, toleranciadelante', 'required'),
			array('mes+anno', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert','message'=>'Estos valores de mes y año ya fueron ingresados, verifique'),
			array('toleranciaatras, toleranciadelante', 'numerical', 'integerOnly'=>true,'min'=>0,'max'=>10),
			//array('toleranciaatras, toleranciadelante', 'max'=>10),
			array('mes, anno', 'length', 'max'=>2),
                    array('activo', 'safe', 'on'=>'insert,update'  ),
			array('activo', 'length', 'max'=>1),
                    array('activo', 'verificaperiodosactivos'),
                    array('desperiodo', 'safe', 'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mes, anno, inicio, desperiodo,final, activo, toleranciaatras, toleranciadelante', 'safe', 'on'=>'search'),
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
                   // 'fminima'=>array(self::STAT,'Periodos','id','select'=>'min(inicio)','condition'=>"activo='1'"),
		// 'fmaxima'=>array(self::STAT,'Periodos','id','select'=>'max(final)','condition'=>"activo='1'"),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mes' => 'Mes',
			'anno' => 'Anno',
			'inicio' => 'Inicio',
			'final' => 'Final',
			'activo' => 'Activo',
			'toleranciaatras' => 'Tol (-)',
			'toleranciadelante' => 'Tol (+)',
		);
	}

	public function HoyDentroPeriodo()
	{
		if( time() >=strtotime($this->inicio.'') -$this->toleranciaatras * (24 * 60 * 60)
			and
			time() <= strtotime($this->final.'')+$this->toleranciadelante * (24 * 60 * 60)
		){
			return true;
		} else {
				return false;
		}

	}

	public function FechaDentroPeriodo($fecha)
	{
		if(strtotime($fecha.'') >=strtotime($this->inicio.'')-$this->toleranciaatras * (24 * 60 * 60)
			and
			strtotime($fecha.'') <= strtotime($this->final.'')+$this->toleranciadelante * (24 * 60 * 60)
		  ){
			return true;
		} else {
			return false;
		}

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
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('anno',$this->anno,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('final',$this->final,true);
		$criteria->compare('activo',$this->activo,true);
                $criteria->compare('desperiodo',$this->desperiodo,true);
		$criteria->compare('toleranciaatras',$this->toleranciaatras);
		$criteria->compare('toleranciadelante',$this->toleranciadelante);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_activo()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('anno',$this->anno,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('final',$this->final,true);
		//$criteria->compare('activo',$this->activo,true);
		$criteria->compare('toleranciaatras',$this->toleranciaatras);
		$criteria->compare('toleranciadelante',$this->toleranciadelante);
		$criteria->addcondition("activo='1'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Periodos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function verificaperiodosactivos($attribute,$params){
                    //var_dump($this->activo);die();
		if($this->cambiocampo('activo'))
                    //var_dump($this->activo);
                if($this->activo=='1')
                  /* var_dump((integer)yii::app()->settings->get('conta','conta_nperiodosabiertos') );
                var_dump($this::nperiodosactivos());
                 die();*/
            if((integer)yii::app()->settings->get('conta','conta_nperiodosabiertos') <=  $this::nperiodosactivos())
				$this->adderror('activo','Ya no puede activar mas periodos ');

	}


	//Verifica que si lo desactivas
	public function verificaactividad (){

			}

	public function beforeSave()
	{
		//if ($this->isNewRecord) {
			$this->inicio=date('Y-m-d',strtotime(date('Y-m-d',  strtotime('20'.$this->anno.'-'.$this->mes.'-'.'01')   ))-24*60*60*$this->toleranciaatras);
			$this->final=date('Y-m-d',strtotime(date('Y-m-d',   strtotime('20'.$this->anno.'-'.$this->mes.'-'.date("t",$this->mes))   ))+24*60*60*$this->toleranciadelante);
        //}
		return parent::beforesave();
	}


        public static function nperiodosactivos(){
            return count(self::model()->findAll("activo='1'"));
        }
        
        public function verificafecha($attribute,$params){

			if(!yii::app()->periodos->verificafechas($this->inicio,$this->final))
				$this->adderror('inicio','Fecha final mayor que la de inicio');

	}
        
        public  function fechaminima(){
           // $sql = '';
            if(is_null($this->_fechaminima)){
                 $dependency = new CDbCacheDependency('SELECT count(*) FROM {{periodos}} ');
            return  Yii::app()->db->cache(100000, $dependency)->
                    createCommand()->
                    select('min(inicio)')->from('{{periodos}}')->
                    where("activo='1'")->queryScalar();
            }else{
                return $this->_fechaminima;
            }
           
            
        }
        
        public  function fechamaxima(){
           // $sql = '';
            if(is_null($this->_fechamaxima)){
            $dependency = new CDbCacheDependency('SELECT count(*) FROM {{periodos}} ');
            return  Yii::app()->db->cache(100000, $dependency)->
                      createCommand()->
                    select('max(final)')->from('{{periodos}}')->
                    where("activo='1'")->queryScalar();
            }else{
                return $this->_fechamaxima;
            }
        }
        
        public function afterfind(){
            $this->descrilarga=$this->mes.'-'.'20'.$this->anno;
            return parent::afterfind();
        }
}
