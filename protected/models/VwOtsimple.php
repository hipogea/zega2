<?php

class VwOtsimple extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_otsimple';
	}

         public $fechainiprog1;
         public $fechafinprog1;
         public $fechainicio1;
          public $fechafin1;
          public $fechacre1;
         
                //$criteria->compare('fechafinprog',$this->fechafinprog,true);		
		//$criteria->compare('fechainicio',$this->fechainicio,true);
		//$criteria->compare('fechafin',$this->fechafin,true);
                //$criteria->compare('fechacre',$this->fechacre,true);
        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//('rucpro, descripcion, marca, modelo, codobjeto, numero, fechacre, fechafinprog, codpro, idobjeto, codresponsable, textocorto, textolargo, grupoplan, codcen, iduser, codocu, codestado, clase, hidoferta', 'required'),
			array('idobjeto, iduser', 'numerical', 'integerOnly'=>true),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			//array('identificador, marca', 'length', 'max'=>24),
			//array('serie', 'length', 'max'=>50),
			//array('descripcion, nombreobjeto, textocorto', 'length', 'max'=>40),
			array('modelo', 'length', 'max'=>25),
			array('codobjeto, grupoplan, codocu', 'length', 'max'=>3),
			array('id, hidoferta', 'length', 'max'=>20),
			array('numero', 'length', 'max'=>12),
			array('codpro', 'length', 'max'=>8),
			array('codresponsable', 'length', 'max'=>6),
			array('codcen', 'length', 'max'=>4),
			array('codestado', 'length', 'max'=>2),
			array('clase', 'length', 'max'=>1),
			array('fechainiprog, fechainicio, fechafin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('despro,codigoequipo, rucpro, nombreobjeto, codobjeto, id, numero, fechacre, fechafinprog, codpro, idobjeto, codresponsable, textocorto, textolargo, grupoplan, codcen, iduser, codocu, codestado, clase, hidoferta, fechainiprog, fechainicio,fechainicio1, fechafin', 'safe', 'on'=>'search'),
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
			'despro' => 'Despro',
			'rucpro' => 'Rucpro',
			'identificador' => 'Identificador',
			'serie' => 'Serie',
			///'descripcion' => 'Descripcion',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'nombreobjeto' => 'Nombreobjeto',
			'codobjeto' => 'Codobjeto',
			'id' => 'ID',
			'numero' => 'Numero',
			'fechacre' => 'Fec Cre',
			'fechafinprog' => 'Fec Finpr',
			'codpro' => 'Codpro',
			'idobjeto' => 'Idobjeto',
			'codresponsable' => yii::t('app','codresponsable'),
			'textocorto' => 'Textocorto',
			'textolargo' => 'Textolargo',
			'grupoplan' => 'Grupoplan',
			'codcen' => 'Codcen',
			'iduser' => 'Iduser',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'clase' => 'Clase',
			'hidoferta' => 'Hidoferta',
			'fechainiprog' => 'Fec Inipr',
			'fechainicio' => 'Fec Inic',
			'fechafin' => 'Fec Fin',
                    'fechainiprog1'=>'',
         'fechafinprog1'=>'',
         'fechainicio1'=>'',
          'fechafin1'=>'',
          'fechacre1'=>'',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		//$criteria->compare('despro',$this->despro,true);
		//$criteria->compare('rucpro',$this->rucpro,true);
		//$criteria->compare('identificador',$this->identificador,true);
		//$criteria->compare('serie',$this->serie,true);
		//$criteria->compare('descripcion',$this->descripcion,true);
		//$criteria->compare('marca',$this->marca,true);
		//$criteria->compare('modelo',$this->modelo,true);
		//$criteria->compare('nombreobjeto',$this->nombreobjeto,true);
		//$criteria->compare('codobjeto',$this->codobjeto,true);
		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('numero',$this->numero,true);		
		//->compare('codpro',$this->codpro,true);
		//$criteria->compare('idobjeto',$this->idobjeto);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('textocorto',$this->textocorto,true);
                $criteria->compare('serie',$this->serie,true);
		$criteria->compare('identificador',$this->identificador,true);
                $criteria->compare('identificador',$this->codsap,true);
		//$criteria->compare('grupoplan',$this->grupoplan,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('iduser',$this->iduser);
		//$criteria->compare('codocu',$this->codocu,true);
		//$criteria->compare('codestado',$this->codestado,true);
		//$criteria->compare('clase',$this->clase,true);
		//$criteria->compare('hidoferta',$this->hidoferta,true);                
             
                
               // $criteria->compare('fechainiprog',$this->fechainiprog,true);
                //$criteria->compare('fechafinprog',$this->fechafinprog,true);		
		//$criteria->compare('fechainicio',$this->fechainicio,true);
		//$criteria->compare('fechafin',$this->fechafin,true);
                //$criteria->compare('fechacre',$this->fechacre,true);
                
		if(isset($_SESSION['sesion_Clipro'])) {
			$criteria->addInCondition('codpro', $_SESSION['sesion_Clipro'], 'OR');
		} ELSE {
			$criteria->compare('codpro',$this->codpro,true);
		}
                if(isset($_SESSION['sesion_Masterequipo'])) {
			$criteria->addInCondition('codigoequipo', $_SESSION['sesion_Masterequipo'], 'OR');
		} ELSE {
			$criteria->compare('codigoequipo',$this->codigoequipo,true);
		}
                if(isset($_SESSION['sesion_Ot'])) {
			$criteria->addInCondition('numero', $_SESSION['sesion_Ot'], 'OR');
		} ELSE {
			$criteria->compare('numero',$this->numero,true);
		}
                
                
                
		if((isset($this->fechainiprog) && trim($this->fechainiprog) != "") && (isset($this->fechainiprog1) && trim($this->fechainiprog1) != ""))  {
				$criteria->addBetweenCondition('fechainiprog', ''.$this->fechainiprog.'', ''.$this->fechainiprog1.'');
		}
               
                
                if((isset($this->fechafinprog) && trim($this->fechafinprog) != "") && (isset($this->fechafinprog1) && trim($this->fechafinprog1) != ""))  {
				$criteria->addBetweenCondition('fechafinprog', ''.$this->fechafinprog.'', ''.$this->fechafinprog1.'');
		}
                
                if((isset($this->fechainicio) && trim($this->fechainicio) != "") && (isset($this->fechainicio1) && trim($this->fechainicio1) != ""))  {
				$criteria->addBetweenCondition('fechainicio', ''.$this->fechainicio.'', ''.$this->fechainicio1.'');
		}
		if((isset($this->fechafin) && trim($this->fechafin) != "") && (isset($this->fechafin1) && trim($this->fechafin1) != ""))  {
				$criteria->addBetweenCondition('fechafin', ''.$this->fechafin.'', ''.$this->fechafin1.'');
		}
                if((isset($this->fechacre) && trim($this->fechacre) != "") && (isset($this->fechacre1) && trim($this->fechacre1) != ""))  {
				$criteria->addBetweenCondition('fechacre', ''.$this->fechacre.'', ''.$this->fechacre1.'');
		}
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwOtsimple the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
      
        public  function findByPk($id){
            return self::model()->find("id=:xid",array(":xid"=>$id));
        }  
      
}
