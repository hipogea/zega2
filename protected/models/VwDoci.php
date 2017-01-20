<?php

class VwDoci extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    const CODIGO_TENENCIA_CERTIFICADOS='400';
    public  $d_fechain1;
   public $color;
   public $fechanominal1;
	public function tableName()
	{
		return 'vw_doci';
	}

        public function behaviors()
	{
		return array(
			// Classname => path to Class
			'imagenesjpg'=>array(
				'class'=>'ext.behaviors.TomaFotosBehavior',
                            '_codocu'=>'280',
                            '_ruta'=>yii::app()->settings->get('general','general_directorioimg'),
                            '_numerofotosporcarpeta'=>yii::app()->settings->get('general','general_nregistrosporcarpeta')+0,
                            '_extensionatrabajar'=>'.pdf',
                            '_id'=>$this->getPrimarykey(),
                                ),
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
			array('codocu, codtenencia, rucpro, final', 'required'),
			array('id, nhorasnaranja, nhorasverde', 'numerical', 'integerOnly'=>true),
			array('monto', 'numerical'),
			array('codprov', 'length', 'max'=>6),
			array('fecha, fechain', 'length', 'max'=>19),
			array('correlativo', 'length', 'max'=>8),
			array('tipodoc, codepv, codgrupo, codocu, codocuref', 'length', 'max'=>3),
			array('moneda, final', 'length', 'max'=>1),
			array('descorta', 'length', 'max'=>25),
			array('codresponsable, codteniente, codlocal, codtenencia', 'length', 'max'=>4),
			array('creadopor', 'length', 'max'=>23),
			array('creadoel', 'length', 'max'=>15),
			array('docref', 'length', 'max'=>14),
			array('numero, numdocref', 'length', 'max'=>20),
			array('cod_estado', 'length', 'max'=>2),
			array('descripcion, ap', 'length', 'max'=>30),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			array('texv, fechacrea', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,color,d_fechain1,fechanominal1,fechanominal,fechavencimiento,fechavencimiento1,codtenencia,hidproc, codprov, fecha,'
                            . ' fechain, correlativo, tipodoc, moneda, descorta, codepv,'
                            . ' monto,  codresponsable, '
                            . ' docref, codteniente, codlocal, numero, codocu,'
                            . ' codtenencia, fechacrea, codocuref, nhorasnaranja, nhorasverde,'
                            . ' numdocref, descripcion, ap, despro,espeabierto, rucpro, final,codigotra', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'docingresados'=>array(self::HAS_ONE, 'Docingresados', 'id'),
			// 'tenores' => array(self::BELONGS_TO, 'Tenores', array('codsoc'=>'sociedad','codocu'=>'coddocu') ),
           
                    
                    
                    
                    
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			//'id' => 'ID',
			'codprov' => 'Empresa',
			'fecha' => 'Fecha',
			'fechain' => 'F Ing.',
			'correlativo' => 'N. Correl',
			'tipodoc' => 'T Doc',
			'moneda' => 'Moneda',
			'descorta' => 'Descr',
			'codepv' => 'Embarca',
			'monto' => 'Monto',
			'codgrupo' => 'Cod Gr',
			'codresponsable' => 'Responsable',
			'texv' => 'Tex',
			'docref' => 'Doc. R',
			'codteniente' => 'Codteniente',
			'codlocal' => 'Centro',
			'numero' => 'Numero',
                    'fechanominal' => 'F. Proc.',
			'cod_estado' => 'Est',
			'codocu' => 'Codocu',
			'codtenencia' => 'Tenencia',
			'fechacrea' => 'F. Cr',
			'codocuref' => 'Cod Ref',
			'nhorasnaranja' => 'Nh Naranja',
			'nhorasverde' => 'Nh Verde',
			'numdocref' => 'Num Ref',
			'descripcion' => 'Descripcion',
			'ap' => 'Apellido',
			'despro' => 'Empresa',
                        'hidproc'=>'Proceso',
			'rucpro' => 'RUC',
			'final' => 'Final',
                    'codigotra' => 'Apoderado',
                    'fechavencimiento' => 'F. Venci',
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

		//$criteria->compare('id',$this->id);
		//$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('fecha',$this->fecha,true);
                $criteria->compare('color',$this->color,true);
		//$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('tipodoc',$this->tipodoc,true);
                $criteria->compare('color',$this->color,true);
		//$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('monto',$this->monto);
		//$criteria->compare('fechavencimiento',$this->codgrupo,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);
		$criteria->compare('codteniente',$this->codteniente,true);
		$criteria->compare('codlocal',$this->codlocal,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('cod_estado',$this->cod_estado,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codigotra',$this->codigotra,true);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('nhorasnaranja',$this->nhorasnaranja);
		$criteria->compare('nhorasverde',$this->nhorasverde);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('final',$this->final,true);
                $criteria->compare('espeabierto',$this->espeabierto,true);
                 $criteria->addCondition("codtenencia not in ('".self::CODIGO_TENENCIA_CERTIFICADOS."')");
                if(isset($_SESSION['sesion_Clipro']))
                    {
			$criteria->addInCondition('codprov', $_SESSION['sesion_Clipro'], 'AND');
			  } ELSE {
				$criteria->compare('codprov',$this->codprov,true);
                      }
                      
                      if(isset($_SESSION['sesion_Trabajadores']))
                    {
			$criteria->addInCondition('codigotra', $_SESSION['sesion_Trabajadores'], 'AND');
			  } ELSE {
				$criteria->compare('codigotra',$this->codigotra,true);
                      }
                      
                     if(isset($_SESSION['sesion_Tenencias']))
                    {
			$criteria->addInCondition('codtenencia', $_SESSION['sesion_Tenencias'], 'AND');
			  } ELSE {
				$criteria->compare('codtenencia',$this->codtenencia,true);
                      }  
                      
                      
                       if(isset($_SESSION['sesion_Eventos']))
                    {
			$criteria->addInCondition('hidproc', $_SESSION['sesion_Eventos'], 'AND');
			  } ELSE {
				$criteria->compare('hidproc',$this->hidproc,true);
                      }  
                      
                      
                      
                      
                if(isset($_SESSION['sesion_Docingresados']))
                    {
			$criteria->addInCondition('id', $_SESSION['sesion_Docingresados'], 'AND');
			  } ELSE {
				$criteria->compare('id',$this->id,true);
                      }      
                      
                      
                      
               if(isset($_SESSION['sesion_Embarcaciones']))
                    {
			$criteria->addInCondition('codepv', $_SESSION['sesion_Embarcaciones'], 'AND');
			  } ELSE {
				$criteria->compare('codepv',$this->codepv,true);
                      } 
                      
                       if((isset($this->fechain) && trim($this->fechain) != "") && (isset($this->d_fechain1) && trim($this->d_fechain1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechain', ''.$this->fechain.'', ''.$this->d_fechain1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}
                                                
                                                
                            if((isset($this->fechanominal) && trim($this->fechanominal) != "") && (isset($this->fechanominal1) && trim($this->fechanominal1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechanominal', ''.$this->fechanominal.'', ''.$this->fechanominal1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}   
                                                
                                                if((isset($this->fechavencimiento) && trim($this->fechavencimiento) != "") && (isset($this->fechavencimiento1) && trim($this->fechavencimiento1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechavencimiento', ''.$this->fechavencimiento.'', ''.$this->fechavencimiento1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}  
                     
                     $dependecy = new CDbCacheDependency('SELECT count(*) FROM {{docu_ingresados}}');
 
                return new CActiveDataProvider($this->cache(600, $dependecy, 2), array ( 
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>50),
                                            ));
                
		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
	}

        
        public function search_por_proceso($arrayvalores)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
            $criteria->addInCondition('id',$arrayvalores);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwDoci the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
     public function horaspadas(){
       return round((time()-strtotime($this->fechanominal))/(60*60),2);
     }  
     
     
     public function horaspasadas() {

        
        if (!is_null($this->fechafin)) {
            return MiFactoria::tiempopasado($this->fechanominal, $this->fechafin, 'h');
        } else {
            $fevencimiento = $this->fechavencimiento;
            if (is_null($fevencimiento) or strlen(trim($fevencimiento))==0 or empty($fevencimiento)) 
             {
                // echo "esta es ";
                return MiFactoria::tiempopasado($this->fechanominal, null, 'h');
            } else { //si tiene fecha de vencimiento ahi si debe de cambiar el criterio
                if (yii::app()->periodo->verificaFechas(date("Y-m-d"), $fevencimiento)) { //si esta en el pasado
                    return MiFactoria::tiempopasado($this->fechanominal, null, 'h');
                } else {//si esta ene el futuro
                    return MiFactoria::tiempopasado($fevencimiento, null, 'h');
                }
            }
        }
        
        
        
        
        
        
        
    }
      
     public function getcolor(){
         if($this->final <> "1"){
             $pasado=$this->horaspasadas();
         if( $pasado < $this->nhorasverde)
             return '#07a204';
         if( $pasado < $this->nhorasnaranja and $pasado > $this->nhorasverde)
            return '#f1bd02';
          if( $pasado  > $this->nhorasnaranja)
              
            return '#f5143e';
         }else{
           return '#d8d5d2';  
         }
         
             
     }
     
     public function afterfind(){
         $this->color=$this->getcolor();
         return parent::afterfind();
     }
     
    public function getPrimarykey(){
        return $this->id;
    }
    
    
    public function search_por_filtro_array($arrayids,$codproveedor=null)
	{
		
		$criteria=new CDbCriteria;
               if(!is_null($codproveedor)){
                    $criteria->addCondition("codprov=:vcodpro");
                    $criteria->params=array(":vcodpro"=>$codproveedor);
                }
                $criteria->addInCondition('id',$arrayids);
                
                    

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    public static function array_columnas_proveedores(){
        return array(
             'numero',
            'correlativo',
            'despro',           
            'descorta',
            'moneda',
            'nomep',
            'fecha',
            'fechain',
            'numdocref',
                );
    }
     
    public static function array_columnas_interno(){
        return array(
            'desdocu',
             'numero',            
            'correlativo',
            'despro',           
            'descorta',
           // 'moneda',
            'nomep',
            'fecha',
            'fechain',
            //'numdocref',
                );
    }
    
    
    
    public static function kpiprovdocu($codocu,$codtenencia){
        $factor=0.6;
        $codocu=  MiFactoria::cleanInput($codocu);
        $codtenencia=  MiFactoria::cleanInput($codtenencia);
        $sqlcount=" select AVG( (".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin').")*montomoneda  ) 
            as smtiempodinero
  from vw_docu_ingresados 
   where ".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin')." > 12 and final<>'1' 
  ";
     // var_dump( $sqlcount);die();
   $montototal= yii::app()->db->createCommand($sqlcount)->queryScalar() ;  
   
   
        $sql=" select count(id) as cantidad, 
            avg(".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin').") AS horasprom, 
avg(montomoneda) AS montosoles, AVG( (".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin')."  )*montomoneda) AS tiempodinero,
codprov ,despro,
tipodoc 
from vw_docu_ingresados 
where tipodoc='".$codocu."'  
group by codprov,tipodoc    having AVG( (".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin')."  )*montomoneda) > ".((string)($montototal*$factor))."   order by tiempodinero desc " ;
        
  
       //return var_dump($sql);
        //return var_dump((string)($montototal*0.8));
        
       $datos=yii::app()->db->createCommand($sql)->queryAll(); 
       $datosparagrafico=MiFactoria::getArrayValColumnas($datos);
       return $datosparagrafico;
        
    }
     
    
    
     public static function kpiprovdocuhoras($codocu,$codtenencia){
        $factor=0.1;
        $codocu=  MiFactoria::cleanInput($codocu);
        $codtenencia=  MiFactoria::cleanInput($codtenencia);  
        
     $sqlcount=" select AVG (".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin').") as smhoras
                    from vw_docu_ingresados where codtenencia ='100' and  final<>'1' ";
     // VAR_DUMP( $sqlcount);DIE();
      $horastotales100= yii::app()->db->createCommand($sqlcount)->queryScalar() ;  
      
    $sql100= " select count(id) as cantidad, 
    avg(  ".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')."  ) 
    AS horasprom,codprov ,despro,codtenencia, tipodoc 
    from vw_docu_ingresados where codtenencia='100' and  tipodoc='145' 
    and ".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." > 12 
    group by codprov,tipodoc,despro ,codtenencia
    having AVG (".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." )"
    . " > ".((string)($horastotales100*$factor))." 
    order by codprov desc "; 
    
    $sqlcount=" select AVG (".MiFactoria::dbExpresionTiempoPasado('fechanominal','fechafin').") as smhoras
                    from vw_docu_ingresados where codtenencia ='200' and   final<>'1' "; 
    
      $horastotales200= yii::app()->db->createCommand($sqlcount)->queryScalar() ; 
           
      $sql200= " select count(id) as cantidad, 
    avg(  ".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')."  ) 
    AS horasprom,codprov ,despro,codtenencia, tipodoc 
    from vw_docu_ingresados where codtenencia='200' and  tipodoc='145' 
    and ".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." > 12 
    group by codprov,tipodoc,despro ,codtenencia
    having AVG (".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." )"
    . " > ".((string)($horastotales100*$factor))." 
    order by codprov desc ";
      
        $datos100=MiFactoria::getArrayValColumnas(yii::app()->db->createCommand($sql100)->queryAll()); 
        $datos200=MiFactoria::getArrayValColumnas(yii::app()->db->createCommand($sql200)->queryAll());
      
       
       
//MiFactoria::getArrayValColu
        //mnas($datos);
       //MiFactoria::getArrayValColumnas($datos);
        //combinado los valores  de cod rpvedor y horas
        $datos100=array_combine($datos100['codprov'],$datos100['horasprom']);
         $datos200=array_combine($datos200['codprov'],$datos200['horasprom']);
            ksort($datos100);
         // var_dump($datos100);
        //echo "<br>";echo "<br>";echo "<br>";
  ksort($datos200);
        // echo "<br>";print_r($datos100);echo "<br>";echo "<br>";print_r($datos200);echo "<br>";
        //echo "<br>";echo "<br>";echo "<br>";
        
           $combinado=array_merge(
              array_keys($datos100),
               array_keys($datos200)
               
                                            );
           
           $proveedores=array_unique($combinado);
           $proveedores=array_values($proveedores);
             //var_dump($proveedores);die();
    
       foreach($proveedores as $clave =>$valor){
            $datos100[$valor]=(in_array($valor,array_keys($datos100)))?$datos100[$valor]:0;
             $datos200[$valor]=(in_array($valor,array_keys($datos200)))?$datos200[$valor]:0;
            
        }
                 
       return array(
           'proveedores'=>$proveedores,
           'horas100'=> array_values($datos100),
            'horas200'=> array_values($datos200),
       );
    
    }
    
    
   
    
    
     public static function kpiprovdocunumero($codocu,$codtenencia){
        $factor=0.01;
        $codocu=  MiFactoria::cleanInput($codocu);
        $codtenencia=  MiFactoria::cleanInput($codtenencia);
              
      $sqlcount=" select  count(id) as smdocus
from vw_doci
where  tipodoc='145' and  final<>'1'  ";  
   $docstotales= yii::app()->db->createCommand($sqlcount)->queryScalar() ;  
             $sql=" select count(id) as cantidad,             
codprov ,despro,
tipodoc 
from vw_doci 
where tipodoc='".$codocu."'   group by codprov,tipodoc,despro    having count(id) > ".((string)($docstotales*$factor))."   order by cantidad desc " ;
  //var_dump($sql);die();
             $datos=yii::app()->db->createCommand($sql)->queryAll(); 
       $datosparagrafico=MiFactoria::getArrayValColumnas($datos);
       //var_dump($datosparagrafico);die();
       return $datosparagrafico;
       
    }
    
    
   public static function getcantidadporusuario($codtra=null){
       
       $cadena="";
       if(!is_null($codtra))
           $cadena=" and codigotra='".$codtra."'";
      $sqlcount=" select  count(id) as cantdocus, codigotra,ap
                    from vw_doci
where  tipodoc='145' and  final<>'1' ".$cadena."  group by codigotra,ap order by  count(id) desc ";  
      if(is_null($codtra)){
          //echo "salio";die();
          return  yii::app()->db->createCommand($sqlcount)->queryAll() ; 
      }else{
           //echo "salio 45";die();
          $salio=yii::app()->db->createCommand($sqlcount)->queryAll();
          if(count($salio)>0){
             return $salio[0]["cantdocus"] ; 
          }else{
              return 0;
          }
         
      }
      
  
  
 } 
    
 
  public static function vencimientocertificados($codtenencia,$diferenciahoras){
         $codtenencia=  MiFactoria::cleanInput($codtenencia);
          
          $sql200= "select t.*,
            round(".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." /nhorasnaranja ,2) as porcentaje,
round(".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin').",2  )  as horaspasadas,
nhorasnaranja-round(".MiFactoria::dbExpresionTiempoPasado('fechanominal', 'fechafin')." ,2) 
 from vw_doci t where
  (IFNULL(           TIMESTAMPDIFF(  HOUR,fechanominal, IFNULL(  fechavencimiento,now() )         ),nhorasnaranja)      
  -round(TIMESTAMPDIFF(HOUR,fechanominal,IFNULL(fechafin,now())) ,2) ) < ".$diferenciahoras." 
    and  
	 codtenencia='".$codtenencia."' and final <> '1' ";
          
         // echo $ql200; echo "<br><br>";
            $datos=yii::app()->db->createCommand($sql200)->queryAll(); 
        return $datos;
        
         
    }
    
 public static function vencimientocertificadosId($codtenencia,$dias){
         $codtenencia=  MiFactoria::cleanInput($codtenencia);
          $dias=  MiFactoria::cleanInput($dias);
          $sql200= "select t.id 
 from vw_doci t where 
IF(ISNULL(fechavencimiento)=1,  nhorasnaranja-TIMESTAMPDIFF(HOUR,fechanominal,now() ) ,
TIMESTAMPDIFF(HOUR,NOW(),fechavencimiento )   ) <  ".($dias*24)." and codtenencia='".$codtenencia."' and final <> '1' ";
          
         // echo $ql200; echo "<br><br>";
            $datos=yii::app()->db->createCommand($sql200)->queryColumn(); 
        return $datos;
        
         
    }
 
}
