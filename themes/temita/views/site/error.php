<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>


<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<br>
<br><br><br>
<div class="mensajeerroracceso" >
	Error de acceso <?php echo $code; ?>



	<?PHP
	switch($code)
	{


		case 401:
			$mensaje='Usted no se encuentra autorizado acceder a esta direccion';
			$dibujo='lock.png';
			break;


		case 403:
			$mensaje='Acceso denegado';
			$dibujo='lock.png';
			break;


		case 400:
			$mensaje='Esta direccion no existe';
			$dibujo='home.png';
			break;
		case 404:
			$mensaje=$message.'  Esta direccion no ha sido encontrada, consulte con el administrador';
			$dibujo='cloud2.png';
			break;
		case 408:
			$mensaje='El tiempo de solicitud ha terminado';
			$dibujo='calendar.png';
			break;
		case 500:
			$mensaje='Error interno :  '.$message;
			$dibujo='security.png';
			break;
		default:
			$mensaje='Error :'.$code.'.-.'.$message;
			$dibujo='security.png';
	}



	echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].$dibujo,"hola",array('width'=>'25','height'=>'30'));
	echo $mensaje;
	?>
	</div>




<div >
	<?PHP if(yii::app()->user->isSuperAdmin){ ?>
<?php echo CHtml::encode($message); ?><br>
<?php echo CHtml::encode($file); ?><br>
<?php echo CHtml::encode($line); ?><?php echo CHtml::encode($trace); ?>
	<?PHP } ?>
</div>