

<?php

   $this->widget('ext.galeriafirme.GaleriaFirme',
					array(
                                            'titulo'=>'',
                                            'id'=>'upi',
                                            'modo'=>1,
                                            //'zonaAjax'=>'ZONA_GALERIA',
                                            'mensajegeneral'=>'',
                                             'fotos'=>$model->fotosparagaleria(),

					)
				);
?>