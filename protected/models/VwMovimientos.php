<?php

class VwMovimientos extends CActiveRecord
{
	public $d_fectra1;
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_movimientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtemp, n_hguia, idstatus', 'required'),
			array('idstatus', 'numerical', 'integerOnly'=>true),
			array('n_cangui, asignado', 'numerical'),
			array('desum, idtemp, id', 'length', 'max'=>20),
			array('n_hguia', 'length', 'max'=>11),
			array('c_itguia, c_um, c_codep', 'length', 'max'=>3),
			array('c_codgui, c_numgui', 'length', 'max'=>8),
			array('c_edgui, c_estado', 'length', 'max'=>2),
			array('c_descri, nombreobjeto', 'length', 'max'=>40),
			array('c_codactivo', 'length', 'max'=>13),
			array('c_codsap', 'length', 'max'=>5),
			array('nomep, estado', 'length', 'max'=>25),
			array('desmotivo', 'length', 'max'=>30),
			array('numero', 'length', 'max'=>12),
			array('c_salida', 'length', 'max'=>1),
			array('d_fectra', 'length', 'max'=>19),
			array('despro', 'length', 'max'=>100),
			array('m_obs', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('m_obs, desum, idtemp, id, n_hguia, c_itguia, n_cangui, idstatus, c_codgui, c_edgui, c_descri, c_um, c_codep, c_estado, c_codactivo, c_codsap, nomep, estado, desmotivo, asignado, numero, c_numgui, c_salida, d_fectra, despro, nombreobjeto', 'safe', 'on'=>'search'),
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
			'm_obs' => 'M Obs',
			'desum' => 'Desum',
			'idtemp' => 'Idtemp',
			'id' => 'ID',
			'n_hguia' => 'N Hguia',
			'c_itguia' => 'C Itguia',
			'n_cangui' => 'N Cangui',
			'idstatus' => 'Idstatus',
			'c_codgui' => 'C Codgui',
			'c_edgui' => 'C Edgui',
			'c_descri' => 'C Descri',
			'c_um' => 'C Um',
			'c_codep' => 'C Codep',
			'c_estado' => 'C Estado',
			'c_codactivo' => 'C Codactivo',
			'c_codsap' => 'C Codsap',
			'nomep' => 'Nomep',
			'estado' => 'Estado',
			'desmotivo' => 'Desmotivo',
			'asignado' => 'Asignado',
			'numero' => 'Numero',
			'c_numgui' => 'C Numgui',
			'c_salida' => 'C Salida',
			'd_fectra' => 'D Fectra',
			'despro' => 'Despro',
			'nombreobjeto' => 'Nombreobjeto',
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

		$criteria->compare('m_obs',$this->m_obs,true);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('n_hguia',$this->n_hguia,true);
		$criteria->compare('c_itguia',$this->c_itguia,true);
		$criteria->compare('n_cangui',$this->n_cangui);
		$criteria->compare('idstatus',$this->idstatus);
		$criteria->compare('c_codgui',$this->c_codgui,true);
		$criteria->compare('c_edgui',$this->c_edgui,true);
		$criteria->compare('c_descri',$this->c_descri,true);
		$criteria->compare('c_um',$this->c_um,true);
		$criteria->compare('c_codep',$this->c_codep,true);
		$criteria->compare('c_estado',$this->c_estado,true);
		$criteria->compare('c_codactivo',$this->c_codactivo,true);
		$criteria->compare('c_codsap',$this->c_codsap,true);
		$criteria->compare('nomep',$this->nomep,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('desmotivo',$this->desmotivo,true);
		$criteria->compare('asignado',$this->asignado);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('c_numgui',$this->c_numgui,true);
		$criteria->compare('c_salida',$this->c_salida,true);
		$criteria->compare('d_fectra',$this->d_fectra,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwMovimientos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
