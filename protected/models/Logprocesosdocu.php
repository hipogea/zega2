<?php

/**
 * This is the model class for table "{{logprocesosdocu}}".
 *
 * The followings are the available columns in table '{{logprocesosdocu}}':
 * @property string $id
 * @property string $codocu
 * @property string $notice
 * @property string $fechacre
 * @property integer $iduser
 * @property string $proceso
 * @property integer $idsesion
 * @property string $mensaje
 * @property string $hidref
 */
class Logprocesosdocu extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{logprocesosdocu}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('notice', 'required'),
            array('iduser, idsesion', 'numerical', 'integerOnly'=>true),
            array('codocu', 'length', 'max'=>3),
            array('notice', 'length', 'max'=>10),
            array('fechacre', 'length', 'max'=>18),
            array('proceso', 'length', 'max'=>100),
            array('hidref', 'length', 'max'=>20),
            array('mensaje', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, codocu, notice, fechacre, iduser, proceso, idsesion, mensaje, hidref', 'safe', 'on'=>'search'),
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
            'notice' => 'Notice',
            'fechacre' => 'Fechacre',
            'iduser' => 'Iduser',
            'proceso' => 'Proceso',
            'idsesion' => 'Idsesion',
            'mensaje' => 'Mensaje',
            'hidref' => 'Hidref',
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
        $criteria->compare('notice',$this->notice,true);
        $criteria->compare('fechacre',$this->fechacre,true);
        $criteria->compare('iduser',$this->iduser);
        $criteria->compare('proceso',$this->proceso,true);
        $criteria->compare('idsesion',$this->idsesion);
        $criteria->compare('mensaje',$this->mensaje,true);
        $criteria->compare('hidref',$this->hidref,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
    
     public function search_por_usuario($codocu)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
//$elusuario=Yii::app()->user->um->LoadUserById(yii::app()->user->id);
       // Yii::app()->user->um->findSession(Yii::app()->user->um->LoadUserById(yii::app()->user->id))->idsession;
        $criteria=new CDbCriteria;        
        $criteria->addCondition("codocu=:vcodocu AND iduser=:viduser ");
       $criteria->params=array(
               ":vcodocu"=>$codocu,
                 ":viduser"=>yii::app()->user->id,
                 //   ":vidsesion"=>Yii::app()->user->um->findSession(Yii::app()->user->um->LoadUserById(yii::app()->user->id))->idsession,
                       );
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>100),
        ));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Logprocesosdocu the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function beforeSave(){
        if($this->isNewRecord){
            $this->fechacre=date("Y-m-d H:i:s").'';
             $this->iduser=yii::app()->user->id;
        }
        return parent::beforeSave();
    }
}