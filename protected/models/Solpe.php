<?php
const ESTADO_SOLPE_APROBADO='20';
const ESTADO_SOLPE_ANULADO='30';
const ESTADO_SOLPE_CREADO='10';
const ESTADO_SOLPE_PREVIO='99';

class Solpe extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Solpe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'public_solpe';
	}


	public $item;   ///Solo para artificio de una busqueda no tinene otra relevancia

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('escompra', 'required','on'=>'insert'),
			ARRAY('externo', 'safe','on'=>'insert'),
			array('numero,item','required','message'=>' Llene este dato, es obligatorio', 'on'=>'jalaitemparacompras'),
			array('numero,item,estado,escompra','safe', 'on'=>'jalaitemparacompras'),
			array('numero,item','checksiexiste','message'=>' Para los datos ingresados, NO existe este registro, ', 'on'=>'jalaitemparacompras'),
			array('numero','checkcompra', 'on'=>'jalaitemparacompras'),


			array('numero,id,tipo,textocabecera,fechadoc','safe', 'on'=>'insert,update'),
			array('escompra,externo','safe', 'on'=>'insert'),


			array('numero', 'length', 'max'=>10),
			array('numero','checkvalores','on'=>'update'),
			//array('tipo', 'length', 'max'=>3),
			//array('autor', 'length', 'max'=>15),
			//array('estado', 'length', 'max'=>2),

			array('textocabecera, um', 'safe'),

			ARRAY('estado', 'safe','on'=>'aprobacion'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.

			ARRAY('estado,escompra,id,codocuref,hidref', 'safe','on'=>'automatica'),


			array('numero','checknumero','on'=>'pasacompra'),
			array('numero','checkvalores','on'=>'pasacompra'),

			array('numero','checknumero','on'=>'pasacompra'),
			array('numero','checkvalores','on'=>'pasacompra'),


            //array('numero','checkstatus','on'=>'agregaritemscompra'),
            array('numero','required','message'=>'Debes de colocar el número de solicitud','on'=>'agregaritemscompra'),
            array('numero','checknumero','on'=>'agregaritemscompra'),


			array('numero,tipo,escompra, textocabecera, creado, um,codocu,autor, estado,  fechadoc, fechanec, id', 'safe', 'on'=>'search'),
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
			'solpe_documentos'=>array(self::BELONGS_TO, 'Documentos', 'codocu'),
			'tiposolpe'=>array(self::BELONGS_TO, 'Tiposolpe', 'escompra'),
			'pendientescompras'=>array(self::BELONGS_TO, 'VwSolpeparacomprar', 'numero'),
			'solpe_estado'=>array(self::BELONGS_TO,'Estado',array('estado'=>'codestado','codocu'=>'codocu')),
			'numeroitems'=>array(self::STAT, 'Desolpe', 'hidsolpe'),//el campo foraneo
			'solpe_desolpe'=>array(self::HAS_MANY,'Desolpe','hidsolpe'),//el subtotal
			'solpe_totalplaneado'=>array(self::STAT,'Desolpe','hidsolpe','select'=>'sum(punitplan*cant)','condition'=>"est <> '20' "),//el subtotal del planeado
			'solpe_totalreal'=>array(self::STAT,'Desolpe','hidsolpe','select'=>'sum(punitreal*cant)','condition'=>"est <> '20' "),//el subtotal del planeado
			'numeroreservas'=>array(self::STAT, 'Alreserva', 'hidesolpe','condition'=>"estadoreserva <> '30' "),//el campo foraneo

		);
	}


	public static function recordByNumeroItem($numero,$item){
		$ctor=New CDbcriteria;
		$ctor->addCondition("numero=:vnumero");
		$ctor->params=array(":vnumero"=>$numero);
		$registro=null;
		$objeto=self::model()->find($ctor);
		if(!is_null($objeto)){
			foreach($objeto->solpe_desolpe as $detalle){
				if($detalle->item==$item) {
					$registro= $detalle;
					break;
				}
			}

		}
		return  $registro;

	}

	public static function recordByNumero($numero){
		$ctor=New CDbcriteria;
		$ctor->addCondition("numero=:vnumero");
		$ctor->params=array(":vnumero"=>$numero);
		$registro=null;
		$objeto=self::model()->find($ctor);
		if(!is_null($objeto)){

					$registro= $objeto;

			}

				return  $registro;

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'numero' => 'Numero',
			'tipo' => 'Tipo',
			'escompra' => 'Tipo',
			'textocabecera' => 'Texto',
			'creado' => 'Creado',
			'autor' => 'Autor',
			'estado' => 'Estado',

			'fechadoc' => 'Fechadoc',
			'fechanec' => 'Fechanec',
			'externo'=>'Dest Venta',
			'id' => 'ID',
		);
	}

    public function Pasacomprasolo ($identidaddetalle,$hidguia){ //id del detalle solpe y el id de la cabecera de lacomrpa
           $modelodesolpe=Desolpe::Model()->findByPk($identidaddetalle);
           $docompratemporal=Docomprat::Model()->find("iddesolpe=:xiddesolpe and estadodetalle not in ('40')",array(":xiddesolpe"=> $modelodesolpe->id));
        if($docompratemporal===null)
        {
            $docompratemporal=new Docomprat;
            $docompratemporal->tipoimputacion= $modelodesolpe->tipimputacion;
            $docompratemporal->codentro= $modelodesolpe->centro;
            $docompratemporal->codigoalma= $modelodesolpe->codal;
            $docompratemporal->descri=$modelodesolpe->txtmaterial;
            $docompratemporal->detalle=$modelodesolpe->textodetalle;
            $docompratemporal->ceco=$modelodesolpe->imputacion;
            $docompratemporal->um=$modelodesolpe->um;
            $docompratemporal->tipoitem=$modelodesolpe->tipsolpe;
            $docompratemporal->cant=$modelodesolpe->cant;
            $docompratemporal->codart=$modelodesolpe->codart;
            $docompratemporal->punit=0;
            $docompratemporal->iddesolpe=$modelodesolpe->id;
            $docompratemporal->iddocompra=-1; //importante para que pueda pasar al terompral como un regiustro agregado
            $docompratemporal->hidguia=$hidguia; //importante para que pueda pasar al terompral como un regiustro agregado
            $docompratemporal->setscenario('clonasolpe');
            //crietria para filtrar la cantidad de items del detalle
            $criterio=new CDbCriteria;
            $criterio->condition="hidguia=:nguia  AND idsesion=:idsesionx";
            $criterio->params=array(':nguia'=>$hidguia,':idsesionx'=>Yii::app()->user->getId());
            $docompratemporal->item=str_pad(Docomprat::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
            //$docompratemporal->estadodetalle='99';
            $docompratemporal->save();
            //echo $docompratemporal->save();
            //Yii::app()->end();
        }


    }

    public function Pasacompra($hidsolpe,$hidguia) { //el id ID de la compra
//verfiicando el estado de la solpe 
	$matriz=Desolpe::Model()->findAll("hidsolpe=:xhidsolpe and est in ('30','70') ",array(":xhidsolpe"=>$hidsolpe));
	
	for ($i=0; $i < count($matriz); $i++) {
        $this->pasacomprasolo($matriz[$i]['id'],$hidguia);

	}

}
	
	
public function checkvalores($attribute,$params) {
	  	if($this->numeroitems==0 )
	  		$this->adderror('numero','Este documento no tiene items');		
			}

public function checksiexiste($attribute,$params){
	if(is_null($this->recordByNumeroItem($this->numero,$this->item)))
		$this->adderror('numero','No existe este registro para el numero e item indicados');

}


	public function checkcompra($attribute,$params){
		if(!$this->escompra=='1')
			$this->adderror('numero','Esta solicitud no es de compras, es de requisicion de almacen');
		if(in_array($this->estado,array(ESTADO_SOLPE_ANULADO,ESTADO_SOLPE_PREVIO,ESTADO_SOLPE_CREADO)))
			$this->adderror('numero','Esta solicitud no posee el status adecuado');


	}



public function checknumero($attribute,$params) {
   // $this->adderror('numero','Este documento no tiene items');

		if($this->numero===null or empty($this->numero) or trim($this->numero)==""  )
	  		$this->adderror('numero','Ingrese el numero');	
		$solpe=Solpe::model()->find("numero=:xnumero",array(":xnumero"=>trim($this->numero)));
		if($solpe===null) {
		     $this->adderror('numero','Este documento');
					 }else{
            if(!$solpe->estado=='20' )
                $this->adderror('numero','Esta solicitud no tiene un status adecuado :'.$solpe->solpe_estado->estado.' ...');
            if($solpe->escompra <> '1' )
                $this->adderror('numero','Esta solicitud no es para compras :');
                    //ahora verificar que todos los detalles esten ok
            if($solpe->numeroitems==0 )
                $this->adderror('numero','Este documento no tiene items');
                   //ahora verificando que exista algun item que se pueda agregar
                    //estado de los items 03 aprobado, 07 en compras
                     $desolpe=Desolpe::model()->findAll("hidsolpe=:xidsolpe and est=:xestado", array(":xidsolpe"=>$solpe->id,"xestado"=>'30'));
                      if (count($desolpe)==0)
                          $this->adderror('numero','Este documento no tiene items para comprar o ya fueron tomados');





					 }

    /*if($this->numeroitems==0 )
        $this->adderror('numero','Este documento no tiene items');*/



}




public function valorespordefecto(){ 
						//Vamos a cargar los valores por defecto
						$matriz=VwOpcionesdocumentos::Model()->search_d('340')->getData();
						//recorreindo la matriz
						
						 $i=0;
					
							 for ($i=0; $i <= count($matriz)-1;$i++) {								
											     if ($matriz[$i]['tipodato']=="N" ) {
												$this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']+0:'';
											     }ELSE {
												 $this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']:'';
											   
											     }
												
												}		
					return 1;						
											
											
										
					}
public $maximovalor;
	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 

public function beforeSave() {
  //  $prefix="public_";
							if ($this->isNewRecord) {
								//$this->idreporte=
								$mij=null;
											//$command = Yii::app()->db->createCommand(" select nextval('sq_guias') "); 											
											//$this->n_guia= $command->queryScalar();
												$this->codocu='340';
											//$this->codobjeto='001';
												$this->fechadoc=date("Y-m-d H:i:s"); 
												//
								$this->iduser=Yii::app()->user->id;
												
											
											$this->estado='99'; //para que no lo agarre la vista VW-GUIA  HASTA QUE GRABE TODO EL DETALLE
				if($this->escompra=='O' or $this->escompra=='S'    ){
					$this->estado='10';
					$gg=new Numeromaximo;
					$this->numero=$gg->numero($this,'correlativ','maximovalor',7,'codocu');

				}
										//$this->numero=Numeromaximo::numero($this->model(),'numero','maximovalor',10);


										
									} else
									{
										  IF ($this->estado=='99') { //SI SE TRATA DE UNA GUIA NUEVA COLOCARLE 'PREVIO'
												$this->estado='10';
													//$this->c_serie=substr($this->cod_cen, 1);
												//	$this->numero=Numeromaximo::numero($this->model(),'numero','maximovalor',10);
                                              $gg=new Numeromaximo;
                                              $this->numero=$gg->numero($this,'correlativ','maximovalor',7,'codocu');
													// validate user input and redirect to the previous page if valid
												//	$command = Yii::app()->db->createCommand(" UPDATE ".$prefix."desolpe set est='10' where hidsolpe=".$this->id." ");
												//	 $command->execute();
											
											}

										  }


									

									return parent::beforeSave();
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

		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('textocabecera',$this->textocabecera,true);
		//$criteria->compare('creado',$this->creado,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('estado',$this->estado,true);




		$criteria->compare('fechadoc',$this->fechadoc,true);
		$criteria->compare('fechanec',$this->fechanec,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function solpeautomatica($obinventario){
		if ( ! isset( Yii::app ()->session[ 'idsolpe' ] ) )  //Si no existe la sesion
		{
			//creando una solpe NUEVA
			$solpe = New Solpe;
			$solpe->escompra = '1';
			$solpe->textocabecera = "Documento automático";
			//$solpe->estado='01';
			$solpe->save ();
			$solpe->refresh ();
			Yii::app ()->session[ 'idsolpe' ] = $solpe->id;
			///para que agarre el estado '01'
			$solpe->textocabecera = 'Item automatico.,,,,,';
			$solpe->save ();
			/////
			$identidad = $solpe->id;

		} else {

			//sI YA XISTE LA SOLPE HAYA QUER VERIFICAR SU ESTADO
			//SI ESTA CREADO AGREGAR, SI YA ESTA APROBADO O ANULADO, ES MEJOR CREAR OTRA
			$solpe = Solpe::model ()->findByPk ( Yii::app ()->session[ 'idsolpe' ] );
			if ( ! is_null ( $solpe ) )
			{
				// $solpe->textocabecera='Item automatico';
				if ( ! ( $solpe->estado == '10' ) )
				{
					//SI ESTA CREADO AGREGAR ITEMS A ESTA SOLPE, SI YA ESTA APROBADO O ANULADO, ES MEJOR CREAR UAN NUEVA SOLPE
					$solpe2 = New Solpe('automatica');
					//$solpe2->estado='01';
					$solpe2->textocabecera = 'Item automaticosolpes';
					$solpe2->iduser=yii::app()->settings->get('genera','general_userauto');
					if(!$solpe2->save ())
						MiFactoria::Mensaje('error','No se pudo crear la Solicitud automatica del material '.$obinventario->codart.'-'.$obinventario->codalm.'-'.$obinventario->codcen.'  Errores :   '.yii::app()->mensajes->getErroresItem($solpe2->geterrors())." <br>");

					$solpe2->refresh ();
					//var_dump($solpe2->attributes);yii::app()->end();
					$solpe3 = Solpe::model ()->findByPk ( $solpe2->id );
					$solpe3->setScenario ( 'automatica' );
					$solpe3->escompra = '1';
					if ( $solpe3->save () )
						//echo "graba ";
						unset( Yii::app ()->session[ 'idsolpe' ] );
					Yii::app ()->session[ 'idsolpe' ] = $solpe2->id;
					$identidad = $solpe2->id;
					unset($solpe3);unset($solpe2);
					//echo "NUEVA SOLPE ".$solpe2->numero." ----".$solpe2->id."  ";
					//Yii::app()->end();
				} else {

					$identidad = $solpe->id;
				}
			} ELSE {
				/*ECHO "ERROR COMPARITO LA SOLPE " . Yii::app ()->session[ 'idsolpe' ] . "  NO EXISTE";
                Yii::app ()->end ();*/
				MiFactoria::Mensaje('error', " ERROR : LA SOLPE " . Yii::app ()->session[ 'idsolpe' ] . "  NO EXISTE <br>");
			}


			/*$alreserva->estadoreserva='20';
			$alreserva->save();
			$detalle = Desolpe::Model ()->findByPk ( $alreserva->hidesolpe );*/


			$detallesolpe = new Desolpe;
			$detallesolpe->setscenario ( 'auto' );

			$detallesolpe->hidsolpe = $identidad; ////IMPORTANTE , DEBE COGER LA SOLPE QUE NO ESTA APROBADA
			$detallesolpe->tipimputacion ='K';
			$detallesolpe->centro = $obinventario->codcen;
			$detallesolpe->codal = $obinventario->codalm;
			$detallesolpe->txtmaterial =$obinventario->maestro->descripcion;
			//$detallesolpe->textodetalle = $obinventario->textodetalle;
			// $detallesolpe->txtmaterial=$detalle->txtmaterial;
			$detallesolpe->fechacrea = date("Y-m-d H:i:s");
			$fechalead=date("Y-m-d",time()+(($obinventario->detallesmaterial()['leadtime'] >0)?$obinventario->detallesmaterial()['leadtime']:0)*24*60*60);
			$detallesolpe->fechaent = $fechalead;
			//$detallesolpe->fechalib = $detalle->fechalib;
			$detallesolpe->imputacion = NULL;
			//$detallesolpe->estadolib = $detalle->estadolib;

			$detallesolpe->solicitanet = 'Auto';
			$detallesolpe->est = '10';  ///esto es clave , solo se pueden garegar detalles que se van a aa parobar
			//es decir nos e puede insertar un detalle en una solpe APROBADA

			$detallesolpe->um = $obinventario->maestro->um;
			$detallesolpe->tipsolpe = 'M';
			$detallesolpe->cant = $obinventario->detallesmaterial()['cantsol'];
			$detallesolpe->codart = $obinventario->codart;
			$detallesolpe->iduser=yii::app()->settings->get('general','general_userauto');
			//$detallesolpe->idreserva = $id;
			if($detallesolpe->save ()){
				MiFactoria::Mensaje('notice','Se creo  la Solicitud automatica del material '.$obinventario->codart.'-'.$obinventario->codalm.'-'.$obinventario->codcen." <br>");

			}else{
				MiFactoria::Mensaje('error','No se pudo crear la Solicitud automatica del material '.$obinventario->codart.'-'.$obinventario->codalm.'-'.$obinventario->codcen.'  Errores :   '.yii::app()->mensajes->getErroresItem($detallesolpe->geterrors())." <br>");

			}
			//$mensaje.="OK: Se genero la solicitud de compra ".$detallesolpe->desolpe_solpe->numero."  item ".$detallesolpe->item."  con exito <br>";


		}
		return Solpe::model()->findByPk($identidad)->numero;
	}

        
        
}