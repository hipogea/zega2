<?php

/**
 * This is the model class for table "{{libroobra}}".
 *
 * The followings are the available columns in table '{{libroobra}}':
 * @property string $id
 * @property string $hidot
 * @property string $fecha
 * @property string $texto
 * @property string $hinicio
 * @property string $hfinal
 * @property integer $temperatura
 * @property integer $hr
 * @property string $lluvias
 * @property string $viento
 * @property integer $hiddireccion
 */
class Libroobra extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{libroobra}}';
	}

        
        public function init(){
            $this->campoestado='codestado';
        }
        
        public $campossensibles=array('hidot','hiddireccion');
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('temperatura, hr, hiddireccion', 'numerical', 'integerOnly'=>true),
                    array('hidot+fecha+hidetot', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update','message'=>'Ya existe un parte para esta fecha y para esta Ot'),
                    array('hidot,hidetot, codtra,hiddireccion', 'required', 'on'=>'insert,update'),
			array('id, hidot', 'length', 'max'=>20),
                    array('esnolaborable,hidetot','safe'),
                    array('hinicio, hfinal', 'chkhoras', 'on'=>'insert,update'),
			array('fecha, texto, hinicio, hfinal', 'length', 'max'=>10),
			array('lluvias, viento', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidot, fecha, texto,hidetot, hinicio,h hfinal, temperatura, hr, lluvias, viento, hiddireccion', 'safe', 'on'=>'search'),
		);
	}

	/**idetot,
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                     'orden' => array(self::BELONGS_TO, 'Ot',  'hidot'),
                    'detot' => array(self::BELONGS_TO, 'Detot',  'hidetot'),
                    'ot' => array(self::BELONGS_TO, 'VwOtsimple',  'hidot'),
                     'direcciones' => array(self::BELONGS_TO, 'Direcciones',  'hiddireccion'),
                    'codtra' => array(self::BELONGS_TO, 'Trabajadores',  'codtra'),
                    'asisobra'=>array(self::HAS_MANY, 'Asisobra',  'hidlibro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidot' => 'Hidot',
			'fecha' => 'Fecha',
			'texto' => 'Texto',
			'hinicio' => 'Hinicio',
			'hfinal' => 'Hfinal',
			'temperatura' => 'Temperatura',
			'hr' => 'Hr',
			'lluvias' => 'Lluvias',
			'viento' => 'Viento',
			'hiddireccion' => 'Hiddireccion',
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
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('hinicio',$this->hinicio,true);
		$criteria->compare('hfinal',$this->hfinal,true);
		$criteria->compare('temperatura',$this->temperatura);
		$criteria->compare('hr',$this->hr);
		$criteria->compare('lluvias',$this->lluvias,true);
		$criteria->compare('viento',$this->viento,true);
		$criteria->compare('hiddireccion',$this->hiddireccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Libroobra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function chkhoras($attribute,$params) {

if( (integer)($this->hinicio) >=(integer)($this->hfinal) )			
	 $this->adderror('hinicio','La hora final es menor que la hora de inicio' ); return;

							}
        
}
