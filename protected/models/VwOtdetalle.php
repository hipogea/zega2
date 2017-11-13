<?php

class VwOtdetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_otdetalle';
	}

        public $descripcion; 
        public $completo;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rucpro, codobjeto, item, textoactividad, numero, fechacre, fechafinprog, codpro, idobjeto, codresponsable, textocorto, textolargo, grupoplan, codcen, iduser, codocu, codestado, clase, hidoferta', 'required'),
			array('idobjeto, iduser', 'numerical', 'integerOnly'=>true),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			array('identificador, marca', 'length', 'max'=>24),
			array('serie', 'length', 'max'=>50),
			array('descripcion, nombreobjeto, textoactividad, textocorto', 'length', 'max'=>40),
			array('modelo', 'length', 'max'=>25),
			array('codobjeto, item, grupoplan, codocu', 'length', 'max'=>3),
			array('id, hidoferta', 'length', 'max'=>20),
			array('numero', 'length', 'max'=>12),
			array('codpro', 'length', 'max'=>8),
			array('codresponsable', 'length', 'max'=>6),
			array('codcen', 'length', 'max'=>4),
			array('codestado', 'length', 'max'=>2),
			array('clase', 'length', 'max'=>1),
			array('fechainiprog, fechainicio, fechafin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('despro, idetot,rucpro, identificador, serie, descripcion, marca, modelo, nombreobjeto, codobjeto, item, textoactividad, id, numero, fechacre, fechafinprog, codpro, idobjeto, codresponsable, textocorto, textolargo, grupoplan, codcen, iduser, codocu, codestado, clase, hidoferta, fechainiprog, fechainicio, fechafin', 'safe', 'on'=>'search'),
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
			'despro' => 'Despro',
			'rucpro' => 'Rucpro',
			'identificador' => 'Identificador',
			'serie' => 'Serie',
			'descripcion' => 'Descripcion',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'nombreobjeto' => 'Nombreobjeto',
			'codobjeto' => 'Codobjeto',
			'item' => 'Item',
			'textoactividad' => 'Textoactividad',
			'id' => 'ID',
			'numero' => 'Numero',
			'fechacre' => 'Fechacre',
			'fechafinprog' => 'Fechafinprog',
			'codpro' => 'Codpro',
			'idobjeto' => 'Idobjeto',
			'codresponsable' => 'Codresponsable',
			'textocorto' => 'Textocorto',
			'textolargo' => 'Textolargo',
			'grupoplan' => 'Grupoplan',
			'codcen' => 'Codcen',
			'iduser' => 'Iduser',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'clase' => 'Clase',
			'hidoferta' => 'Hidoferta',
			'fechainiprog' => 'Fechainiprog',
			'fechainicio' => 'Fechainicio',
			'fechafin' => 'Fechafin',
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

		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('identificador',$this->identificador,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);
		$criteria->compare('codobjeto',$this->codobjeto,true);
		$criteria->compare('idetot',$this->idetot,true);
		$criteria->compare('textoactividad',$this->textoactividad,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('idobjeto',$this->idobjeto);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('textocorto',$this->textocorto,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('grupoplan',$this->grupoplan,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('clase',$this->clase,true);
		$criteria->compare('hidoferta',$this->hidoferta,true);
		$criteria->compare('fechainiprog',$this->fechainiprog,true);
		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafin',$this->fechafin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwOtdetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function afterfind(){
            
            $this->descripcion="[".$this->numero."]  -  ".$this->despro." - ".$this->nombreobjeto." - ".$this->textoactividad;
            return parent::afterfind();
        }
        
        public function findByPk($id){
          $id=(integer)MiFactoria::cleanInput($id);
		return self::model()->find("id=:vid",array(":vid"=>$id));
        }
         public function suggestot($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'numero LIKE :keyword',
			'order'=>'numero',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		//$suggest=array(JSON_ENCODE($models[0]),'KFSHFKSIY');
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->numero.'-'.$model->item.'-'.$model->textoactividad,  // label for dropdown list
				'value'=>$model->numero.'-'.$model->item,  // value for input field
				//'id'=>$model->id,       // return values from autocomplete
				//'code'=>$model->code,
				//'call_code'=>$model->call_code,
			);
		}
		
		return $suggest;
	}
}
