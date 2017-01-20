<?php

class Cargamasivadet extends CActiveRecord
{

	public function tableName()
	{
		return '{{cargamasivadet}}';
	}

	public function rules()
	{
			return array(
			array('hidcarga', 'numerical', 'integerOnly'=>true),
			array('hidcarga', 'required', 'on'=>'insert'),
			array('nombrecampo, aliascampo', 'length', 'max'=>100),
			array('activa, requerida', 'length', 'max'=>1),
			array('orden,aliascampo,clave,longitud,explicacion', 'safe', 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidcarga,longitud, tipo, orden,nombrecampo, aliascampo, activa, requerida', 'safe', 'on'=>'search'),
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
			'hidcarga' => 'Hidcarga',
			'nombrecampo' => 'Nombrecampo',
			'aliascampo' => 'Aliascampo',
			'activa' => 'Activa',
			'requerida' => 'Requerida',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('hidcarga',$this->hidcarga);
		$criteria->compare('nombrecampo',$this->nombrecampo,true);
		$criteria->compare('aliascampo',$this->aliascampo,true);
		$criteria->compare('activa',$this->activa,true);
		$criteria->compare('requerida',$this->requerida,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function search_por_carga($id){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->addcondition("hidcarga=:vid");
		$criteria->params=array(":vid"=>$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination' => array(
                'pageSize' => 60,
            ),
		));
		
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
