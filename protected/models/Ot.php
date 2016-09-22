<?php
CONST ESTADO_PREVIO='99';
CONST ESTADO_CREADO='10';

class Ot extends  ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ot}}';
	}
	public function init(){
		$this->documento='890';

	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
	
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechainiprog,, codpro,
			 idobjeto, codresponsable, textocorto, codcen', 'required'),
			array('fechafinprog, fechainiprog,fechainicio, fechafin','checkfechas'),
                    array('idobjeto', 'checkobjeto','on'=>'insert'),
			array('idobjeto, iduser', 'numerical', 'integerOnly'=>true),
			array('numero', 'length', 'max'=>12),
			array('codpro', 'length', 'max'=>8),
			array('fechainicio,fechafin', 'safe'),
			array('codresponsable', 'length', 'max'=>6),
			array('textocorto', 'length', 'max'=>40),
			array('grupoplan, codocu', 'length', 'max'=>3),
			array('codcen', 'length', 'max'=>4),
			array('codestado', 'length', 'max'=>2),
			array('clase', 'length', 'max'=>1),
			array('hidoferta', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, fechacre, fechafinprog, codpro, idobjeto,
			 codresponsable, textocorto, textolargo, grupoplan,
			 codcen, iduser, codocu, codestado, clase, hidoferta', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'detot' => array(self::HAS_MANY, 'Detot', 'hidorden'),
			'tempdetot' => array(self::HAS_MANY, 'Tempdetot', 'hidorden'),
                    'tempotconsignacion' => array(self::HAS_MANY, 'Tempotconsignacion', 'hidot'),
                    'otconsignacion' => array(self::HAS_MANY, 'Otconsignacion', 'hidot'),
			'desolpe' => array(self::HAS_MANY, 'Desolpe', 'hidot','condition'=>"tipsolpe='M' "),
			'desolpeserv' => array(self::HAS_MANY, 'Desolpe', 'hidot','condition'=>"tipsolpe='S' "),
			'tempdesolpe' => array(self::HAS_MANY, 'Tempdesolpe','hidot'),
			//'cant_solicitada'=>array(self::STAT, 'Alreserva', 'hidesolpe','select'=>'sum(t.cant)','condition'=>"estadoreserva <> '30' AND codocu IN ('800') "),//el campo foraneo

			'nrecursos' => array(self::STAT, 'Tempdesolpe','hidot','condition'=>"tipsolpe='M' "),
			'nrecursosfirme' => array(self::STAT, 'Desolpe','hidot','condition'=>"tipsolpe='M' " ),
			'nrecursosserv' => array(self::STAT, 'Tempdesolpe','hidot','condition'=>"tipsolpe='S' "),
			'nrecursosfirmeserv' => array(self::STAT, 'Desolpe','hidot','condition'=>"tipsolpe='S' " ),
			'clipro' => array(self::BELONGS_TO, 'Clipro', 'codpro'),
			//'objetosmaster' => array(self::BELONGS_TO, 'Objetosmaster', 'idobjeto'),
			'vwobjetos' => array(self::BELONGS_TO, 'VwObjetos', 'idobjeto'),
			'objetosmaster' => array(self::BELONGS_TO, 'Objetosmaster', 'idobjeto'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
                    'estado'=>array(self::BELONGS_TO,'Estado',array('codestado'=>'codestado','codocu'=>'codocu')),
                    'neot'=>array(self::HAS_MANY,'Neot','hidot'),
                   // 'ncomponentes'=>array(self::STAT,'Neot','hidot','Select'=>'sum(t.cant)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'fechacre' => 'Fechacre',
			'fechafinprog' => 'Fechafinprog',
			'codpro' => 'Codpro',
			'idobjeto' => 'Idobjeto',
			'codresponsable' => 'Codresponsable',
			'textocorto' => 'Textocorto',
			'textolargo' => 'Textolargo',
			'grupoplan' => 'Grupoplan',
			'codcen' => 'Codcen',
			'iduser' => 'Iduser',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'clase' => 'Clase',
			'hidoferta' => 'Hidoferta',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('idobjeto',$this->idobjeto);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('textocorto',$this->textocorto,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('grupoplan',$this->grupoplan,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('clase',$this->clase,true);
		$criteria->compare('hidoferta',$this->hidoferta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**************************
	 * Checkea el objeto y le clipro si es deun determinada empresa
	 * @param $attribute
	 * @param $params
	 *
	 */
	public function checkobjeto($attribute,$params) {
		if($this->codpro!=$this->objetosmaster->objetoscliente->codpro)
					$this->adderror('idobjeto','Este equipo no pertenece a la organizacion '.$this->clipro->despro);
	}


	/**************************
	 * Checkea las fechas de inicio y programacion no son consistentes
	 * @param $attribute
	 * @param $params
	 *
	 */
	public function checkfechas($attribute,$params) {
		if(!is_null($this->fechainiprog) and !is_null($this->fechafinprog))
		if(!yii::app()->periodo->verificaFechas($this->fechainiprog,$this->fechafinprog))
		$this->adderror('fechainiprog','La Fecha de inicio programada es mayor que la de fin programada');
		if(!is_null($this->fechainicio) and !is_null($this->fechafin))
		if(!yii::app()->periodo->verificaFechas($this->fechainicio,$this->fechafin))
			$this->adderror('fechainicio','La Fecha de inicio  es mayor que la de fin');

		}

	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->codestado='10';
			$this->codocu='890';
			$this->fechacre=date("Y-m-d H:i:s");
		}
		else
		{
			IF ($this->numero===null or empty($this->numero))
			{
				$this->numero=$this->correlativo('numero');
			}
			//var_dump($this->numero);die();
		}
		return parent::beforeSave();
	}

public static function findByNumero($numero){
  return self::model()->find("numero=:vnumero",array(":vnumero"=>MiFactoria::cleanInput($numero)));

}

public function editable() {
	$arregloestados=array(
		ESTADO_PREVIO,
		ESTADO_CREADO,

	);
	return in_array($this->codestado,$arregloestados);


}

public function tienesolpeabierta($tipo) {
       $retorno=NULL;
        $criteria = new CDbCriteria();
        $criteria->distinct=true;
        $criteria->addCondition ("hidot=".$this->id);  
        $criteria->addCondition ("tipsolpe='".$tipo."'" );  
        $criteria->addCondition ("iduser=".yii::app()->user->id );  
        $criteria->select = 'hidsolpe';
        $desolpes=Desolpe::model()->findAll($criteria);
       if($tipo=='M'){
          IF($this->nrecursosfirme >0){
               foreach($desolpes as $registro){
            if($registro->desolpe_solpe->estado=='10'){
                $retorno=$registro;
                 break; 
            }
          }
			
       }
        if($tipo=='S'){
           IF($this->nrecursosfirmeserv >0){
               foreach($desolpes as $registro){
            if($registro->desolpe_solpe->estado=='10'){
                $retorno=$registro;
                 break; 
            }
       }
           }
        }
       return $retorno;
            
      }
   }


}
