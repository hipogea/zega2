<?php
class TipocambioCompo extends CApplicationComponent
{
    private $_model=null;
    private $_fechainicio;
    private $_fechafin;
    public $monedadefault=null;
    private $_horastolerancia;   ///Horas pasadas desde que se hizo la ultima actualizacion de moendas

    public function init(){
        $this->monedadefault=yii::app()->settings->get('general','general_monedadef');
        $this->_horastolerancia=yii::app()->settings->get('general','general_horaspasadastipocambio');
    }

    //CALCULA las moendas desactrualizadas , DESDE LA ULTIMA ACTUALIZACION
    public function cambiospasados(){

        $citer=New CDBCriteria;
        $citer->addCondition("ultima < :fechamenos AND cambio <> 1");
          $citer->addCondition(" codmon1 <> codmon2 ");
        $citer->params=array(":fechamenos"=>date('Y-m-d H:i:s',time()-$this->_horastolerancia*60*60));
    /*  var_dump(date('Y-m-d H:i:s',time()-$this->_horastolerancia*60*60));
        var_dump(date('Y-m-d H:i:s',time()));
        yii::app()->end();*/
        $registros= yii::app()->db->createCommand()->select("codmon1")->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryAll();
        /*print_r($registros);
        yii::app()->end();*/
        //$registros=Tipocambio::model()->findAll($citer);
        //var_dump($registros);die();
        return array_unique($registros);
    }

    ///es el cambio de PEN->$MONEDA
    public function getventa($moneda){
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $compra= yii::app()->db->createCommand()->select('cambio')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
         if($compra!=false)
         {return $compra ;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
         }

    }

    ///es el cambio de $MONEDA->PEN
    public function getcompra($moneda){
        $citer=New CDbCriteria;
        $citer->addCondition("codmon1=:monedaacomprar AND codmon2=:monedadef");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $compra= yii::app()->db->createCommand()->select('cambio')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
        if($compra!=false)
        {return $compra;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        }


    }



    ///es el cambio en general, ne se oprden  $moneda1 =>$moneda 2
    public function getcambio($moneda1,$moneda2){
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:moneda1 AND codmon2=:moneda2");
        $citer->params=array(":moneda1"=>$moneda1,":moneda2"=>$moneda2);
        $compra= yii::app()->db->createCommand()->select('cambio')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();


        if($compra!=false)
        {return $compra;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        }

    }



    public function lastupdatecompra($moneda)
    {
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedaacomprar AND codmon2=:monedadef");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $ultima= yii::app()->db->createCommand()->select('ultima')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
        //if(!$ultima!=false)
        // throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.' No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        return strtotime($ultima.'');

    }

    private function lastupdateventa($moneda)
    {
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $ultima= yii::app()->db->createCommand()->select('ultima')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
        //var_dump($moneda);yii::app()->end();
        //if(!$ultima!=false)
          // throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        return strtotime($ultima.'');

    }



    public function setcompra($moneda,$valorcompra){
        //echo time() - $this->lastupdateventa($moneda);
        //yii::app()->end();
        if( (1/$this->getVenta($moneda) <= $valorcompra))
        if((time() - $this->lastupdateventa($moneda)) < 300)
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.' El valor de  la compra '.$valorcompra.' de la moneda '.$moneda.'  no puede ser mayor que la venta '.$this->getventa($moneda));
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedaacomprar AND codmon2=:monedadef");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $compra= Tipocambio::model()->find($citer);
        if(is_null($compra))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.' No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        $compra->setScenario('analitica');
        $compra->setAttributes(array('cambio'=>$valorcompra,'ultima'=>date('Y-m-d H:i:s')));
            $compra->validate();
              if(count($compra->geterrors())>0)
                 // print_r($compra->geterrors());
       // yii::app()->end();
                  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha podido registrar la compra de la moneda '.$moneda.'  Revise el valor del cambio ');
            return $compra->save();

    }

    public function setventa($moneda,$valorventa){
        if( $this->getCompra($moneda) >=($valorventa) and ((time() - $this->lastupdateventa($moneda)) < (60*5)))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  El valor de  la venta de la moneda '.$moneda.'  no puede ser menor que la compra ');
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $venta= Tipocambio::model()->find($citer);
        if(is_null($venta))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
       $venta->setScenario('analitica');
        $venta->setAttributes(array('cambio'=>(1/$valorventa),'ultima'=>date('Y-m-d H:i:s')));
        $venta->validate();
        if(count($venta->geterrors())>0)
            //print_r($venta->geterrors());
          //yii::app()->end();
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha podido registrar la compra de la moneda '.$moneda.'  Revise el valor del cambio ');
        return $venta->save();

    }

    public function monedasexternas(){
        $monedas= yii::app()->db->createCommand()->selectDistinct('codmon1')->
        from('{{tipocambio}}')->where('codmon1 <> :vmon',array(':vmon'=>$this->monedadefault))->queryColumn();
        return array_combine($monedas,$monedas);

    }


}
?>
