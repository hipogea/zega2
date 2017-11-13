<br><br>
<?php
/* @var $this DailyworkController */
/* @var $model Dailywork */

$this->breadcrumbs=array(
	'Dailyworks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

              $dia=substr($model->fecha,0,2);
              $mes=substr($model->fecha,3,2);
              $anno=substr($model->fecha,8,2);
            
           //echo CHtml::link('Go to Daily Work Sheet',$this->createUrl(DIRECTORY_SEPARATOR.'mantto'.DIRECTORY_SEPARATOR.$this->id.DIRECTORY_SEPARATOR.'daily',array('day'=>$dia,'month'=>$mes,'year'=>$anno,'level'=>'byequipo')  )); 
          
$this->menu=array(
	array('label'=>'List Dailywork', 'url'=>array('index')),
	array('label'=>'Create Dailywork', 'url'=>array('create')),
	array('label'=>'Go to Daily Work Sheet', 'url'=> CHtml::normalizeUrl(  yii::app()->createUrl('/mantto/dailywork/daily', array('day'=>$dia,'month'=>$mes,'year'=>$anno,'level'=>'byequipo')    )          )),
	array('label'=>'Manage Dailywork', 'url'=>array('admin')),
);
?>

<h1>Update Dailywork -  <?php echo $model->numero; ?></h1>

<?php $this->renderPartial('_form', array('siguiente'=>$siguiente,'anterior'=>$anterior,'model'=>$model,'criterio'=>$criterio)); ?>