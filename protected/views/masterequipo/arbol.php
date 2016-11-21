<?php
$this->widget('CTreeView',array(
		'id'=>'auth-item-tree',
		//'persist'=>'cookie',
		'data'=>
		array(

			// ROLES  TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t("Roles")."</b>", 
				'expanded'=>true, 
				'children'=>$treeDataRoles,
			),//end roles treenode

			// TAREAS TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t("Tareas")."</b>", 
				'expanded'=>true, 
				'children'=>$arrayTareas,
			),//end tareas treenode

			// OPERATIONS  TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t(
					"Operaciones Organizadas por Tipo")."</b>", 
				'expanded'=>true, 
				'children'=>$treeDataOps,
			),//end operations treenode
			
		)
	));
 ?>
