<?php

/**
 * This is the model class for table "{{detingfactura}}".
 *
 * The followings are the available columns in table '{{detingfactura}}':
 * @property string $hidfactura
 * @property string $item
 * @property string $hidkardex
 * @property string $id
 *
 * The followings are the available model relations:
 * @property Alkardex $hidkardex0
 * @property Ingfactura $hidfactura0
 */
class Detingfactura extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{detingfactura}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('hidfactura, item, hidkardex', 'required'),
			//array('hidfactura, hidkardex', 'length', 'max'=>20),
			array('item', 'length', 'max'=>3),
			array('hidfactura,cant, hidalentrega,codestado,codocu, iduser,idstatus, idtemp, idusertemp, id', 'safe'),
			array('codestado', 'safe', 'on'=>'estado'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hidfactura, item, codestado,hidalentrega, id', 'safe'),
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
			'entregas' => array(self::BELONGS_TO, 'Alentregas', 'hidentrega'),
			'recepcion' => array(self::BELONGS_TO, 'Ingfactura', 'hidfactura'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hidfactura' => 'Hidfactura',
			'item' => 'Item',
			'hidkardex' => 'Hidkardex',
			'id' => 'ID',
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

		$criteria->compare('hidfactura',$this->hidfactura,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('hidkardex',$this->hidkardex,true);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detingfactura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		/*if(Yii::app()->hasModule('contabilidad'))

		{
			if($this->isNewRecord){
				yii::app()->librodiario->asiento
				(	$this->id,
					$this->codocu,
					'541', //operacion contable
					$this->entregas->alentregas_docompra->maestrodetalle->catval,
					$this->recepcion->fecha,
					$this->recepcion->numocompra,
					Opcontables::model()->findByPk('541')->desop,
					round($this->entregas->alentregas_docompra->punit*$this->cant,4)
				);
			}else{
				if(($this->oldVal('codestado' <> $this->codestado)) and ($this->codestado='20')  ){
					yii::app()->librodiario->asiento
					(	$this->id,
						$this->codocu,
						'541', //operacion contable
						$this->entregas->alentregas_docompra->maestrodetalle->catval,
						$this->recepcion->fecha,
						$this->recepcion->numocompra,
						Opcontables::model()->findByPk('541')->desop,
						round($this->entregas->alentregas_docompra->punit*$this->cant,4)
					);
				}
			}

		}
*/
		//}
		return parent::beforeSave();
	}
}
