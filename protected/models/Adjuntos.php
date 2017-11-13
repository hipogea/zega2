<?php

/**
 * This is the model class for table "{{adjuntos}}".
 *
 * The followings are the available columns in table '{{adjuntos}}':
 * @property string $id
 * @property string $codocu
 * @property string $hiddocu
 * @property string $enlace
 * @property integer $iduser
 * @property string $borrado
 * @property string $subido
 * @property integer $iduserborra
 * @property string $titulo
 * @property string $texto
 * @property string $extension
 */
class Adjuntos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{adjuntos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser, iduserborra', 'numerical', 'integerOnly'=>true),
			array('codocu', 'length', 'max'=>3),
			array('hiddocu', 'length', 'max'=>20),
			array('borrado, subido', 'length', 'max'=>28),
			array('titulo', 'length', 'max'=>30),
			array('extension', 'length', 'max'=>4),
			array('enlace, iduser,texto,subido', 'safe','on'=>'insert'),
                    array('titulo, texto', 'safe','on'=>'textos'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codocu, hiddocu, enlace, iduser, borrado, subido, iduserborra,extension', 'safe', 'on'=>'insert'),
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
			'codocu' => 'Codocu',
			'hiddocu' => 'Hiddocu',
			'enlace' => 'Enlace',
			'iduser' => 'Iduser',
			'borrado' => 'Borrado',
			'subido' => 'Subido',
			'iduserborra' => 'Iduserborra',
			'titulo' => 'Titulo',
			'texto' => 'Texto',
			'extension' => 'Extension',
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
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('hiddocu',$this->hiddocu,true);
		$criteria->compare('enlace',$this->enlace,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('borrado',$this->borrado,true);
		$criteria->compare('subido',$this->subido,true);
		$criteria->compare('iduserborra',$this->iduserborra);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('extension',$this->extension,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Adjuntos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave(){
            /*$this->iduser=Yii::app()->user->id;
             $this->subido=date("Y-m-d H:i:s");*/
             //PRINT_R($this->attributes);DIE();
            return parent::beforeSave();
        }
        
         public function rutaCorta($rutaabsoluta){
       return $cad=yii::app()->baseUrl.str_replace(Yii::getPathOfAlias('webroot') , '', $rutaabsoluta);
       
       
   }
   
   public function actualizatextos($titulo,$textos){
   $registro->setScenario('textos');
       $registro->setAttributes=array(
               "titulo"=>$titulo,
                "texto"=>$textos,  
                );
       $registro->save();
   }
}
