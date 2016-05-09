<?php
$this->widget('zii.widgets.grid.CGridView', array('id'=>'detallerese-grid',
												'dataProvider'=>Alreserva::model()->search_idsolpe($idcabeza),
												'summaryText'=>'',
												'columns'=>array(
																'fechares',			
																'cant',
               													'usuario',   
               													),
													)
			);
?>