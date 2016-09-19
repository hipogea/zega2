<?php

/**
 * This is the model class for table "vw_hojaruta".
 *
 * The followings are the available columns in table 'vw_hojaruta':
 * @property string $nombrelista
 * @property string $comentario
 * @property string $id
 * @property string $idmasterlistamateriales
 * @property string $descripcion
 * @property string $hidlista
 * @property string $iddetallelista
 * @property string $codigo
 * @property string $um
 * @property double $cant
 * @property string $desum
 * @property string $codtipo
 * @property string $destipo
 */
class VwHojaruta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_hojaruta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('nombrelista, comentario, codigo, um, cant, codtipo', 'required'),
			array('cant', 'numerical'),
			array('nombrelista, descripcion', 'length', 'max'=>60),
			array('id, idmasterlistamateriales, hidlista, iddetallelista, desum', 'length', 'max'=>20),
			array('codigo', 'length', 'max'=>10),
			array('um, codtipo', 'length', 'max'=>3),
			array('destipo', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombrelista, comentario, id, idmasterlistamateriales, descripcion, hidlista, iddetallelista, codigo, um, cant, desum, codtipo, codart,destipo', 'safe', 'on'=>'search_por_ot'),
		
                    array('nombrelista, comentario, id, idmasterlistamateriales, descripcion, hidlista, iddetallelista, codigo, um, cant, desum, codtipo,codart, destipo', 'safe', 'on'=>'search'),
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
			'nombrelista' => 'Nombrelista',
			'comentario' => 'Comentario',
			'id' => 'ID',
			'idmasterlistamateriales' => 'Idmasterlistamateriales',
			'descripcion' => 'Descripcion',
			'hidlista' => 'Hidlista',
			'iddetallelista' => 'Iddetallelista',
			'codigo' => 'Codigo',
			'um' => 'Um',
			'cant' => 'Cant',
			'desum' => 'Desum',
			'codtipo' => 'Codtipo',
			'destipo' => 'Destipo',
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

		$criteria->compare('nombrelista',$this->nombrelista,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('idmasterlistamateriales',$this->idmasterlistamateriales,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('hidlista',$this->hidlista,true);
		$criteria->compare('iddetallelista',$this->iddetallelista,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('codtipo',$this->codtipo,true);
		$criteria->compare('destipo',$this->destipo,true);
                $criteria->compare('codart',$this->codart);
                 $criteria->compare('cant',$this->cant);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_codigo($codigo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                $codigo=  MiFactoria::cleanInput($codigo);
		$criteria=new CDbCriteria;

		$criteria->compare('nombrelista',$this->nombrelista,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('idmasterlistamateriales',$this->idmasterlistamateriales,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('hidlista',$this->hidlista,true);
		$criteria->compare('iddetallelista',$this->iddetallelista,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('codart',$this->codart);
                $criteria->compare('cant',$this->cant);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('codtipo',$this->codtipo,true);
		$criteria->compare('destipo',$this->destipo,true); 
                $criteria->addCondition("codigo='".$codigo."'");
                //->params=array(":vcodigo);

                
                
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwHojaruta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
