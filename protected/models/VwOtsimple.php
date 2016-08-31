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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, codigo, rucpro, numero, item, textoactividad, idobjeto', 'required'),
			array('id, idobjeto', 'numerical', 'integerOnly'=>true),
			array('serie, descripcion, nombreobjeto, textoactividad', 'length', 'max'=>40),
			array('codigo, numero', 'length', 'max'=>12),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			array('idot, iddetot', 'length', 'max'=>20),
			array('item', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serie, descripcion, codigo, nombreobjeto, despro, rucpro, idot, numero, iddetot, item, textoactividad, idobjeto', 'safe', 'on'=>'search'),
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

	public function findByPk($id) {
		$criterio=New CDBCriteria();
		$criterio->addCondtion("iddeot=:vid");
		$criterio->params=array(":vid"=>(integer)MiFactoria::cleanInput($id));
		return self::model()->find($criterio);
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
			'idot' => 'Idot',
			'numero' => 'Numero',
			'iddetot' => 'Iddetot',
			'item' => 'Item',
			'textoactividad' => 'Textoactividad',
			'idobjeto' => 'Idobjeto',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('idot',$this->idot,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('iddetot',$this->iddetot,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('textoactividad',$this->textoactividad,true);
		$criteria->compare('idobjeto',$this->idobjeto);

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
}
