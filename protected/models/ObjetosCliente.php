<?php

class ObjetosCliente extends ModeloGeneral
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ObjetosCliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->params['prefijo'].'objetos_cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codpro',  'required'),
			array('cebe',  'required','message'=>'El centro de beneficio es obligatorio'),
			array('cebe','exist','allowEmpty' => false, 'attributeName' => 'codc', 'className' => 'Cc','message'=>'Este Centro Beneficio no existe'),
			//array('cebe','chkcebe','on'=>'update'),

			//	array('codobjeto', 'required'),
			//array('codobjeto', 'unique'),
			//array('codobjeto', 'match', 'pattern'=>Yii::app()->params['mascaradocs'],'message'=>'El codigo  no es el correcto, El c debe comenzar por 2 DIGITOS  > 0 y los caracteres deben ser numericos'),
			array('codobjeto','length', 'min'=>3),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('codpro', 'length', 'max'=>6),
			array('codobjeto','length', 'max'=>3),
			array('nombreobjeto', 'length', 'max'=>40),
			array('descripcionobjeto,tipoobjeto,cebe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codpro, codobjeto, nombreobjeto, descripcionobjeto, tipoobjeto, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
                       // 'objetospadres'=> array(self::HAS_MANY, 'Objetosmaster', 'hidobjeto'),
			'clipro'=> array(self::BELONGS_TO, 'Clipro', 'codpro'),
			//'master'=> array(self::HAS_MANY, 'Masterequipo', 'codigo'),
			'cc'=> array(self::BELONGS_TO, 'Cc', 'cebe'),
                    'objetosmaster'=> array(self::HAS_MANY, 'Objetosmaster', 'hidobjeto'),
                     'nobjetos'=> array(self::STAT, 'Objetosmaster', 'hidobjeto'),
                    

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codpro' => 'Codpro',
			'codobjeto' => 'Codobjeto',
			'nombreobjeto' => 'Nombreobjeto',
			'descripcionobjeto' => 'Descripcionobjeto',
			'tipoobjeto' => 'Tipoobjeto',
			'estado' => 'Estado',
		);
	}


	public $maximovalor;
	public function beforeSave() {
		if ($this->isNewRecord) {
			$criterio=new CDbCriteria;
			$criterio->condition="codpro=:vcodpro";
			$criterio->params=array(':vcodpro'=>$this->codpro);
			$this->codobjeto=str_pad(self::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//$this->codobjeto=Numeromaximo::numero($this,'correlativo','maximovalor',3);



		} else
		{
			//if ($this->cestadovale=='01')
			//$this->numvale=Numeromaximo::numero($this->model(),'correlativo','maximovalor',8,'codcentro');
			//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
		}
		return parent::beforeSave();
	}




	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('codobjeto',$this->codobjeto,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);
		$criteria->compare('descripcionobjeto',$this->descripcionobjeto,true);
		if(isset(yii::app()->session['codpro'])){
                    $criteria->addCondition("codpro=:vcodpro");
                    $criteria->params=array("codpro=:vcodpro"=>yii::app()->session['codpro']);
                }
		$criteria->compare('estado',$this->estado);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function chkcebe($attribute,$params) {
		//verificando que pno existsa ncoistencia con los cebes hijos
		foreach($this->objetosmaster as $fila){
			if($fila->cebe <> $this->cebe){
				$this->adderror('cebe','No puede cambiar el CEBE, hay objetos hijos con este valor');
				break;
			}

		}

	}

}