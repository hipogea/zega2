<?php

/**
 * This is the model class for table "{{sunatmaster}}".
 *
 * The followings are the available columns in table '{{sunatmaster}}':
 * @property string $codsunat
 * @property string $codigo
 * @property string $descorta
 * @property string $descripcion
 */
class Sunatmaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    PUBLIC $descrilarga;
    public $descricompleta;
	public function tableName()
	{
		return '{{sunatmaster}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codsunat, codigo, descorta, descripcion', 'required'),
			array('codsunat', 'length', 'max'=>3),
			array('codigo', 'length', 'max'=>6),
			array('descorta', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codsunat, codigo, descorta, descripcion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			
                    'tempdetalle' => array(self::HAS_MANY, 'Tempdetgui', 'n_hguia'),
			'numeroitems'=>array(self::STAT, 'Tempdetgui', 'n_hguia'),//el campo foraneo
			'direccionespartida' => array(self::BELONGS_TO, 'Direcciones', 'n_dirsoc'),
			'direccionesllegada' => array(self::BELONGS_TO, 'Direcciones', 'n_direc'),
			'transportistas' => array(self::BELONGS_TO, 'Clipro', 'c_codtra'),
			'direccionestransportista' => array(self::BELONGS_TO, 'Direcciones', 'n_directran'),
			'destinatario'=>array(self::BELONGS_TO, 'Clipro', 'c_coclig'),
			'dirsoc' => array(self::BELONGS_TO, 'Direcciones', 'n_dirsoc'),
			'testado' => array(self::BELONGS_TO, 'Estado', 'c_estgui'),
			'choferes' => array(self::BELONGS_TO, 'Choferes', 'c_licon'),
                   // 'numeroitemstemp'=>array(self::STAT, 'Tempdetgui', 'n_hguia'),
			//'codocu0' => array(self::BELONGS_TO, 'Estado', 'codocu'),
			//'cCoclig' => array(self::BELONGS_TO, 'ObjetosCliente', 'c_coclig'),
			//'codobjeto0' => array(self::BELONGS_TO, 'ObjetosCliente', 'codobjeto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codsunat' => 'Codsunat',
			'codigo' => 'Codigo',
			'descorta' => 'Descorta',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('codsunat',$this->codsunat,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                       'pagination'=>array(
                           'pageSize'=>50
                       )
		));
	}
        
        public function search_por_comprobantes($tabla)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->addCondition("codsunat='".$tabla."'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                       'pagination'=>array(
                           'pageSize'=>50
                       )
		));
	}
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sunatmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
         public function afterfind(){
            $this->descrilarga="[".$this->codigo."]- ".$this->descorta;
            $this->descricompleta=$this->codigo." - ".$this->descorta;
            
            return parent::afterfind();
        }
        
        public static function datoslista($codigotabla){
            $cri=new CDBCriteria();
        $codigotabla=  MiFactoria::cleanInput($codigotabla);
            $cri->addCondition("codsunat=:vcodsunat");
            $cri->params=array(":vcodsunat"=>$codigotabla);
            
          return  CHtml::listdata(self::model()->findAll($cri),'codigo','descricompleta');
            
        }
}
