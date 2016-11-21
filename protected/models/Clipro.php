<?php

class Clipro extends ModeloGeneral
{



	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clipro the static model class
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
		return '{{clipro}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('codpro', 'required'),
			// array('codpro', 'length', 'max'=>6),
			array('codpro,despro,codestado, codocu, direcciontemp,nombrecomercial,telpro, rucpro,socio', 'safe', 'on'=>'insert,update'),
			array('despro,rucpro,socio', 'safe', 'on'=>'BATCH_INS,BATCH_UPD'),
			array('despro', 'required', 'message'=>'Coloca el nombre del cliente','on'=>'BATCH_INS,BATCH_UPD,insert,update'),
			array('direcciontemp', 'required', 'message'=>'Coloca la direccion','on'=>'insert'),
			array('nombrecomercial', 'required', 'message'=>'Coloca la el nombre comercial','on'=>'insert,update'),
			array('despro', 'length', 'min'=>5 ,'message'=>'El nombre es demasiado corto','on'=>'BATCH_INS,BATCH_UPD,insert,update'),
			array('direcciontemp', 'length', 'min'=>5 ,'message'=>'La direccion temporal es demasiada corta','on'=>'insert,update'),
			array('despro', 'length', 'max'=>50 ,'message'=>'El nombre es demasiado largo','on'=>'BATCH_INS,BATCH_UPD,insert,update'),

			array('rucpro',  'match', 'pattern'=> '/[0-9]{11}/', 'message'=>'Es un valor incorrecto de RUC','on'=>'BATCH_INS,BATCH_UPD,insert,update'),
			array('rucpro', 'required', 'message'=>'Llena el RUC','on'=>'BATCH_INS,BATCH_UPD,insert,update'),
			// array('socio', 'required', 'message'=>'Debes de indicar'),
			array('rucpro', 'unique', 'attributeName'=> 'rucpro', 'caseSensitive' => 'false','message'=>'Este RUC ya ha sido registrado','on'=>'BATCH_INS,BATCH_UPD,insert,update'),
			array('telpro', 'mivalidacion','on'=>'insert,update'),
			//array('emailpro', 'email','required','message'=>'Debes de llenar el correo'),
			//array('emailpro', 'email','message'=>'Correo electronico invalido'),
			array('tipo', 'length', 'max'=>1,'on'=>'insert,update'),

			//array('creadopor, modificadopor', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codpro, despro, rucpro,socio', 'safe', 'on'=>'search'),
		);
	}



	public function mivalidacion ($attribute,$params) {
		if ( $this->telpro == "12345" ) {
			$this->adderror('telpro','Es una serie');
		}

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contactoses' => array(self::HAS_MANY, 'Contactos', 'c_hcod'),
			'direcciones' => array(self::HAS_MANY, 'Direcciones', 'c_hcod'),
			'objetos' => array(self::HAS_MANY, 'ObjetosCliente', 'codpro'),
			'nobjetos' => array(self::STAT, 'ObjetosCliente', 'codpro'),
			'ndirecciones' => array(self::HAS_MANY, 'Direcciones', 'c_hcod'),
			'guias' => array(self::HAS_MANY, 'Guia', 'c_codtra'),
			'autorizacionPersonals' => array(self::HAS_MANY, 'AutorizacionPersonal', 'codpro'),
			'personalExternos' => array(self::HAS_MANY, 'PersonalExterno', 'codpro'),
		);
	}




	public $maximovalor;
	public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones
	public function beforeSave() {
		if ($this->isNewRecord) {

			//
			// $this->creadoel=Yii::app()->user->name;
			$this->prefijo='97';
			$this->codocu='360';
			$this->codestado='10'; //creado
			$gg=new Numeromaximo;
			$this->codpro=$gg->numero($this,'correlativo','maximovalor',4,'prefijo');
			//  $this->codpro='97'.Numeromaximo::numero($this,'correlativo','maximovalor',4);
			// $this->codpro='97'.Numeromaximo::numero($this->model(),'codpro','maximovalor',4);
			//$this->cod_estado='01';
			//$this->c_salida='1';
		} else
		{

			//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
		}
		return parent::beforeSave();
	}





	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codpro' => 'Codigo',
			'despro' => 'Nombre',
			'rucpro' => 'R.U.C.',
			'socio'=>'Es socio',
			'telpro' => 'Telefono',
			'emailpro' => 'E-mail',
			'tipo' => 'Tipo',
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

		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('telpro',$this->telpro,true);
		$criteria->compare('emailpro',$this->emailpro,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('direcciontemp',$this->direcciontemp,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('telpro',$this->telpro,true);
		$criteria->compare('emailpro',$this->emailpro,true);
		$criteria->compare('tipo',$this->tipo,true);

		/*return new CActiveDataProvider($this, array(
             'criteria'=>$criteria,
          ));*/


		return new  CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 1000,
			),
		));





	}
        
        
       public function creaarboltabla($actualizar=false){
           if($actualizar){
                $listas=yii::app()->db->createCommand()->
                delete("{{arbolobjetosmaster}}",
                        "codpro=:vcodpro",
                        array(":vcodpro"=>$this->codpro)
                        );
           $idclipro=$this->arbolinsertaclipro(); ///Inserta el registro de clipor primero
         //ahora recorreindo los objetos de esrte clipor
           foreach($this->objetos as $filaobjeto){
               //insertando lo oobjetos primero
               
               //logramos un id recurrente que se actuaiza cada insercion
             $idobjeto= $this->arbolinsertaobjeto($filaobjeto,$idclipro);
              //ahora los equipos 
              foreach($filaobjeto->objetosmaster as $filaequipo)
                  {
                  $idmaster= $this->arbolinsertaequipo($filaequipo,$idobjeto);
                  ///ahora las listas de materiales  y los subequipos
                    // foreach($filaobjeto->objetosmaster as $filaequipo1)
                       //{
                      //los subequipos primero
                                             foreach($filaequipo->masterequipo->masterrelacion as $filahijo)
                                                 {
                                                 $idsubequipo=$this->arbolinsertasubequipo($filahijo->hijo,$idmaster);
                                                  } 
                        $listas=yii::app()->db->createCommand()->
                                select("a.id,a.nombrelista")->
                                from("{{listamateriales}} a, "
                                        . " {{masterlistamateriales}} b, "
                                        . "{{masterequipo}} c ")->
                                where(" b.codigo=c.codigo and"
                                        . " a.id=b.hidlista and "
                                        . "c.codigo='".$filaequipo->masterequipo->codigo."'"
                                        )->queryAll();
                          /*echo "La listas de materiales para el equipo  ".$filaequipo->masterequipo->codigo."    ".$filaequipo->masterequipo->descripcion;
                          echo "<br>";
                      print_r($listas);echo "<br><br><br><br>";*/
                       // $datos= Dlisistamateriales::model()->findAll();
                         foreach($listas as $filalista){
                            $idlista= $this->arbolinsertalistamaterial($filalista,$idmaster);
                           //ahora si insertamos los materiales
                            $registrolista= Listamateriales::model()->findByPk($filalista['id']);
                             /* var_dump($filalista);
                            var_dump($filalista['id']);
                             var_dump($registromaterial);*/
                            //var_dump($registromaterial->hijos);die();
                            foreach($registrolista->hijos as $clave=>$filadlista){
                               $this->arbolinsertamaterial($filadlista->maestro,$idlista); 
                            }
                           // unset($registromaterial);
                         }
                         //unset( $listas);
                  //}
              }
              
          }
               return $idclipro;
           }else{
              return yii::app()->db->createCommand()->
                                select("min(id)")->
                                from("{{arbolobjetosmaster}} a")->
                                where("codpro=:vcodpro",array(":vcodpro"=>$this->codpro))->queryScalar();
           }
         
           }
           
           
        private function arbolinsertaclipro(){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                        'codigo'=>$this->codpro,
                        'descripcion'=>$this->despro,
                        'parent_id'=>null,
                    )
                    );
            $arbol->save();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
        
        private function arbolinsertaobjeto($filaobjeto,$idclipro){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                          'codigo'=>$filaobjeto->codobjeto,
                        'descripcion'=>$filaobjeto->nombreobjeto,
                        'parent_id'=>$idclipro,
                    )
                    );
            $arbol->save();$arbol->refresh();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
        
         private function arbolinsertaequipo($filamaster,$idclipro){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                          'codigo'=>$filamaster->hcodobmaster,
                        'descripcion'=>$filamaster->masterequipo->descripcion,
                        'identificador'=>$filamaster->id,
                        'parent_id'=>$idclipro,
                    )
                    );
            $arbol->save();$arbol->refresh();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
        
        
        private function arbolinsertalistamaterial($filalista,$idlista){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                          'codigo'=>'',
                        'descripcion'=>$filalista['nombrelista'],
                        'parent_id'=>$idlista,
                    )
                    );
            $arbol->save();$arbol->refresh();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
        
         private function arbolinsertamaterial($filamaterial,$idlista){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                          'codigo'=>$filamaterial->codigo,
                        'descripcion'=>$filamaterial->descripcion,
                        'parent_id'=>$idlista,
                    )
                    );
            $arbol->save();$arbol->refresh();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
        
        
         private function arbolinsertasubequipo($filahijo,$idlista){
            $arbol=New Arbolobjetosmaster();
            $arbol->setAttributes(
                    array(
                        'codpro'=>$this->codpro,
                          'codigo'=>$filahijo->codigo,
                        'descripcion'=>$filahijo->descripcion,
                        'parent_id'=>$idlista,
                    )
                    );
            $arbol->save();$arbol->refresh();
            $valor=$arbol->id;unset($arbol);
            return $valor;
        } 
}

