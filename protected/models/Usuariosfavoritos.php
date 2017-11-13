<?php

/**
 * This is the model class for table "usuariosfavoritos".
 *
 * The followings are the available columns in table 'usuariosfavoritos':
 * @property integer $id
 * @property string $hiduser
 * @property string $url
 * @property string $fecharegistro
 * @property string $valido
 * @property string $chapa
 *
 * The followings are the available model relations:
 * @property CrugeUser $hiduser0
 */
class Usuariosfavoritos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuariosfavoritos the static model class
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
		return 'public_usuariosfavoritos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url', 'length', 'max'=>300),
			array('valido', 'length', 'max'=>1),
			array('chapa', 'length', 'max'=>40),
			array('hiduser, fecharegistro', 'safe'),
                    array('valido', 'safe','on'=>'prioridad'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' hiduser, url, fecharegistro, valido, chapa', 'safe', 'on'=>'search'),
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
			'hiduser0' => array(self::BELONGS_TO, 'CrugeUser', 'hiduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hiduser' => 'Hiduser',
			'url' => 'Url',
			'fecharegistro' => 'Fecharegistro',
			'valido' => 'Inicial',
			'chapa' => 'Alias ',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('hiduser',$this->hiduser,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('fecharegistro',$this->fecharegistro,true);
		$criteria->compare('valido',$this->valido,true);
		$criteria->compare('chapa',$this->chapa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_usuario($iduser)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->addCondition("hiduser=".$iduser);
 
                     //$dependecy = new CDbCacheDependency('SELECT count(*) FROM {{usuariosfavoritos}}');
 
                return new CActiveDataProvider($this/*->cache(600, $dependecy, 2)*/, array ( 
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>10),
                                            ));
                

		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
	}
        public static function getUrlForMe($iduser){
            $criteria=new CDbCriteria;
		$criteria->addCondition("hiduser=:vusuario");
                $criteria->addCondition("valido='1'");
                $criteria->params=array(":vusuario"=>$iduser+0);
                $retorno=self::model()->find($criteria);
                //var_dump($retorno->url);
               if(!is_null($retorno)){
                  return  $retorno->url;
               }else{
                   return null;
               }
            
        }
        
        public function aftersave(){
            $this->refresh();
            if($this->valido=='1'){
                $this->updateAll(array('valido'=>'0'),"id <> :xid and   hiduser = :vusuario ",array(":xid"=>$this->id,":vusuario"=>$this->hiduser));
            }
            return parent::aftersave();
        }
}