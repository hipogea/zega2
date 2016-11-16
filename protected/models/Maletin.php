<?php

/**
 * This is the model class for table "{{maletin}}".
 *
 * The followings are the available columns in table '{{maletin}}':
 * @property string $idregistro
 * @property integer $clase
 * @property integer $iduser
 * @property integer $idsession
 * @property string $codocu
 * @property string $id
 */
class Maletin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{maletin}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('', 'required'),
			array('idsession', 'numerical', 'integerOnly'=>true),
			array('idregistro', 'length', 'max'=>20),
			array('codocu', 'length', 'max'=>3),
			array('clase','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idregistro, clase, iduser, idsession, codocu, id', 'safe', 'on'=>'search'),
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
                   'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
         
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idregistro' => 'Idregistro',
			'clase' => 'Clase',
			'iduser' => 'Iduser',
			'idsession' => 'Idsession',
			'codocu' => 'Codocu',
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
	public function search_por_usuario()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idregistro',$this->idregistro,true);
		$criteria->compare('clase',$this->clase);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idsession',$this->idsession);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('id',$this->id,true);
                $criteria->addCondition("iduser=".yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Maletin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function beforeSave() {
		if ($this->isNewRecord) {
			$elusuario=Yii::app()->user->um->LoadUserById(yii::app()->user->id);
			$sesion_activa=Yii::app()->user->um->findSession($elusuario);
			$this->idsession=$sesion_activa->idsession;
			$this->iduser=Yii::app()->user->id;
		}

		return parent::beforeSave();
	}
}
