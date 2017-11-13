<?php

/**
 * This is the model class for table "{{config}}".
 *
 * The followings are the available columns in table '{{config}}':
 * @property string $codcen
 * @property string $codocu
 * @property string $codparam
 * @property string $desparam
 * @property string $valor
 * @property string $tipodato
 * @property string $explicacion
 * @property string $lista
 * @property integer $iduser
 * @property integer $longitud
 */
class Configuracion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{config}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
             array('valor', 'safe'),
           
            array('codparam,codocu,codcen, valor', 'required', 'on' => 'insert,parametro'),
            array('codparam,  valor, explicacion', 'safe', 'on' => 'insert,parametro'),
             array('codparam', 'exist','allowEmpty' => false, 'attributeName' => 'codparam', 'className' => 'Parametros','message'=>'El valor del parametro no existe'),
            //array('n_direc,n_dirsoc','exist','allowEmpty' => false, 'attributeName' => 'n_direc', 'className' => 'Direcciones','message'=>'Esta dirección no existe'),
			
            //  array('codcen, codocu, codparam, desparam, valor, tipodato, explicacion, lista, iduser, longitud', 'required'),
            array('iduser', 'numerical', 'integerOnly' => true),
            //array('codocu','exist','allowEmpty' => false, 'attributeName' => 'coddocu', 'className' => 'Documentos','message'=>'Esta empresa no existe'),
				
            //array('iduser, longitud', 'numerical', 'integerOnly'=>true),
            //array('codparam', 'match', 'pattern' => '/[1-9]{1}[0-9]{1}[0-9]{1}/'),
            array('codparam+codcen+codocu+iduser', 'application.extensions.uniqueMultiColumnValidator', 'on' => 'insert,update'),
            //array('codigoaf', 'match', 'pattern'=>'/90-3[0-5]{1}00-[0-9]{5}/','message'=>'El codigo de placa no es el correcto','on'=>'BATCH_INS_BASICO,BATCH_INS_TOTAL,BATCH_UPD_TOTAL'),			
            array('codcen, codparam', 'length', 'max' => 4),
            array('codocu', 'length', 'max' => 3),
            //array('desparam', 'length', 'max' => 100),
           // array('tipodato', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codcen, codocu, codparam,  valor,  explicacion,  iduser', 'safe', 'on' => 'search,search_por_centro'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parametros' => array(self::BELONGS_TO, 'Parametros', 'codparam'),
		 'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
            'tenencias' => array(self::BELONGS_TO, 'Tenencias', 'codte'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codcen' => 'Codcen',
            'codocu' => 'Codocu',
            'codparam' => 'Codparam',
            //'desparam' => 'Desparam',
            'valor' => 'Valor',
            //'tipodato' => 'Tipodato',
            'explicacion' => 'Explicacion',
           // 'lista' => 'Lista',
            'iduser' => 'Iduser',
            'longitud' => 'Longitud',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('codcen', $this->codcen, true);
        $criteria->compare('codocu', $this->codocu, true);
        $criteria->compare('codparam', $this->codparam, true);
       // $criteria->compare('desparam', $this->desparam, true);
        $criteria->compare('valor', $this->valor, true);
       // $criteria->compare('tipodato', $this->tipodato, true);
        $criteria->compare('explicacion', $this->explicacion, true);
       // $criteria->compare('lista', $this->lista, true);
        $criteria->compare('iduser', $this->iduser);
        //$criteria->compare('longitud', $this->longitud);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function search_por_centro($codcen) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        //$criteria->compare('codcen', $this->codcen, true);
        $criteria->compare('codocu', $this->codocu, true);
        $criteria->compare('codparam', $this->codparam, true);
       // $criteria->compare('desparam', $this->desparam, true);
        $criteria->compare('valor', $this->valor, true);
       // $criteria->compare('tipodato', $this->tipodato, true);
        $criteria->compare('explicacion', $this->explicacion, true);
       // $criteria->compare('lista', $this->lista, true);
        $criteria->compare('iduser', $this->iduser);
        //$criteria->compare('longitud', $this->longitud);
        $criteria->addCondition("codcen='".$codcen."' and iduser < 0 ");
     // $criteria->params=array(":vcodcen"=>$codcen);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
     public function search_por_usuario($iduser) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('codcen', $this->codcen, true);
        $criteria->compare('codocu', $this->codocu, true);
        $criteria->compare('codparam', $this->codparam, true);
       // $criteria->compare('desparam', $this->desparam, true);
        $criteria->compare('valor', $this->valor, true);
       // $criteria->compare('tipodato', $this->tipodato, true);
        $criteria->compare('explicacion', $this->explicacion, true);
       // $criteria->compare('lista', $this->lista, true);
       // $criteria->compare('iduser', $this->iduser);
        //$criteria->compare('longitud', $this->longitud);
     $criteria->addCondition('iduser='.$iduser);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Config the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave(){
        
        
        
        return parent::beforeSave();
    }

    public function afterSave(){
        
        
            
      if($this->isNewRecord){
          
                if($this->iduser >0){
                            $this->refrescausuarios();                 
                            }else{
                            $this->iduser=-1; 
               
                    }
         }else{
                        
              }
        
        
        return parent::afterSave();
    }
    
    
    
    public function afterfind(){
       // $this->valor=@unserialize($this->valor);
        return parent::afterfind();
    }
    public function refrescausuarios($parametro=null){
        $comboList = array();
                foreach(Yii::app()->user->um->listUsers() as $user){        
                $comboList[$user->primaryKey] = $user->username;
                    }
                  //  unset($user);
                ////crear el parametro para todos los usuarios
                    if(is_null($parametro)){
                        $parametro=$this->codparam;
                    }
                    
                foreach( $comboList as $iduser=>$username)
                {
                   $criterio=New CDBCriteria();
                   $criterio->addCondition("codparam=:vcodparam and codcen='0000' and codocu=:vcodocu and iduser=:viduser");
                    $criterio->params=array(":vcodparam"=>$parametro,   ":vcodocu"=>$this->codocu,":viduser"=>$iduser);
                    if(  (count(self::model()->findAll($criterio)) ==0  )){
                       $nuevomodel=New Configuracion();
                       $nuevomodel->setAttributes(array(
                           'codocu'=>$this->codocu,  
                           'codcen'=>'0000',
                           'codparam'=>$parametro,
                            'iduser'=>$iduser,
                           'valor'=>null,
                           
                       ));
                       $nuevomodel->save();
                    }
                        
                }
    }
    
    public static function valor($codocu,$codcen='0000',$codparam,$iduser=null)
            {
            $cri=NEW CDBCriteria();
            $cri->addCondition("codocu=:vcodocu and "
                .           "codcen=:vcodcen and "
                .             "iduser=:viduser and "
                .           "codparam=:vcodparam ");
            $cri->params=array(
             ":vcodocu"=>$codocu,
               ":vcodcen"=>$codcen,
              ":viduser"=>(is_null($iduser))?-1:$iduser.'',
               ":vcodparam"=>$codparam,
                 );
            
      $resultado= self::model()->find($cri);
      //return $resultado->attributes;
        if(is_null($resultado)){
            return null;
        }else{
            if (is_null($resultado->valor) )return null;
           if(trim($resultado->valor)=='') return null;
            return trim($resultado->valor);
        }
      
            }
            
        public function checkparametro($attribute,$params) {
            //Verificando que el cod del parametro es valido
          
            $registro=Parametros::Model()->findByPk($this->codparam);
            if(!$registro->valido=='1')
            $this->adderror('codparam','El parametro {codparam} no esta activo  ');
				    
									
				
									
									
	}     
}
