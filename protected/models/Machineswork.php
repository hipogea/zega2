<?php

/**
 * This is the model class for table "{{machineswork}}".
 *
 * The followings are the available columns in table '{{machineswork}}':
 * @property string $id
 * @property string $hidinventario
 * @property string $finicio
 * @property string $ftermino
 * @property string $hidot
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property Inventario $hidinventario0
 * @property Ot $hidot0
 */
class Machineswork extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{machineswork}}';
	}
public $numero;
public $camposfechas=array('finicio');
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                      array('numero,hidinventario,finicio','required','on'=>'insert,update'),
			 array('hidinventario,numero,condescanso,comentario,hidot,hidinventario,finicio','safe','on'=>'insert,update'),
			array('numero','checknumero','on'=>'insert,update'),
			
                    array('hidinventario, hidot', 'length', 'max'=>20),
			array('finicio, ftermino', 'length', 'max'=>10),
			array('comentario', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidinventario, finicio, ftermino, hidot, comentario', 'safe', 'on'=>'search'),
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
			'inventario' => array(self::BELONGS_TO, 'Inventario', 'hidinventario'),
			'ot' => array(self::BELONGS_TO, 'Ot', 'hidot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidinventario' => 'Hidinventario',
			'finicio' => 'Finicio',
			'ftermino' => 'Ftermino',
			'hidot' => 'Hidot',
			'comentario' => 'Comentario',
                         'condescanso'=>'Allow rest'
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
		$criteria->compare('hidinventario',$this->hidinventario,true);
		$criteria->compare('finicio',$this->finicio,true);
		$criteria->compare('ftermino',$this->ftermino,true);
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function search_por_activo($idactivo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->addCondition("hidinventario=:vid");
              $criteria->params=array(":vid"=>$idactivo);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Machineswork the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
       public function checknumero($attribute,$params) {
		  $registros= Ot::model()->findAll("numero=:vnumero",
                            array(":vnumero"=>$this->numero));
                   //var_dump($this->cambiaformatofecha($this->fecha,false));die();
                   if(count($registros)<=0){
                       $this->adderror('numero',yii::t('app','No se encontró ningun documento con   {valor1}',array('{valor1}'=>$this->numero)));
                   } 
                   return;
                }
			
public function afterfind(){
    $this->numero=Ot::model()->findByPk($this->hidot)->numero;
    return parent::afterfind();
}
public function beforesave(){
    //if($this->cambiocampo('numero'))
    $this->hidot=Ot::findByNumero($this->numero)->id;
    return parent::beforesave();
}
 public function search_por_proyecto($idproyecto)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->addCondition("hidot=:vid");
$criteria->params=array(":vid"=>$idproyecto);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
