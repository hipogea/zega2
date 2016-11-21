<?php

class Tempalkardex extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempalkardex}}';
	}

	/*
	 *
	 * VERIFICA SI SE PUEDE CAMBIAR LA CANTIDAD
	 * PARA PODER VALIDAR MUY BIEN LA CANTIDAD
	 */

	private function puedeeditarcantidad(){
		  return(Almacenmovimientos::model()->findByPk($this->codmov)->editarcantidad=='1')?true:false;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
			return array(
			array('id,hidvale,textolargo,idref,codocuref,um,colector,idotrokardex,preciounit,alemi,codcentro,numdocref,codmoneda', 'safe'),
			array('iduser, idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('cant, preciounit', 'numerical'),
				array('codart','chkcatval'),
			///En todos los escenarios
			array('codart,um,
			codmov,alemi,
			codocuref,codcentro,
			hidvale','required'),
			//escenario para el buffer
			array('codart,um,idstatus,idotrokardex,numdocref,idref,preciounit,codestado,hidref,
			codmov,alemi,textolargo,coddoc,fechadoc,valido,codocuref,codcentro,numdocref,fecha,colector,checki,
			hidvale','safe','on'=>'buffer'),

		///escenario para cambios despues de efectuado el vale, son limitados los campos "
			array('textolargo,idref','safe','on'=>'EFECTUADO'),


				array('colector','required','on'=>'50_SCN,60_SCN'),
				array('preciounit','required','on'=>'98_SCN'),
				array('codart','checkcodigo','on'=>'50_SCN,41_SCN,77_SCN,98_SCN'),
			array('cant','checkcantidad','on'=>'10_SCN,43_SCN,50_SCN,41_SCN,77_SCN,79_SCN'),
			array('cant','chkcantsolpe','on'=>'10_SCN,43_SCN'),
			//array('cant','chkcantpeticion','on'=>'79_SCN,97_SCN'),
			array('cant','chkcantvaletraspaso','on'=>'78_SCN'),
			array('cant','chkcantvalereingreso','on'=>'70_SCN'),
			array('cant','chkcantcompra','on'=>'30_SCN,13_SCN,68_SCN'),





			array('codart,textolargo, codmov, cant, alemi, aldes, fecha, coddoc, numdoc, usuario, creadopor, creadoel, modificadopor, modificadoel, um, comentario, codocuref, numdocref, codcentro, codestado, prefijo, fechadoc, correlativo, numkardex, solicitante, hidvale, idref, lote, valido, checki, destino, preciounit, correlativ, codcendes, id, iduser, idusertemp, idstatus, idtemp', 'safe', 'on'=>'search'),
		);
	}

	//verifica que no se exceda la cantidad original solicitada , al moento de editarla
	public function chkcantsolpe($attribute,$params) {
				//Obteinendo la reserva de esta Solpe
				$registros=Alreserva::model()->findAll("hidesolpe=:idsolpe and codocu='450'",array(":idsolpe"=>$this->idref));
				$desolpe=Desolpe::model()->findByPk($this->idref);
		        $umoriginal=$desolpe->um;
		$cantatendida=is_null($registros[0]->alreserva_cantidadatendida)?0:$registros[0]->alreserva_cantidadatendida;
		        $falta=$desolpe->cant-$cantatendida;
		     $mensajeerror=($cantatendida==0)?' de lo que se ha solicitado('.$desolpe->cant.')':' de lo que falta atender ('.$falta.')';
		//echo "falta antender ".$falta;
		//yii::app()->end();
		if(abs($this->cant)*Alconversiones::convierte($this->codart,$this->um,$umoriginal) > $falta)
			$this->adderror('cant', 'La cantidad que intentas atender es mayor '.$mensajeerror);
			unset($registros)	;unset($desolpe);
	}

	//verifica que no se exceda la cantidad original COMPRADA , al moento de editarla
	public function chkcantcompra($attribute,$params) {
		$registrocompra=Docompra::model()->findByPk($this->idref);
		$cantatendida=$registrocompra->cantidadentregada;
		$umoriginal=$registrocompra->um;
		$falta=$registrocompra->cant-$cantatendida;
		$mensajeerror=($cantatendida==0)?' de lo que se ha comprado('.$registrocompra->cant.')':' de lo que falta atender ('.$falta.')';
		if($this->cant*Alconversiones::convierte($this->codart,$this->um,$umoriginal) > $falta)
			$this->adderror('cant', 'La cantidad que intentas atender es mayor '.$mensajeerror);
	}



	//verifica que no se exceda la cantidad original TRASPASADA , al moento de editarla
	public function chkcantvaletraspaso($attribute,$params) {
		$registrokardex=Alkardex::model()->findByPk($this->idref);
		$cantatendida=$registrokardex->alkardex_alkardextraslado_emisor_cant;
		$falta=$registrokardex->cant-$cantatendida;
		$mensajeerror=($cantatendida==0)?' de lo que se ha especificado en el inicio de traslado ('.$registrokardex->cant.')':' de lo que falta atender ('.$falta.')';
		if($this->cant > $falta)
			$this->adderror('cant', 'La cantidad que intentas atender es mayor '.$mensajeerror);
	}



public function chkcantpeticion(){

}

	public function chkcantvalereingreso(){
		$otrokardex=Alkardex::model()->findByPk($this->idotrokardex);
		//var_dump($otrokardex->cant);die();
		$cant=abs($otrokardex->cant)-$otrokardex->reingreso_cant;
		if(abs($this->cant) > $cant)
			$this->adderror('cant','Esta cantidad excede a lo que se ha pedido inicialmente');
	}



	public function checkcantidad($attribute,$params) {
		$regisin=Alinventario::model()->encontrarregistro($this->codcentro,$this->alemi,$this->codart);
		if ($this->isNewrecord){
			$cantidadlibre=$regisin->cantlibre;
		    $umbase=$regisin->maestro->um;
			$nombreumbase=$regisin->maestro->maestro_ums->desum;
			//unset($regisin);
		}else {
			$cantidadlibre=$this->alkardex_alinventario->cantlibre;
			$umbase=$this->alkardex_alinventario->maestro->um;
			$nombreumbase=$this->alkardex_alinventario->maestro->maestro_ums->desum;
		}
		$nombrecampo=Almacenmovimientos::model()->findByPk($this->codmov)->campoafectadoinv;
		$conversion=Alconversiones::model()->convierte($this->codart,$this->um,$umbase);
		if (abs($this->cant*$conversion) > $regisin->{$nombrecampo}) {
			//$matriz2=Alconversiones::model()->findAll("um1='".trim($unidad)."'");
			$this->adderror('cant','No se puede mover : ['.$this->cant*$conversion.'] '.$nombreumbase.'(s)  mas de los que hay ('.$regisin->getAttributeLabel($nombrecampo).')  : ['.$regisin->{$nombrecampo}.'] '.$nombreumbase.'(s) . Verifique por favor   ' );
		}
	}

	public function checkcodigo($attribute,$params) {

		$modelomaterial=Maestrocompo::model()->find("codigo=:codigox",array(":codigox"=>TRIM($this->codart)));
		if (is_null($modelomaterial)) {
			$this->adderror('codart','Este material no existe' );
		}

		else {
			$modelocabecera=Almacendocs::model()->findByPk($this->hidvale);
			$modinventario=Alinventario::model()->find("codart='".trim($this->codart)."' AND codalm='".$modelocabecera->codalmacen."' AND codcen='".$modelocabecera->codcentro."'" );
			if(is_null($modinventario))	{
				//if($this->alkardex_alinventario===null) {
				$this->adderror('codart','Este material tiene que ser ampliado al centro -:  '.$modelocabecera->codcentro.' y almacen '.$modelocabecera->codalmacen.' ' );


			} else {
				//veriicando la unidad de medida
				if($this->um <> $modelomaterial->um) { //si es diferente a la unidad de medida base
					//revisar las conversiones
					$matrizunidades=Alconversiones::model()->findAll("codart=:codigox and um2=:unitas ",array(":codigox"=>TRIM($this->codart),":unitas"=>$this->um));
					if(count($matrizunidades)==0)
						$this->adderror('um','No existe conversiones para esta unidad de medida en este material ' );
				}

			}


		}

	}






	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

			'codmov0' => array(self::BELONGS_TO, 'Almacenmovimientos', 'codmov'),
			'unidades'=> array(self::BELONGS_TO, 'Ums', 'um'),
			'codcentro0' => array(self::BELONGS_TO, 'Centros', 'codcentro'),
			'documentos' => array(self::BELONGS_TO, 'Documentos', 'coddoc'),
			'documentoref' => array(self::BELONGS_TO, 'Documentos', 'codocuref'),
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'alkardex_alentregas'=>array(self::HAS_MANY, 'Alentregas', 'idkardex'),
			'alkardex_almacendocs'=>array(self::BELONGS_TO, 'Almacendocs', 'hidvale'),
			'alkardex_almacenmovimientos'=>array(self::BELONGS_TO, 'Almacenmovimientos', 'codmov'),
			'alkardex_alkardextraslado_emisor'=>array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexemi'),
			'alkardex_alkardextraslado_destino'=>array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexdes'),
			'alkardex_alkardextraslado_emisor_cant'=>array(self::STAT, 'Alkardextraslado', 'hidkardexemi','select'=>'sum(t.cant)','condition'=>"codestado <> '30'"),
			'alkardex_alkardextraslado_destino_cant'=>array(self::STAT, 'Alkardextraslado', 'hidkardexdes','select'=>'sum(t.cant)','condition'=>"codestado <> '30'"),
			'cantcompras'=>array(self::STAT, 'Desolpecompra', 'iddesolpe','select'=>'sum(t.cant)','condition'=>"codestado <> '30'"),//el campo foraneo
			//'alkardex_alkardextraslado_destino'=>array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexdes'),
			//'alkardex_alinventario'=>array(self::BELONGS_TO, 'Alinventario', 'hidvale'),
			'alkardex_alinventario'=>array(self::BELONGS_TO,'Alinventario',array('codart'=>'codart','alemi'=>'codalm','codcentro'=>'codcen')),
			//'alkardex_alreserva'=>array(self::BELONGS_TO, 'Almacendocs', 'hidvale'),


		);
	}

	/* de acuerdo a tipo de movimiento el campo e sdiatgbleç
	*/
	public function campoeditable(){
		if(in_array($this->alkardex_almacendocs->cestadovale,array('99','10'))){
			$arraycant=array('14','10','30','50','13','41','43','77','78','70','79','98','97','68');
			$arrayum=array('14','10','43','50','77','79','98');
			$arraycodart=array('14','50','77','98','79');
			$arraycolector=array('50','77','79');
			$arraypreciounit=array('98');
			$arraytextolargo=array('14','10','30','50','13','41','43','77','78','70','79','98','97');
			$arraylote=array('14','10','30','50','13','41','43','77','78','70','79','98','97');
		} elseif($this->alkardex_almacendocs->cestadovale=='20') {  //Si se quieren hacer modificaciones despues de efectuado el vale pero solo para algunos campos
			$arraycant=array();
			$arrayum=array();
			$arraycodart=array();
			$arraycolector=array();
			$arraypreciounit=array();
			$arraytextolargo=array('10','30','50','13','41','43','77','78','70','79','98','97','68');
			$arraylote=array();

		} else {///Si no es editable por su estado no es editable ninguno de los campos
			$arraycant=array();
			$arrayum=array();
			$arraycodart=array();
			$arraycolector=array();
			$arraypreciounit=array();
			$arraytextolargo=array('14','10','30','50','13','41','43','77','78','70','79','98','97','68');
			$arraylote=array();
		}
	return	array(
				'cant'=>$arraycant,
				'um'=>$arrayum,
			'codart'=>$arraycodart,
			'colector'=>$arraycolector,
		'preciounit'=>$arraypreciounit,
			'textolargo'=>$arraytextolargo,
			'lote'=>$arraylote,

		);

	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codart' => 'Codart',
			'codmov' => 'Codmov',
			'cant' => 'Cant',
			'alemi' => 'Alemi',
			'aldes' => 'Aldes',
			'fecha' => 'Fecha',
			'coddoc' => 'Coddoc',
			'numdoc' => 'Numdoc',
			'usuario' => 'Usuario',

			'um' => 'Um',
			'comentario' => 'Comentario',
			'codocuref' => 'Codocuref',
			'numdocref' => 'Numdocref',
			'codcentro' => 'Codcentro',
			'codestado' => 'Codestado',
			'prefijo' => 'Prefijo',
			'fechadoc' => 'Fechadoc',
			'correlativo' => 'Correlativo',
			'numkardex' => 'Numkardex',
			'solicitante' => 'Solicitante',
			'hidvale' => 'Hidvale',
			'idref' => 'Idref',
			'lote' => 'Lote',
			'valido' => 'Valido',
			'checki' => 'Checki',
			'destino' => 'Destino',
			'preciounit' => 'Preciounit',
			'correlativ' => 'Correlativ',
			'codcendes' => 'Codcendes',
			'id' => 'ID',
			'iduser' => 'Iduser',
			'idusertemp' => 'Idusertemp',
			'idstatus' => 'Idstatus',
			'idtemp' => 'Idtemp',
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

		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codmov',$this->codmov,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('alemi',$this->alemi,true);
		$criteria->compare('aldes',$this->aldes,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('coddoc',$this->coddoc,true);
		$criteria->compare('numdoc',$this->numdoc,true);
		$criteria->compare('usuario',$this->usuario,true);




		$criteria->compare('um',$this->um,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('prefijo',$this->prefijo,true);
		$criteria->compare('fechadoc',$this->fechadoc,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('numkardex',$this->numkardex,true);
		$criteria->compare('solicitante',$this->solicitante,true);
		$criteria->compare('hidvale',$this->hidvale,true);
		$criteria->compare('idref',$this->idref,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('valido',$this->valido,true);
		$criteria->compare('checki',$this->checki,true);
		$criteria->compare('destino',$this->destino,true);
		$criteria->compare('preciounit',$this->preciounit);
		$criteria->compare('correlativ',$this->correlativ,true);
		$criteria->compare('codcendes',$this->codcendes,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idstatus',$this->idstatus);
		$criteria->compare('idtemp',$this->idtemp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public function search_por_vale($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codart',$this->codart,true);

		$criteria->addcondition(" hidvale=".$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempalkardex the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public $maximovalor;
	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones
	public function beforeSave() {
		if ($this->isNewRecord) {
            /* $modelocabecera=Almacendocs::model()->findByPk($this->hidvale);
			   /*$this->codmov=$modelocabecera->codmovimiento;
				$this->alemi=$modelocabecera->codalmacen;
				$this->codcentro=$modelocabecera->codcentro;*/
				$this->fecha=$this->alkardex_almacendocs->fechacont;
			    $this->iduser=Yii::app()->user->id;
			    $this->idusertemp=Yii::app()->user->id;
				if(Almacenmovimientos::model()->findByPk($this->codmov)->itemsdeterministicos=='1') {
					/*var_dump($this->alemi);
					var_dump(Almacenes::findbycentroalmacen($this->codcentro,$this->alemi));*/
					$this->codmoneda =Almacenes::findbycentroalmacen($this->codcentro,$this->alemi)->codmon;
					if(is_null($this->preciounit))
					$this->preciounit =Alinventario::encontrarregistro($this->codcentro,$this->alemi,$this->codart)->punit;
					}


			if(is_null($this->codestado))
			 $this->codestado='99';
			//$this->codobjeto='001';
			if(is_null($this->fechadoc))
			$this->fechadoc=date("Y-m-d H:i:s");
			//$this->valido='0';
			//$gg=new Numeromaximo;
			//$this->numkardex=$gg->numero($this,'correlativ','maximovalor',12,'codmov');

		} else
		{

			//echo "saliop carajo";	//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
		}

		//NOS ASEGURAMOS DE QUE NADIE LE CAMBIE EL SIGNO A LA CANTIDAD ORIGINAL DEL MOVIMIENTO
		//IF($this->alkardex_almacenmovimientos->signo)
		$this->cant=(($this->alkardex_almacenmovimientos->signo==0)?1:$this->alkardex_almacenmovimientos->signo)*abs($this->cant);


		//var_dump($this->codmoneda);yii::app()->end();
		return parent::beforesave();
	}

	public function InsertaAtencionReserva(){
		if ($this->VerificaCantAtenReservas()){
			return MiFactoria::InsertaAtencionReserva($this->id);
		} else {
			return null;
		}

	}



	//se debe de infgrear la cantida del  KARDEX RECEPTOR
	public function InsertaAlkardexTraslado($cantidad){
		if($this->VerificaCantTrasladoDestino ($cantidad)){
			MiFactoria::InsertaAlkardexTraslado($this->id,$cantidad);
		} else {
			MiFactoria::Mensaje('error', __CLASS__.'   '.__FUNCTION__.' HUBO UN PROBLEMA EN LA VERIFICAION DE LAS CANTIDADES');
			return null;
		}
	}

	public function InsertaAlentregasCompras(){
		MiFactoria::InsertaAlentregasCompras($this->id);
	}

	public function InsertaCcGastos(){
		MiFactoria::InsertaCcGastos($this->id);
	}


	public function InsertaCcGastosServ(){
		MiFactoria::InsertaCcGastosServ($this->id);
	}

	public function chkcatval($attribute,$params){
		if(!Maestrodetalle::tienecatvaloracion($this->codart,$this->alemi,$this->codcentro))
			$this->adderror('codart','Este material no tiene grupo de valor válido, complete este valor en los datos maestros del material para este centro y almacen');
		if(!is_null($this->aldes))
			if(!Maestrodetalle::tienecatvaloracion($this->codart,$this->aldes,$this->codcentro))
				$this->adderror('codart','Este material no tiene grupo .. de valor válido, complete este valor en los datos maestros del material para este centro y almacen');

	}








}
