<?php

/**
 * This is the model class for table "{{templibrodiario}}".
 *
 * The followings are the available columns in table '{{templibrodiario}}':
 * @property string $periodo
 * @property string $codplan
 * @property string $codcuenta
 * @property string $fechacont
 * @property string $fecha
 * @property string $glosa
 * @property string $debe
 * @property string $haber
 * @property string $status
 * @property integer $iduser
 * @property string $fechaop
 * @property string $docref
 * @property string $mes
 * @property string $anno
 * @property string $tipo
 * @property string $subtipo
 * @property string $idref
 * @property string $codocu
 * @property string $debedolar
 * @property string $haberdolar
 * @property string $hidasiento
 * @property string $idtemp
 * @property string $id
 * @property string $idkey
 *
 * The followings are the available model relations:
 * @property Cuentas $codcuenta0
 */
class Templibrodiario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{templibrodiario}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('periodo', 'length', 'max'=>8),
			array('codplan, mes, anno, subtipo', 'length', 'max'=>2),
			array('codcuenta, docref', 'length', 'max'=>18),
			array('fechacont, fecha', 'length', 'max'=>10),
			array('glosa', 'length', 'max'=>100),
			array('debe, haber, debedolar, haberdolar', 'length', 'max'=>14),
			array('status, tipo', 'length', 'max'=>1),
			array('idref, hidasiento, id', 'length', 'max'=>20),
			array('codocu', 'length', 'max'=>3),
			//array('idkey', 'length', 'max'=>12),
			array('fechaop', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser,codcuenta,codocu,tipo, hidasiento,idkey', 'safe', 'on'=>'basico'),
		         array('debe, haber,codcuenta', 'safe', 'on'=>'montobasico'),
                    array('periodo, codplan, codcuenta, fechacont, fecha, glosa, debe, haber, status, iduser, fechaop, docref, mes, anno, tipo, subtipo, idref, codocu, debedolar, haberdolar, hidasiento, idtemp, id, idkey', 'safe', 'on'=>'search'),
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
			'cuentas' => array(self::BELONGS_TO, 'Cuentas', 'codcuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'periodo' => 'Periodo',
			'codplan' => 'Codplan',
			'codcuenta' => 'Codcuenta',
			'fechacont' => 'Fechacont',
			'fecha' => 'Fecha',
			'glosa' => 'Glosa',
			'debe' => 'Debe',
			'haber' => 'Haber',
			'status' => 'Status',
			'iduser' => 'Iduser',
			'fechaop' => 'Fechaop',
			'docref' => 'Docref',
			'mes' => 'Mes',
			'anno' => 'Anno',
			'tipo' => 'Tipo',
			'subtipo' => 'Subtipo',
			'idref' => 'Idref',
			'codocu' => 'Codocu',
			'debedolar' => 'Debedolar',
			'haberdolar' => 'Haberdolar',
			'hidasiento' => 'Hidasiento',
			'idtemp' => 'Idtemp',
			'id' => 'ID',
			'idkey' => 'Idkey',
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

		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('codplan',$this->codplan,true);
		$criteria->compare('codcuenta',$this->codcuenta,true);
		$criteria->compare('fechacont',$this->fechacont,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('glosa',$this->glosa,true);
		$criteria->compare('debe',$this->debe,true);
		$criteria->compare('haber',$this->haber,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('fechaop',$this->fechaop,true);
		$criteria->compare('docref',$this->docref,true);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('anno',$this->anno,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('subtipo',$this->subtipo,true);
		$criteria->compare('idref',$this->idref,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('debedolar',$this->debedolar,true);
		$criteria->compare('haberdolar',$this->haberdolar,true);
		$criteria->compare('hidasiento',$this->hidasiento,true);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('idkey',$this->idkey,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Templibrodiario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        
         /*
         * Descarga los dARTOS AL REGFISTRO DEL LIBRO DIARIO
         */
        public function grabadiario(){
            $libro=New Librodiario();
           // print_r($this->attributes);die();
            foreach($this->attributes as $nombrecampo=>$valorcampo){
               // if($libro->isAttributeSafe($nombrecampo)){
               // echo $nombrecampo. " \n";
                    $libro->{$nombrecampo}=$valorcampo;
                  
               // }
                
            }
            //print_r($this->attributes);echo "<br><br>";
           // print_r($libro->attributes);die();
            RETURN $libro->save();
        }
        
       public function search_por_idkey($codocu,$idkey,$nuevo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $campo=(!$nuevo)?"hidasiento":"idkey";
		$criteria->addCondition($campo."=:vidkey");
                $criteria->addCondition("codocu=:vcodocu");
                $criteria->addCondition("iduser=:viduser");
                $criteria->params=array(
                   ":vidkey" =>$idkey,
                    ":vcodocu" =>$codocu,
                      ":viduser" =>yii::app()->user->id,
                );
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 
     
        /***************************************
         * Esta funcion retorna las propiedades AJAX
         * de un text box
         * @valorcampo   DEBES DE PASAR EL NOMBRE DEL TEXTBOX en el formulario
         * @nombrecampo debes de pasar el nombre del campo a actualizar el el modelo templibrodiario
         *******************************************/
        public static function opcionesajax($nombrecampo,$nombrecampoform,$idtemp){
          return 
           
            array(
               'url'=>yii::app()->createUrl('contabilidad/default/ajaxGuardaCampo',array()),
                'type'=>'GET',
                'data'=>array(
                    'valorcampo'=>"js:".$nombrecampoform.".value",
                    'nombrecampo'=>$nombrecampo,
                    'idtemp'=>$idtemp,
                    ),
                //'replace'=>"#etiqueta_".$i,
                        );
            
     }
       
        
}
