<?php
//var_dump(is_dir($model->getCarpeta()));die();
if($this->beginCache('cache_tab_adjunto', array(
    'dependency'=>new CDirectoryCacheDependency($model->getCarpeta())
            ,
    'duration'=>600,
    
    ))) { 

?>


<?php	
//var_dump($model->fotosparagaleria());
//ECHO $model->getCarpeta()."<BR>";
  $this->widget('ext.galeria.Galeria',array(
      'idregistro'=>$model->id,  //Es id de un registro o de laguna referencia 
			'images'=>$model->fotosparagaleria(),
			//'rutaimagenes'=>'',
         'rutaacciones'=>array(
                                'B'=>array( //borrar
                                      'accion'=>$this->id.DIRECTORY_SEPARATOR.'borraarchivo',
                                       'parametro'=>'archivoaatratar',
                                            ),
                                'M'=>array( //ENVIAR POR CORREO
                                      'accion'=>$this->id.DIRECTORY_SEPARATOR.'adjuntaarchivo',
                                       'parametro'=>'archivoaatratar',
                                            ),
                     
                            ),
			'idimagen'=>'gatito',//ID del a miagen para e intercambiar
	));
?>

    <?php $this->endCache('cache_tab_adjunto'); }  ?>
<div id="vitrina" ></div>
<?php	
if (!$model->isNewRecord) {
  $this->renderpartial('//site/mensajesdocumentos',
          array(
              'codocu'=>$model->codocu,
              'id'=>$model->id,
          )
          );
  
}
?>