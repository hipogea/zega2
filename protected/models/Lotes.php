<?php

class Lotes extends ModeloGeneral
{

	public $ubicacion; //orden relkaticov respecto alorden segun lifo fifo
	/**
	 * @return string the associated database table name
	 */

	public function tableName()
	{
		return '{{lotes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('numlote, fechafabri, fechaingreso, fechavenc, usuario, cant, hidinventario, comentario, codestado, cantsaldo, descripcion', 'required'),
			array('cant, cantsaldo', 'numerical'),
			array('numlote', 'length', 'max'=>32),
			array('usuario', 'length', 'max'=>35),
			array('hidinventario, loteprov', 'length', 'max'=>20),
			array('codestado', 'length', 'max'=>2),
			array('descripcion', 'length', 'max'=>40),
			//array('hidkardex,cant','safe','on'=>'despacho'),
			array('cant,orden','safe','on'=>'reconstruye'),
			array('fechafabri, fechaingreso,loteprov, fechavenc','safe','on'=>'update'),
			array('orden','safe','on'=>'orden'),
			array('cant,hidkardex,orden,fechaingreso,punit,stock,hidinventario,numlote','safe','on'=>'automatico'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numlote, fechafabri, fechaingreso, fechavenc, usuario, cant, hidinventario, loteprov, comentario, codestado, cantsaldo, descripcion', 'safe', 'on'=>'search'),
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
			'inventario'=>array(self::BELONGS_TO, 'Alinventario', 'hidinventario'),
			'despachos'=>array(self::HAS_MANY, 'Dlote', 'hidlote'),
			'tienedespachos'=>array(self::STAT, 'Dlote', 'hidlote'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numlote' => 'Numlote',
			'fechafabri' => 'Fechafabri',
			'fechaingreso' => 'Fechaingreso',
			'fechavenc' => 'Fechavenc',
			'usuario' => 'Usuario',
			'cant' => 'Cant',
			'hidinventario' => 'Hidinventario',
			'loteprov' => 'lote del proveedor',
			'comentario' => 'Comentario',
			'codestado' => '\'10\' creado, \'20\' agotado, ',
			'cantsaldo' => 'Cantsaldo',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('numlote',$this->numlote,true);
		$criteria->compare('fechafabri',$this->fechafabri,true);
		$criteria->compare('fechaingreso',$this->fechaingreso,true);
		$criteria->compare('fechavenc',$this->fechavenc,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('hidinventario',$this->hidinventario,true);
		$criteria->compare('loteprov',$this->loteprov,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('cantsaldo',$this->cantsaldo);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
	 * eSTA FUNCION REGISTRA EL DESPACHO CON LA CANTIDAD Y EL KARDEX EN LA TABLA
	 * DLORES PARA PODER RECOSNTRUIR DESPUES , EN CASO DE ANULACION DE VALES
	 */
	public function registradespacho($cant,$hidkardex){
				$modeli=New Dlote('auto');
		       $modeli->setAttributes(Array('hidlote'=>$this->id,'hidkardex'=>$hidkardex,'cant'=>$cant));
		  //  print_r( $modeli->attributes);die();
		      $modeli->save();unset($modeli);

		}
	/**
	 * eSTA FUNCION borra  EL DESPACHO CON LA CANTIDAD Y EL KARDEX EN LA TABLA
	 * DLORES PARA PODER RECOSNTRUIR DESPUES , EN CASO DE ANULACION DE VALES
	 */
	public function borradespacho($hidkardex){
		return Dlote::model()->findAll("hidkardex=:vkardex",array(":vkardex"=>$hidkardex));

	}


	public function search_por_inventario($id,$orden)
	{
		$id=MiFactoria::cleanInput($id);
		if(!in_array(strtoupper($orden),array('ASC','DESC')) or gettype($orden)!='string')
			throw new CHttpException(500,'El parametro de ordenacion quepaso no es el correcto');

		$criteria=new CDbCriteria;


		$criteria->addCondition("hidinventario=".$id);
		$criteria->addCondition("cant > 0");
		$criteria->order = " orden ".$orden;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public function init(){
		$this->documento='260';

	}

  public function beforeSave(){
	  if($this->isNewRecord) {
		  $this->orden=microtime(true);
		 // $this->numlote=$this->correlativo('numlote');
		  }
//var_dump($this->orden);
	  //var_dump(microtime(true));die();

	  return parent::beforeSave();

  }

	public function getubicacion(){
		$orden=1;
		  $inventario=$this->inventario;
		  if(in_array($inventario->detallesmaterial()['controlprecio'] ,array('L','F') )){
			 IF( $inventario->detallesmaterial()['controlprecio']=='L')
				 $registroshijos=$inventario->loteslifo;
			  IF( $inventario->detallesmaterial()['controlprecio']=='F')
				  $registroshijos=$inventario->lotesfifo;

			  FOREACH($registroshijos as $fila){
				  if($fila->orden==$this->orden){
						break;
				  }
				  $orden++;
			  }
			  unset($inventario); unset($registroshijos);
		  }
		return $orden;
        }
}
