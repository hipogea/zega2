<div  id='monigoe' style="<?php echo Tenores::buscaestilo($docu, $pos, $sociedad, 'body' );   ?>" >
<?php
//var_dump(Tenores::buscatenor($docu, $pos, $sociedad)->css_body);
echo Tenores::buscatenor($docu, $pos, $sociedad)->mensaje;
?>

<?php 
  if($confirmarecepcion){
      echo "<br>".CHtml::link('CONFIRMAR RECEPCION ',
              //yii::app()->createUrl($this->id.'',array('token'=>$token)),
              'hola',
              array(                 
                  "target"=>"_blank")
              );
  }
 ?>
</div>