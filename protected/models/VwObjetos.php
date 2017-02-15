<?php

/**
 * This is the model class for table "vw_objetos".
 *
 * The followings are the available columns in table 'vw_objetos':
 * @property integer $id
 * @property string $serie
 * @property string $descripcion
 * @property string $codigo
 * @property string $nombreobjeto
 * @property string $despro
 * @property string $rucpro
 */
class VwObjetos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_objetos';
	}


	public $descripcioncompleta;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, codigo, rucpro', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('serie, descripcion, nombreobjeto', 'length', 'max'=>40),
			array('codigo', 'length', 'max'=>12),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,codpro, serie, descripcion, codigo, nombreobjeto, despro, rucpro', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'serie' => 'Serie',
			'descripcion' => 'Descripcion',
			'codigo' => 'Codigo',
			'nombreobjeto' => 'Nombreobjeto',
			'despro' => 'Despro',
			'rucpro' => 'Rucpro',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('serie',$this->serie,true);
                //$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		//$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
              if(isset($_SESSION['sesion_Clipro'])) {
			$criteria->addInCondition('codpro', $_SESSION['sesion_Clipro'], 'AND');
		} ELSE {
			$criteria->compare('codpro',$this->codpro,true);
		}  
                if(isset($_SESSION['sesion_ObjetosCliente'])) {
			$criteria->addInCondition('codobjeto', $_SESSION['sesion_ObjetosCliente'], 'AND');
		} ELSE {
			$criteria->compare('codobjeto',$this->codobjeto,true);
		}  
                if(isset($_SESSION['sesion_Masterequipo'])) {
			$criteria->addInCondition('codigo', $_SESSION['sesion_Masterequipo'], 'AND');
		} ELSE {
			$criteria->compare('codigo',$this->codigo,true);
		}  
           
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function findByPk($id){
		$id=(integer)MiFactoria::cleanInput($id);
		return self::model()->find("id=:vid",array(":vid"=>$id));
	}
public static function descripcion($id){
	$registro=self::model()->find("id=:vid",array(":vid"=>(integer)MiFactoria::cleanInput($id)));
	if($registro==null){
		return "Valor no encontrado";
	}else{
		return $registro->descripcion;
	}
}

	public function afterfind() {
		$this->descripcion="[".$this->nombreobjeto."] : ".$this->descripcion." ".$this->marca." ".$this->modelo."/".$this->identificador."/".$this->serie;
		Return parent::afterfind();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwObjetos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
