<?php

class VwParteopdetalle extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_parteopdetalle';
	}
         const DELIMITADOR=',';

        public $fecha1;
        public $_campopivote=null; ///campo ro el cuela se qwuiere reportart  pude ser : codigoaf, codtipo, codcentro
        public $_level=null; //nivel de profundidad puede ser anno, mes, semana, 
        public $_camposprofundidad=array(
                                    'dia'=>array(),
                                    'semana'=>array('dia'),
                                    'mes'=>array('semana','dia'),                                    
                                    'anno'=>array('semana','mes','dia'),
                                    );
        public $_campospivote=array('codigoaf'=>array(),
                                    'codtipo'=>array('codigoaf'),
                                     //'hidturno'=>array('codigoaf','codtipo'),
                                    'codproyecto'=>array('codigoaf','codtipo','destipo'),                                    
                                    'codcen'=>array('codigoaf','codtipo','codproyecto','destipo'),
                                    );
        public $_dia=null;
        public $_semana=null;
        public $_mes=null;
        public $_anno=null;
        public $periodo=null;
        public $grupo=null;
	/**
	 * @return array validation rules for model attributes.
	 */
        
       
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('anno', 'required','on'=>'filtro'),
                     array('anno', 'safe','on'=>'filtro'),
                     //array('fecha,fecha1','checkfechas','on'=>'filtro'),
			
                    
                    
			//array('codresponsable, fecha, codturno, hidturno, horacierre, codproyecto, hidparte, hidequipo, textocorto, codcen', 'required'),
			array('hidturno, semana, dia, anno, hidparte, iduser, np, ns, ntt', 'numerical', 'integerOnly'=>true),
			array('codresponsable, hmi, hmf, hmt, hpi, hpf, hpt, dispo, util', 'length', 'max'=>6),
			array('fecha, numero', 'length', 'max'=>10),
			array('codturno, codocu', 'length', 'max'=>3),
			array('horacierre', 'length', 'max'=>8),
			array('codproyecto', 'length', 'max'=>15),
			array('codestado, mes', 'length', 'max'=>2),
			array('codigo, codigoaf', 'length', 'max'=>14),
			array('id, hidequipo', 'length', 'max'=>20),
			array('hp, hpp, tbd, hd, htt, codcen', 'length', 'max'=>4),
			array('textocorto, nombreobjeto', 'length', 'max'=>40),
			array('ap', 'length', 'max'=>30),
			array('nombres', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codresponsable, fecha,fecha1, codturno, hidturno, horacierre, codproyecto, codocu, codestado, codigo, mes, semana, dia, anno, numero, id, hidparte, hidequipo, hp, hpp, hmi, hmf, hmt, tbd, hpi, hpf, hpt, hd, dispo, util, iduser, np, ns, htt, ntt, textocorto, codcen, codigoaf, ap, nombres, nombreobjeto,codtipo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codresponsable' => 'Codresponsable',
			'fecha' => 'Fecha',
			'codturno' => 'Codturno',
			'hidturno' => 'Hidturno',
			'horacierre' => 'Horacierre',
			'codproyecto' => 'Codproyecto',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'codigo' => 'Codigo',
			'mes' => 'Mes',
			'semana' => 'Semana',
			'dia' => 'Dia',
			'anno' => 'Anno',
			'numero' => 'Numero',
			'id' => 'ID',
			'hidparte' => 'Hidparte',
			'hidequipo' => 'Hidequipo',
			'hp' => 'Hp',
			'hpp' => 'Hpp',
			'hmi' => 'Hmi',
			'hmf' => 'Hmf',
			'hmt' => 'Hmt',
			'tbd' => 'Tbd',
			'hpi' => 'Hpi',
			'hpf' => 'Hpf',
			'hpt' => 'Hpt',
			'hd' => 'Hd',
			'dispo' => 'Dispo',
			'util' => 'Util',
			'iduser' => 'Iduser',
			'np' => 'Np',
			'ns' => 'Ns',
			'htt' => 'Htt',
			'ntt' => 'Ntt',
			'textocorto' => 'Textocorto',
			'codcen' => 'Codcen',
			'codigoaf' => 'Codigoaf',
			'ap' => 'Ap',
			'nombres' => 'Nombres',
			'nombreobjeto' => 'Nombreobjeto',
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

		$criteria->compare('hidturno',$this->hidturno);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('dispo',$this->dispo,true);
		$criteria->compare('util',$this->util,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('np',$this->np);
		$criteria->compare('ns',$this->ns);
		$criteria->compare('htt',$this->htt,true);
		$criteria->compare('ntt',$this->ntt);
		$criteria->compare('textocorto',$this->textocorto,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('codtipo',$this->codtipo,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);

                 
		if(isset($_SESSION['sesion_Trabajadores'])) {
			$criteria->addInCondition('codresponsable', $_SESSION['sesion_Trabajadores'], 'OR');
		} ELSE {
			$criteria->compare('codresponsable',$this->codresponsable,true);
		}
                if(isset($_SESSION['sesion_Ot'])) {
			$criteria->addInCondition('codproyecto', $_SESSION['sesion_Ot'], 'AND');
		} ELSE {
			$criteria->compare('codproyecto',$this->codproyecto,true);
		}
                if(isset($_SESSION['sesion_Inventario'])) {
			$criteria->addInCondition('codigoaf', $_SESSION['sesion_Inventario'], 'AND');
		} ELSE {
			$criteria->compare('codigoaf',$this->codigoaf,true);
		}
                
                
                
		if((isset($this->fecha) && trim($this->fecha) != "") && (isset($this->fecha1) && trim($this->fecha1) != ""))  {
				$criteria->addBetweenCondition('fecha', ''.$this->fecha.'', ''.$this->fecha1.'');
		}
                
                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwParteopdetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        private function getcampos(){
             $matriz= array('group'=>array('destipo',
                                  'textocorto','nombreobjeto','codcen',
                                  'codigoaf','codproyecto','mes','semana',
                                  'dia','anno','codigoaf','codtipo',
                                  ),
                              'sum'=>array('hp','hpp','hmt','hpt','hd','np','ns','ntt'),
                              'min'=>array('hmi','hpi'),
                               'max'=>array('hmi','hpi'),
                                  'avg'=>array('util','dispo'), 
                                  );
           if(in_array($this->_campopivote,$matriz['group'])){
                 //foreach($this->_campospivote[$this->_campopivote] as $clave1=>$valor1){
                    //UNSET($matriz['group'][$this->_campopivote]);
                    //var_dump($this->_campospivote[$this->_campopivote]);
                     //var_dump($valor1);die();
                     $matriz['group']=array_diff($matriz['group'],$this->_campospivote[$this->_campopivote]);
                 //}
                 //foreach($this->_camposprofundidad[$this->_level] as $clave2=>$valor2){
                     $matriz['group']=array_diff($matriz['group'],$this->_camposprofundidad[$this->_level]);
                 //}
                 
                
               
                          
                    
                return $matriz;
           }else{
              throw new CHttpException(500,yii::t('app','El nombre del campo  "{nombrecampo}" nos e encuentra en la lista de campos pivotes ',array('{valor}'=>$id)));
                 
           }
                            
                     
                              
        }
        
        private function getgroup(){
            $delimitador=$this::DELIMITADOR;
           $campos= $this->getcampos();
            $select="";
           foreach($campos['group'] as $campo){
               $select.=$campo.$delimitador;
           }
           return substr($select, 0,strlen($select)-1);          
          
        }
        
         private function getsum(){
            $delimitador=$this::DELIMITADOR;
           $campos= $this->getcampos();
           $select="";
           foreach($campos['sum'] as $campo){
               $select.='sum('.$campo.') as sum_'.$campo.' '.$delimitador;
           }
           return substr($select, 0,strlen($select)-1);          
          
        }
        private function getmin(){
            $delimitador=$this::DELIMITADOR;
            $select="";
           $campos= $this->getcampos();
           foreach($campos['min'] as $campo){
               $select.='min('.$campo.') as min_'.$campo.' '.$delimitador;
           }
           return substr($select, 0,strlen($select)-1);          
          
        }
        private function getmax(){
            $delimitador=$this::DELIMITADOR;
            $select="";
           $campos= $this->getcampos();
           foreach($campos['max'] as $campo){
               $select.='max('.$campo.') as max_'.$campo.' '.$delimitador;
           }
           return substr($select, 0,strlen($select)-1);          
          
        }
        private function getavg(){
            $delimitador=$this::DELIMITADOR;
            $select="";
           $campos= $this->getcampos();
           foreach($campos['avg'] as $campo){
               $select.='avg('.$campo.') as avg_'.$campo.' '.$delimitador;
           }
           return substr($select, 0,strlen($select)-1);          
          
        }
        
        private function getwhere($parametros){
            $cadenawhere=" where ";
            foreach ($this->_camposprofundidad as $clave=>$valor){
                  //echo $this->tr($clave);print_r($parametros);
                         if( isset($parametros[$this->tr($clave)])){
                             
                             $cadenawhere.=$clave."=".$parametros[$this->tr($clave)]."  and ";
                           
                         }
                        
                      } 
            
           //verificando el array de fechas 
          
                     // array_diff(array_keys($array1), array_values)
             return substr($cadenawhere,0,strlen($cadenawhere)-5)." ";
             
        }
        private function getwhereFechas($fecha1,$fecha2){
            $cadenawhere="";
            if(yii::app()->periodo->validaformatos($fecha1) and
                yii::app()->periodo->validaformatos($fecha1) )    
            $cadenawhere=" where fecha >= '".$fecha1."'  and  fecha <= '".$fecha2."'";
           
             return $cadenawhere;
             
        }
        
         public function buildSqlFechas($fecha1,$fecha2){
            
            if(is_null($this->_campopivote))
                $this->_campopivote='codigoaf';
             if(is_null($this->_level))
                $this->_level='dia';
            $sql="select ".$this->getgroup().$this::DELIMITADOR.
                    $this->getsum().$this::DELIMITADOR.
                    $this->getmax().$this::DELIMITADOR.
                     $this->getmin().$this::DELIMITADOR.
                     $this->getavg()."from ".$this->tableName();
                    
              $sql.=$this->getwhereFechas($fecha1,$fecha2);      
               $sql.=" group by   ".$this->getgroup();//los mismocs campos que el select 
           
            //echo $sql;die();
            return $sql;
        }
        
        
        public function buildSql($parametros){
            
            if(is_null($this->_campopivote))
                $this->_campopivote='codigoaf';
             if(is_null($this->_level))
                $this->_level='dia';
            $sql="select ".$this->getgroup().$this::DELIMITADOR.
                    $this->getsum().$this::DELIMITADOR.
                    $this->getmax().$this::DELIMITADOR.
                     $this->getmin().$this::DELIMITADOR.
                     $this->getavg()."from ".$this->tableName();
                    
              $sql.=$this->getwhere($parametros);      
               $sql.=" group by   ".$this->getgroup();//los mismocs campos que el select 
           
            //echo "<br><br><br>".$this->getwhere($parametros)."<br><br><br>";//die();
            return $sql;
        }
        
        public function proveedor($parametros){
            if(!is_null($parametros)){
                 $cadenaSql=$this->buildSql($parametros);
            }else{
                 $cadenaSql=$this->buildSqlFechas($this->fecha,$this->fecha1);
            }
           
            
          return  new CSqlDataProvider($cadenaSql, array(
              'keyField' =>$this->_campopivote,
   //'totalItemCount'=>100,    
    'pagination'=>array(
        'pageSize'=>1000,
                ),
                            ));
          
            
        }
        
     public function getEquipos($proveedor){
         $grupos=array();
        // $equipos=array();
         if(is_object($proveedor)){
             $registros=$proveedor->getdata();
            //var_dump($registros);die();
             if(count($registros>0)){
                 
                 
                 foreach($registros as $registro){
                     
                    $grupos[$registro['destipo']]['codigoaf'][]= is_null($registro['codigoaf'])?0:$registro['codigoaf'];
                    $grupos[$registro['destipo']]['avg_util'][]= is_null($registro['avg_util'])?0:($registro['avg_util'])*100+0;
                    $grupos[$registro['destipo']]['avg_dispo'][]= is_null($registro['avg_dispo'])?0:($registro['avg_dispo'])*100+0;
                 }
                // var_dump($grupos);die();
                 return $grupos;
             }else{
                 return array();
             }
         }else{
             return array();
         }
     }   
        
        
  PUBLIC FUNCTION tr($valor){
      
     $cal= array(
          'anno'=>'year',
          'mes'=>'month',
          'semana'=>'week',
          'dia'=>'day',
      );
     if(isset($cal[$valor])){
         return $cal[$valor];
     }else{
        return "";
     }
  }  
  
  public function checkfechas($attribute,$params) {
      $fecha=$this->cambiaformatofecha($this->fecha,false);
      $fecha1=$this->cambiaformatofecha($this->fecha1,false);
      if(strtotime($fecha) > strtotime($fecha1)){
          $this->adderror('fecha1','Fechas incosistentes');
      }
			
	}
  
 public function periodomenor(){
     if($this->_level=='anno')
         return 'mes';
      elseif($this->_level=='mes')
         return 'semana';
      elseif($this->_level=='semana')
         return 'dia';
     elseif($this->_level=='dia')
         return 'dia';
     else 
       return 'dia';  
       } 
       
       
}

