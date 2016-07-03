<?php

class Almacenes extends CActiveRecord
{

	public $periodo;
	public $numeropuntos;
	public $fechaini;
	public $fechafin;


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{almacenes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public function behaviors()
	{
		return array(
			// Classname => path to Class
			/*'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',*/
		);
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codsoc', 'required'),
			array('codalm', 'length', 'max'=>3),
			array('codalm', 'required'),
			array('codalm', 'length', 'min'=>3),
			array('codalm', 'unique'),
			array('codalm', 'match', 'pattern'=>Yii::app()->params['mascaradocs'],'message'=>'El codigo  no es el correcto, El c debe comenzar por 2 DIGITOS  > 0 y los caracteres deben ser numericos'),
			array('codmon', 'required', 'message'=>' Indique la moneda para valorizar el inventario'),

			array('nomal', 'length', 'max'=>35),
			array('nomal', 'required'),
			array('tipo, tipovaloracion', 'length', 'max'=>2),
			//array('codcen', 'length', 'max'=>4),
			array('codcen', 'required'),
			array('codsoc', 'length', 'max'=>1),
			array('estructura', 'length', 'max'=>15),
			array('desalm,bloqueado,verprecios,novalorado,codmon,agregarauto', 'safe'),
			array('numeropuntos,codalm,periodo', 'safe','on'=>'grafico'),
			array('codalm, nomal, desalm, tipo, codcen,codmon,  codsoc, tipovaloracion, estructura,tolstockres,fecharefpronostico', 'safe', 'on'=>'insert,update'),
			array('codalm, nomal, desalm, tipo, codcen, codsoc, tipovaloracion, estructura, id', 'safe', 'on'=>'search'),
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
			'codsoc0' => array(self::BELONGS_TO, 'Sociedades', 'codsoc'),
			'centros' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'nitems' => array(self::STAT, 'Alinventario', 'codalm'),
			//'items_inventario' => array(self::STAT, 'Alinventario', 'codalmacen','select'=>'count(id)','condition'=>" cantlibre > 0 "),),
		);
	}




	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codalm' => 'Codalm',
			'nomal' => 'Nomal',
			'desalm' => 'Desalm',
			'tipo' => 'Tipo',
			'codcen' => 'Codcen',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'codsoc' => 'Codsoc',
			'tipovaloracion' => 'Tipovaloracion',
			'estructura' => 'Estructura',
			'id' => 'ID',
		);
	}


     public $maximovalor;

	public function beforeSave() {
							if ($this->isNewRecord) {
										//$this->codsoc='A';
										//$this->codalm=Numeromaximo::numero($this->model(),'codalm','maximovalor',3);


									} else
									{
										 

										$this->llenaopciones();

				}
		return parent::beforeSave();
	}

public  function llenaopciones(){

      foreach(Almacenmovimientos::model()->findAll() as $fila){
		  $regi=Almacentransacciones::model()->find("codal=:vcodal  and codmov=:vcodmov",
			  array(":vcodmov"=>$fila->codmov,":vcodal"=>$this->codalm));

		  if(is_null($regi)){
			//  echo "llena <br>";die();
			  $opcion=new Almacentransacciones();
			  $opcion->setAttributes(array('codal'=>$this->codalm,'codmov'=>$fila->codmov));
			  $opcion->save();
		  }else{
			//  echo "ya esta <br>";die();
		  }

	  }
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

		$criteria->compare('codalm',$this->codalm,true);
		$criteria->compare('nomal',$this->nomal,true);
		$criteria->compare('desalm',$this->desalm,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('codcen',$this->codcen,true);




		$criteria->compare('codsoc',$this->codsoc,true);
		$criteria->compare('tipovaloracion',$this->tipovaloracion,true);
		$criteria->compare('estructura',$this->estructura,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function  findbycentroalmacen($centro,$almacen)
	{
		$centro=MiFactoria::cleanInput($centro);
		$almacen=MiFactoria::cleanInput($almacen);
		$criterio=new CDBCriteria();
		$criterio->addCondition("codalm=:vcodal and codcen=:vcodcen ");
		$criterio->params=array(":vcodal"=>$almacen, ":vcodcen"=>$centro);
		return self::model()->find($criterio);

	}

	public static function movimientospermitidos($codal){
		$codal=MiFactoria::cleanInput($codal);
		//var_dump($codal);
		$data= Yii::app()->db->createCommand()
			->select('a.codmov')
			->from('{{almacentransacciones}} a, {{almacenmovimientos}} b ')
			->where(   " a.codmov=b.codmov AND     a.codal=:vcodal and a.activo='1' and  b.esreal='1' ",array(":vcodal"=>$codal))->queryColumn();
		//var_dump($data);die();
		return $data;
	}


	public static function mismovimientospermitidos($codal){
		$criter=New CDBCriteria();
		$criter->addIncondition('codmov',self::movimientospermitidos($codal));
		$registros=Almacenmovimientos::model()->findAll($criter);
		return $registros;
	}


	public static function puedemover($codmov,$codalm){
		if(in_array($codmov,array('68','86')))
			return true;
		return in_array($codmov,self::movimientospermitidos($codalm));
	}

}