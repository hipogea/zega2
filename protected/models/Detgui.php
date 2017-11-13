<?php

class Detgui extends ModeloGeneral
{
    public $otref; //campo auxliar para asignar OTS
     public $cantot; //campo auxliar para asignar OTS
    const CODIGO_DOC='230';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Detgui the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{detgui}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{




		$reglas=array(
			array('otref,cantot', 'safe','on'=>'imputaciones'),
                    array('cantot', 'numerical','min'=>0,'on'=>'imputaciones'),
                        array('cantot', 'chkcantidadot','on'=>'imputaciones'),
                     array('otref', 'chkot','on'=>'imputaciones'),
			/*array('n_cangui', 'numerical'),
			array('n_cangui', 'required','message'=>'Cantidad vacia'),
			array('c_itguia, c_um, c_codep, codocu', 'length', 'max'=>3),
			array('c_codgui, docref', 'length', 'max'=>8),
			array('c_codgui, docref', 'length', 'min'=>8),
			//array('c_edgui, c_estado', 'length', 'max'=>2),
			array('c_descri', 'length', 'max'=>40),
			array('c_descri', 'length', 'min'=>10),
			array('c_descri', 'required','message'=>'Sin descripcion'),
			array('c_um', 'required','message'=>'Sin unidad de medida'),
			//array('l_libre, c_af, c_img', 'length', 'max'=>1),
			//array('creadopor, modificadopor', 'length', 'max'=>25),
			//array('creadoel, modificadoel', 'length', 'max'=>20),
			
			//array('c_codsap', 'length', 'max'=>5),
			//array('c_codsap', 'length', 'min'=>5),
				
				array('c_codactivo', 'checkplaca'),		
				array('c_codactivo', 'match', 'pattern'=>'/90-3[1-5]{1}00-[0-9]{5}/','message'=>'Oye el codigo de placa no es el correcto'),
			array('c_codep', 'required','message'=>'Sin referencia'),
			array('c_edgui', 'required','message'=>'Llene el destino'),
			array('docrefext', 'length', 'max'=>15), */
			array('n_hguia,m_obs,modo,codocu,c_itguia,c_codactivo,c_um,modo,c_codgui,hidref,
			c_um,c_itguia,n_cangui,c_descri,c_estado,c_edgui,c_codep,n_hconformidad,docref,c_af,
			cargodevolucion,codlugar', 'safe','on'=>'buffer' ),
		 /*
			//array('c_codsap', 'checkplaca','on'=>'insert,update'),
			array('c_codgui', 'checkcodigo','on'=>'insert,update'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('n_hguia, c_itguia, n_cangui, c_codgui, c_edgui, c_descri, m_obs, c_um, c_codep, ndeenvio, n_detgui, l_libre, creadopor, creadoel, modificadopor, modificadoel, n_hconformidad, c_estado, n_libre, n_idconformidad, c_af, c_codactivo, c_img, c_codsap, docref, docrefext, hidref, codocu', 'safe', 'on'=>'search'),
		


				//escenario para la nota de entrada

*/

		);


		if(yii::app()->settings->get('transporte','transporte_objenguia')=='1'){
			$reglas[]=array('codob','safe');
		}
//VAR_DUMP($reglas);die();
		return $reglas;
	}






	
	public function checkcodigo($attribute,$params) {
	  //Primero debemos verificar que el codigo SAP y el codigo de AF son los correctos
	  $codigo=$this->c_codgui;
	    if ( !is_null($codigo) or !empty($codigo)) 
							{
							$vari=Maestrocompo::model()->find('codigo=:codito',array(':codito'=>$codigo));
							$comp=is_null($vari)?'':$vari->codigo;
							if(!(trim($codigo)==trim($comp )))																
								$this->adderror('c_codgui','El codigo de material no Existe');	
							} else {

							} 
	  
		} 
	
	public function valorespordefecto(){ 
						//Vamos a cargar los valores por defecto
						$matriz=VwOpcionesdocumentos::Model()->search_d('023')->getData();
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
					
	
	
	
	public function checkplaca($attribute,$params) {
	  //Primero debemos verificar que el codigo SAP y el codigo de AF son los correctos
	 // $codigosap=$this->c_codsap;
	  $codigoaf=$this->c_codactivo;
	    if (!($codigoaf===null) ) {
		        //if ( !is_null($codigoaf)) {
												$vali=Inventario::model()->find('codigoaf=:codito',array(':codito'=>$codigoaf));
												//if(!(trim($codigoaf)==trim(is_null($vali)?'':$vali->codigoaf)) ) 
																							//{
																			if ($vali===null) {
																							//$this->adderror('c_codactivo','El codigo de activo no Existe');
																							 } else {
																							 	$milugar=$vali->codlugar;
																							 	 //Si esta repetido en otro item de la guia o la NE

	          																										  $registros=Detgui::model()->findAll("c_codactivo=:micodigoaf and n_hguia=:valorcabeza and n_detgui <> :idregistro", array(":valorcabeza"=>$this->n_hguia,":idregistro"=>$this->n_detgui, ":micodigoaf"=>$codigoaf));
	      																								   if (count($registros) >0)	
	      		     																							$this->adderror('c_codactivo','Este activo ya esta registrado en este documento');
																							
         																												 //Si este activo esta comprometido con otro transporte  ROCOTO==1, en otro documento
	      		       																									 //si es una guia de remision , elactivo  en rocoto==1 y ademas el iddocu del inventario es diferente al iddocu actual
	      		          																												 $modelocab=Guia::model()->find('n_guia=:myid',array(':myid'=>$this->n_hguia));
	      		     																										if ($vali->rocoto=='1' and $this->n_hguia <> $vali->iddocu and $modelocab->c_salida=='1')
	      		     			 																								 $this->adderror('c_codactivo','Este activo esta en proceso de transporte con el documento '.$vali->numerodocumento);



																							 }
			///si permite restricciones antes de mover los activos	, validar desde donde se quiere mover , no permitira
			/// mover un activo desde un lugar donde no se encuentre actualmente							
									
	      if (Yii::app()->params['restriccionguia']=='1') { //si hay restricciones validar...
	      				  //$this->adderror('c_codactivo','este es el codigo del lugar :'.Inventario::model()->find('codigoaf=:codito',array(':codito'=>$codigoaf))->codlugar);
	      	      // $direccion=Guia::model()->find("n_guia=:miguia", array(":miguia"=>$this->n_hguia))->n_dirsoc; ///sacando el registro de la guia
	      	      //$modlugar=Lugares::model()->find("codlugar=:milugar and n_direc=:midireccion ", array(":milugar"=>$milugar,":midireccion"=>$direccion));
	      	      // $this->adderror('c_codactivo','este es el codigo del lugar :');
	      	      //  if(!($modeldireccion===null)) {
	      	        	//$direccion=$modeldireccion->n_dirsoc; ///sacamos el punto de partida
	      	        	                  //     } else {

	      	        	       // $this->adderror('c_codactivo','No se ha encontrado la guia ');
																						
	      	        	                       // }

	      			//verificar que este activo se esta sacando de algun lugar del punto de partida*/
	      	         
	      	    //  if ($modelolugar===null) {
	      	         	//$this->adderror('c_codactivo','Este activo no se encuentra en el punto de partida');
	      	       //  } else {
	      	         	//$this->adderror('c_codactivo','pasoi');
	      	     //    }
					
	      		
	      }

	     

			 } 	



			 			
		
		} 	
	   
	  
				
									
	 
	
	
	
	public function beforeSave() {
							if ($this->isNewRecord) {									
									$this->c_estado='99';
									
													}
						
							 if ( !is_null($this->c_codactivo) OR   !EMPTY($this->c_codactivo) )
									{									
									   // $this->c_codsap=Inventario::model()->find('codigoaf=:codito',array(':codito'=>$this->c_codactivo))->codigosap;								
													}
                                    if($this->getScenario()=='imputaciones'){
                                             $this->insertaneot();
                                     }                                                                    
                                                                                                        
													
										return parent::beforeSave();	
											}  
					
				
	
	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'guia' => array(self::BELONGS_TO, 'Guia', 'n_hguia'),
                    'ne' => array(self::BELONGS_TO, 'Ne', 'n_hguia'),
			'materiales' => array(self::BELONGS_TO, 'Maestrocompo', 'c_codgui'),
			'activos'=> array(self::BELONGS_TO, 'VwInventario1', 'c_codactivo'),
                    'tempdetgui'=>array(self::HAS_ONE, 'Tempdetgui', 'id'),
                    'neot'=>array(self::HAS_MANY, 'Neot', 'hidne'),
                    'asignadosot'=>array(self::STAT, 'Neot', 'hidne','select'=>'sum(t.cant)'),
                  //  'cantsolpes'=>array(self::STAT, 'Desolpecompra', 'iddocompra','select'=>'sum(t.cant)','condition'=>"codestado <> '30'"),//el campo foraneo
			
			//'ot'=> array(self::STAT, 'Deot','hidne', 'sum(t.cant)'),
			//'lotescosteado'=>array(self::STAT,'Lotes','hidinventario','select'=>'SUM(cant*punit)', 'condition'=>'cant > 0 '),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'n_hguia' => 'N Hguia',
			'c_itguia' => 'Item',
			'n_cangui' => 'Cantidad',
			'c_codgui' => 'Codigo',
			'c_edgui' => 'Destino',
			'c_descri' => 'Descripcion',
			'm_obs' => 'Detalle',
			'c_um' => 'Um',
			'c_codep' => 'Referencia',
			'ndeenvio' => 'Ndeenvio',
		//	'n_detgui' => 'N Detgui',
			'l_libre' => 'L Libre',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'n_hconformidad' => 'N Hconformidad',
			'c_estado' => 'Estado',
			'n_libre' => 'N Libre',
			'n_idconformidad' => 'N Idconformidad',
			'c_af' => 'Es activo?',
			'c_codactivo' => 'Codigo de placa',
			'c_img' => 'C Img',
			'c_codsap' => 'Codigo SAP',
			'docref' => 'Doc. Referencia',
			'docrefext' => 'Docrefext',
			'hidref' => 'Hidref',
			'codocu' => 'Codocu',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	// Warning: Please modify the following code to remove attributes that
		// should not be searched.
public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('n_hguia',$this->n_hguia,true);
		$criteria->compare('c_itguia',$this->c_itguia,true);
		$criteria->compare('n_cangui',$this->n_cangui);
		$criteria->compare('c_codgui',$this->c_codgui,true);
		$criteria->compare('c_edgui',$this->c_edgui,true);
		$criteria->compare('c_descri',$this->c_descri,true);
		$criteria->compare('m_obs',$this->m_obs,true);
		$criteria->compare('c_um',$this->c_um,true);
		$criteria->compare('c_codep',$this->c_codep,true);
		//$criteria->compare('ndeenvio',$this->ndeenvio,true);
		//$criteria->compare('n_detgui',$this->n_detgui,true);
		//$criteria->compare('l_libre',$this->l_libre,true);
		//
		//
		//
		//
		//$criteria->compare('n_hconformidad',$this->n_hconformidad,true);
		$criteria->compare('c_estado',$this->c_estado,true);
		//$criteria->compare('n_libre',$this->n_libre);
		//$criteria->compare('n_idconformidad',$this->n_idconformidad,true);
		//$criteria->compare('c_af',$this->c_af,true);
		$criteria->compare('c_codactivo',$this->c_codactivo,true);
		//$criteria->compare('c_img',$this->c_img,true);
		$criteria->compare('c_codsap',$this->c_codsap,true);
	//	$criteria->compare('docref',$this->docref,true);
		//$criteria->compare('docrefext',$this->docrefext,true);
		//$criteria->compare('hidref',$this->hidref,true);
		//$criteria->compare('codocu',$this->codocu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function aftersave(){
            if($this->hidref > 0){
                if($this->cambiocampo('hidref')){
                   $registrodespacho=  Despacho::model()->findByPk($this->hidref);
                   $kardex=$registrodespacho->kardex;
                   $kardex->setScenario('transporte');$kardex->checki='1';$kardex->save();unset($kardex);
                $registro=New Despachoguia();
                $registro->setattributes(
                        array(
                            'hidespacho'=>$registrodespacho->id,
                            'hiddetgui'=>$this->id,
                            'cant'=>$this->n_cangui,
                        )
                        );
                $registro->save();
                if($registrodespacho->cantdespachada >= $registrodespacho->kardex->cant){
                     $registrodespacho->setScenario('vigencia');
                 $registrodespacho->vigente='0';
                 $registrodespacho->save();
                } 
                
                
                }
                
                   
                
            }
            
            return parent::aftersave();
        }
      public static function findByIdguia($id,$item){
        $criter=New CDbCriteria();
        $criter->addCondition("n_hguia=:vnguia and c_itguia=:vitem");
        $criter->params=array(":vnguia"=>$id,":vitem"=>$item );
        $cri->addNotInCondition("c_estado",Estado::estadosnocalculables(self::CODIGO_DOC));
        return self::model()->find($criter);
        
    } 
    
    public funCtion esimputableot(){
        RETURN TRUE;
    }
    
    public function chkcantidadot($attribute,$params) {
	
        if($this->asignadosot+$this->cantot > $this->n_cangui)
          $this->adderror('cantot',"La cantidad asignada  [$this->cantot] mas  la cantidad acumulada [$this->asignadosot] ,supera la cantidad  ingreesada [$this->n_cangui] ");	
							
		} 
                
      public function chkot($attribute,$params) {
         $orden= explode('-', $this->otref);
         if(count($orden)==0){
         $this->adderror('otref','El formato de imputacion no es el correcto');return;
         
                    }
         $registroorden=Ot::model()->findByNumero($orden[0]);
         if(is_null($registroorden)){
            $this->adderror('otref','Esta orden no existe');return;
          }else{
              if(!in_array($orden[1],$registroorden->listaitems()))
                $this->adderror('otref','El item ['.$orden[1].'] indicado en la orden no existe');return; 
               
                }
          
        }           
      
        public function insertaneot(){
            $registro=New Neot('nemasiva');
             $orden= explode('-', $this->otref);        
         
                    
         $registroorden=Ot::model()->findByNumero($orden[0]);
            $registro->setAttributes(
                    array(
                        'hidne'=>$this->id,
                        'hidot'=>$registroorden->getid($orden[1]),
                        'cant'=>$this->cantot,
                        'idot'=>$registroorden->id,
                    )
                    );
            $registro->save();
            unset($registroorden);
        }
         
                
}
