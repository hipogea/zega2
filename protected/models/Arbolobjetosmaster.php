<?php
class Arbolobjetosmaster extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{arbolobjetosmaster}}';
    }
 public function behaviors()
    {
        return array(
            'TreeBehavior' => array(
                'class' => 'ext.behaviors.XTreeBehavior',
                'treeLabelMethod'=> 'getTreeLabel',
                'id'=>'identificador', ///EL campo que tinee los valores clave  del arbol no de la tabla 
                'menuUrlMethod'=> 'getMenuUrl',
            ),
        );
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          //  array('id', 'required'),
            array('cant', 'numerical'),
            array('id, codpro,codigo, descripcion, um, cant, serie, identificador, parent_id', 'safe', 'on'=>'insert,update'),
     
            array('id, identificador, parent_id', 'length', 'max'=>20),
            array('codpro', 'length', 'max'=>10),
            array('descripcion', 'length', 'max'=>80),
            array('um', 'length', 'max'=>6),
            array('serie', 'length', 'max'=>15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, codpro, descripcion, um, cant, serie, identificador, parent_id', 'safe', 'on'=>'search'),
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
            'parent' => array(self::BELONGS_TO, 'Arbolobjetosmaster', 'parent_id'),
            'children' => array(self::HAS_MANY, 'Arbolobjetosmaster', 'parent_id'),
            'childCount' => array(self::STAT, 'Arbolobjetosmaster', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'codpro' => 'Codpro',
            'descripcion' => 'Descripcion',
            'um' => 'Um',
            'cant' => 'Cant',
            'serie' => 'Serie',
            'identificador' => 'Identificador',
            'parent_id' => 'Hidparent',
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
        $criteria->compare('codpro',$this->codpro,true);
        $criteria->compare('descripcion',$this->descripcion,true);
        $criteria->compare('um',$this->um,true);
        $criteria->compare('cant',$this->cant);
        $criteria->compare('serie',$this->serie,true);
        $criteria->compare('identificador',$this->identificador,true);
        $criteria->compare('parent_id',$this->parent_id,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Arbolobjetosmaster the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function getTreeLabel()
    {
        return $this->descripcion . ':' . $this->childCount;
    }
    
    
   
}