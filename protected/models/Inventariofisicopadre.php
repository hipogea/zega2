<?php

class Inventariofisicopadre extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{inventariofisicopadre}}';
	}
	public function init(){
		$this->documento='400';

	}

	public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codresponsable','exist','allowEmpty' => false, 'attributeName' => 'codigotra', 'className' => 'Trabajadores','message'=>'Este trabajador no existe'),
			//array('codresponsable','exist','allowEmpty' => false, 'attributeName' => 'codtra', 'className' => 'Trabajadores','message'=>'Este trabajador no existe'),
			array('descripcion,codal,codcen', 'required', 'message'=>'Este valor es obligatorio'),
			array('fechaprog','compare','compareAttribute'=>'fechafin','operator'=>'<=','message'=> Yii::t('es', 'La fecha inicio no puede ser mayor a la fecha termino')),

			array('ano, mes, codestado', 'length', 'max'=>2),
			array('esciego', 'length', 'max'=>1),
			array('descripcion', 'length', 'max'=>40),
			array('numero', 'length', 'max'=>12),
			array('codocu, codal', 'length', 'max'=>3),
			array('codresponsable, codcen', 'length', 'max'=>4),
			array('fechaprog, fechacre,fechafin,esciego,codresponsable,hidcarga,codcen,codal', 'safe'),
			array('codestado', 'safe','on'=>'estado'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ano, mes, esciego, descripcion, numero, codocu, fechaprog, fechacre, codresponsable, codestado, codcen, codal', 'safe', 'on'=>'search'),
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
			'inventariofisicos' => array(self::HAS_MANY, 'Inventariofisico', 'hidpadre'),
			'carga'=>array(self::BELONGS_TO, 'Cargamasiva', 'hidcarga'),
			'numeroitems' => array(self::STAT, 'Inventariofisico', 'hidpadre'),
			'ajustespendientes'=>array(self::STAT, 'Inventariofisico', 'hidpadre','condition'=>"codestado = '10' and abs(diferencia) >0 "),//el campo foraneo
			//'ajustes'=>array(self::HAS_MANY, 'Inventariofisico', 'hidpadre','condition'=>"codestado = '20'"),//el campo foraneo
			//'cantcompras'=>array(self::STAT, 'Desolpecompra', 'iddesolpe','select'=>'sum(t.cant)','condition'=>"codestado <> '30'"),//el campo foraneo

			'estado' => array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado','codocu'=>'codocu')),
			'centro' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'almacen' => array(self::BELONGS_TO, 'Almacenes', 'codal'),
			'trabajadores' => array(self::BELONGS_TO, 'VwTrabajadores', 'codresponsable'),
			'cargasfisicas'=> array(self::HAS_MANY, 'Cargainventariofisico', 'hidpadre'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ano' => 'Ano',
			'mes' => 'Mes',
			'esciego' => 'Esciego',
			'descripcion' => 'Descripcion',
			'numero' => 'Numero',
			'codocu' => 'Codocu',
			'fechaprog' => 'Fechaprog',
			'fechacre' => 'Fechacre',
			'codresponsable' => 'Codresponsable',
			'codestado' => 'Codestado',
			'codcen' => 'Codcen',
			'codal' => 'Codal',
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
		$criteria->compare('ano',$this->ano,true);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('esciego',$this->esciego,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('fechaprog',$this->fechaprog,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('codal',$this->codal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventariofisicopadre the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		if($this->isNewRecord){
			$this->ano=date('y',strtotime($this->fechaprog));
			$this->mes=date('m',strtotime($this->fechaprog));
			$this->fechacre=date("Y-m-d H:i:s");
		$this->codocu='400';
			$this->codestado='10';
			$criterio=New CDBCriteria();
			$criterio->addCondition("codcen=:codcen and codal=:codal");
			$criterio->params=array(":codcen"=>$this->codcen,":codal"=>$this->codal);
		//var_dump($criterio->params);die();
			$this->numero=$this->correlativo('numero',$criterio,$this->codcen.$this->codal,null);
		}



		return parent::beforeSave();
	}

	public function idcargas(){
		$ar=array();
		foreach($this->cargasfisicas as $fila){
			$ar[]=$fila->idinicio;
		}
		return $ar;
	}

	public function findInventarioabierto($codcen,$codal){
		$codcen=MiFactoria::cleanInput($codcen);
		$codal=MiFactoria::cleanInput($codal);
		$crit=New CDBCriteria();
		$crit->addCondition("codcen=:centro and codal=:almacen and codestado='10' ");
		$crit->params=array(":centro"=>$codcen,":almacen"=>$codal);

		$conteosactivos=self::model()->findAll($crit);
		if( count($conteosactivos) >0 ){
			return $conteosactivos[0];
		}else{
			return null;
		}

	}



	public function actualizaubicaciones(){
		$nfilas= Yii::app()->db->createCommand(
			" update {{alinventario}} a, {{inventariofisico x}} set a.ubicacion=x.ubicacion
            where x.hidinventario=a.id and x.hidpadre='".$this->id."' and x.ubicacion <> a.ubicacion " )->execute();
		return $nfilas;
	}
}
