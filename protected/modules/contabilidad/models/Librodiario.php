<?php

class Librodiario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{librodiario}}';
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
			array('fecha', 'length', 'max'=>10),
			array('glosa', 'length', 'max'=>100),
			array('debe, haber', 'length', 'max'=>14),
			array('status, tipo', 'length', 'max'=>1),
			array('fechaop,codocu,fechacont,idref', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periodo, codplan, codcuenta, fecha, glosa, debe, haber, status, iduser, fechaop, docref, mes, anno, tipo, subtipo', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'periodo' => 'Periodo',
			'codplan' => 'Codplan',
			'codcuenta' => 'Codcuenta',
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
		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('codplan',$this->codplan,true);
		$criteria->compare('codcuenta',$this->codcuenta,true);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Librodiario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		$this->fecha=date('d/m/Y',strtotime($this->fechacont));
		$this->anno=date('y',strtotime($this->fechacont));
		$this->mes=date('m',strtotime($this->fechacont));
		$this->periodo=date('Y',strtotime($this->fechacont)).date('m',strtotime($this->fechacont)).'00';
		$this->fechaop=date("Y-m-d H:i:s");
		return parent::beforeSave();
	}
        
         /*
         * Carga el registro temporal de cuentas
         */
        public function cargatemporal(){
             $temporal=New Templibrodiario('upd_compralocal');
            foreach($this->attributes as $nombrecampo=>$valorcampo){
                //if($temporal->isAttributeSafe($nombrecampo)){
               
                    $temporal->{$nombrecampo}=$valorcampo;
                   
               // }
            } 
          // echo  $temporal->save(); echo "<br>";
        }
}
