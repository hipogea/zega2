<?php

/**
 * This is the model class for table "{{inventariofisico}}".
 *
 * The followings are the available columns in table '{{inventariofisico}}':
 * @property string $id
 * @property string $hidinventario
 * @property string $fecha
 * @property string $numero
 * @property integer $iduser
 * @property double $cant
 * @property double $diferencia
 * @property string $codestado
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property Alinventario $hidinventario0
 */
class Inventariofisico extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{inventariofisico}}';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$mascaraubic=yii::app()->settings->get('inventario','inventario_mascaraubicaciones');
		return array(
			array('iduser', 'numerical', 'integerOnly'=>true,'on'=>'insert,update,padre,ajuste'),
			array('fecha,cant', 'required', 'message'=>'Estos valores son obligatorios','on'=>'insert,update'),
			array('cant, diferencia', 'numerical','on'=>'insert,update,padre,ajuste'),
			array('hidinventario', 'length', 'max'=>20,'on'=>'insert,update,padre,ajuste'),
			array('numero', 'length', 'max'=>10,'on'=>'insert,update,padre,ajuste'),
			array('codestado', 'length', 'max'=>2,'on'=>'insert,update,padre,ajuste'),
			array('fecha', 'checkfecha','on'=>'insert,update,ajuste'),
			array('cant', 'checkcant','on'=>'insert,update,ajuste'),
			array('fecha,cant,cantstock,montocontable,monto,hidpadre, hidinventario,diferencia comentario', 'safe','on'=>'insert,update,padre,ajuste'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidinventario, fecha, numero, iduser, cant, diferencia, codestado, comentario', 'safe', 'on'=>'search'),

			//Escenario par al ainsericion automatica
			array('hidinventario,hidpadre,cant,cantstock,fechacre,fecha,diferencia', 'safe','on'=>'padre'),

			//Escenario par CArga masiva
			array('id,cant,ubicacion', 'required','on'=>'cargamasiva'),
			array('id,cant,ubicacion', 'safe','on'=>'cargamasiva'),
			array('cant', 'safe','on'=>'cargamasiva'),
			array('ubicacion', 'match','allowEmpty'=>true, 'pattern'=>$mascaraubic,'message'=>'Ubicacion Incorrecta, debe de ser de la forma :'.$mascaraubic,'on'=>'cargamasiva'),



			array('id,hidinventario,cant,codestado,cantstock,diferencia,ubicacion', 'safe','on'=>'search_por_padre'),


			//escenario para el ajuste
			array('cuentadebe,cuentahaber,montocontable,monto,codestado,fechaajuste,fechacreajuste,iduserajuste', 'safe','on'=>'ajuste'),
			array('cuentadebe', 'chkcuentas','on'=>'ajuste'),
			array('cuentadebe','exist','allowEmpty' => false, 'attributeName' => 'codcuenta', 'className' => 'Cuentas','message'=>'Esta cuenta no existe','on'=>'ajuste'),
			array('cuentahaber','exist','allowEmpty' => false, 'attributeName' => 'codcuenta', 'className' => 'Cuentas','message'=>'Esta cuenta no existe','on'=>'ajuste'),
			array('fechaajuste', 'chkfecha','on'=>'ajuste'),
			array('fechaajuste', 'chkinventario','on'=>'ajuste'), //verifica quew cuando se ajusta diferencias se respete el stock reservaod o el stock en transito

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
			'inventario' => array(self::BELONGS_TO, 'Alinventario', 'hidinventario'),
			'conteopadre' => array(self::BELONGS_TO, 'Inventariofisicopadre', 'hidpadre'),
			'cuentasdebe' => array(self::BELONGS_TO, 'Cuentas', 'cuentadebe'),
			'cuentashaber' => array(self::BELONGS_TO, 'Cuentas', 'cuentahaber'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidinventario' => 'Hidinventario',
			'fecha' => 'Fecha',
			'numero' => 'Numero',
			'iduser' => 'Iduser',
			'cant' => 'Cant',
			'diferencia' => 'Diferencia',
			'codestado' => 'Codestado',
			'comentario' => 'Comentario',
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
		$criteria->compare('hidinventario',$this->hidinventario,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('diferencia',$this->diferencia);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_inventario($id)
	{


		$criteria=new CDbCriteria;


		$criteria->addCondition('hidinventario=:id');
		$criteria->params=array(":id"=>$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_padre($id)
	{


		$criteria=new CDbCriteria;
		$criteria->params=array(":id"=>$id);
		$criteria->compare('id',$this->id);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('diferencia',$this->diferencia);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('cantstock',$this->cantstock);
		$criteria->compare('codestado',$this->codestado);

		$criteria->addCondition('hidpadre=:id');


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventariofisico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){

		if(in_array($this->inventario->maestrodetalle->controlprecio,array(	'L','F')))
		{
			$punit=$this->inventario->costealote(abs($this->diferencia),$this->inventario->maestrodetalle->controlprecio);
		}else{
			$punit=$this->inventario->punit;
		}

		$this->montocontable=$this->diferencia*$punit*
			yii::app()->tipocambio->getcambio(
				$this->inventario->almacen->codmon,
				yii::app()->settings->get('general', 'general_monedadef')
			);

		$this->monto=abs($this->diferencia*$punit);


		if($this->isNewRecord){
			$this->iduser=Yii::app()->user->id;
			$this->fechacre=date("Y-m-d H:m:s");
			$this->cantstock=$this->inventario->getstockregistro();
			$this->diferencia=$this->cant-$this->inventario->getstockregistro();
			$this->codestado='10';
		}else{
			$this->diferencia=$this->cant-$this->cantstock; ///Si el inventario ha variado sacamos la diferencia del a acntida que habia en ese mmeonto


			////AJUSTE CONTABLE
			if(yii::app()->hasModule('contabilidad')){
				if($this->getScenario()=='ajuste'){
					if($this->diferencia <>0 ){  ///SOBRANTES
						//realizar los ASIENTOS
						if($this->diferencia >0 ){  ///SOBRANTES
							$operacion='301';
						}

						}
						if($this->diferencia <0 ){ //FALTANTES
							$operacion='300';
						}

					if($this->oldAttributes['codestado']=='20' and $this->codestado=='10'){
						$signolibro=1;
					}else{
						$signolibro=-1;
					}

					yii::app()->librodiario->asientosimple(
						$this->cuentadebe,
						'D',
						$this->fechaajuste,
						($this->diferencia >0)?'AJUSTE SOBRANTES INVENTARIO':'AJUSTE FALTANTES INVENTARIO',
						$this->montocontable*$signolibro,
						$this->inventario->codart.'-'.$this->inventario->codalm,
						$this->inventario->id,
						'400');

					yii::app()->librodiario->asientosimple(
						$this->cuentahaber,
						'H',
						$this->fechaajuste,
						($this->diferencia >0)?'AJUSTE SOBRANTES INVENTARIO':'AJUSTE FALTANTES INVENTARIO',
						$this->montocontable*$signolibro,
						$this->inventario->codart.'-'.$this->inventario->codalm,
						$this->inventario->id,
						'400');


					}


				}
			}



		return parent::beforeSave();
	}


	public function checkfecha($attribute,$params)
	{
		//La fecha debe d eestar dentro del periodo activo
		If(empty($this->fecha) or $this->fecha===null){
			$this->adderror('fecha','La fecha es OBLIGATORIA');
		}else{
			if(!yii::app()->periodo->estadentroperiodo($this->fecha,false))
				$this->adderror('fecha','La fecha está fuera del periodo activo');
		}


	}
	public function checkcant($attribute,$params)
	{
		//La fecha debe d eestar dentro del periodo activo
		if($this->cant <=0 )
			$this->adderror('cant','La cantidad verificada debe ser positiva');
	}

	public function chkcuentas($attribute,$params)
	{
		//La fecha debe d eestar dentro del periodo activo
		if($this->cuentadebe==$this->cuentahaber )
			$this->adderror('cuentadebe','Las cuentas debend e ser diferentes ');
	}

	public function chkfecha($attribute,$params)
	{
		//La fecha debe d eestar dentro del periodo activo
		if(!yii::app()->periodo->verificaFechas($this->fecha,$this->fechaajuste))
			$this->adderror('fechaajuste','La fecha de ajuste no puede ser menor a la fecha de recuento ');
	}

	public function chkinventario($attribute,$params)
	{
		//La fecha debe d eestar dentro del periodo activo

		if($this->diferencia <0 and abs($this->diferencia)  > $this->inventario->cantlibre)
			$this->adderror('diferencia','El stock libre no es suficiente para realizar este ajuste, elimine reservas o libere stock de transito');
	}




}
