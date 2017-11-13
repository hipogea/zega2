<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */

$this->breadcrumbs=array(
	'Libroobras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Libroobra', 'url'=>array('index')),
	array('label'=>'Create Libroobra', 'url'=>array('create')),
	array('label'=>'View Libroobra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Libroobra', 'url'=>array('admin')),
);
?>

<h1>Update Libroobra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<script type="text/javascript">
 
function updateComment()
{
    // public property
    var _updateComment_url;
 
    <?php echo CHtml::ajax(array(
        'url'=>'js:updateComment._updateComment_url',
        'data'=> "js:$(this).serialize()",
        'type'=>'post',
        'dataType'=>'json',
        'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogComment div.divComment').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogComment div.divComment form').submit(updateComment);
                }
                else
                {
                    $('#dialogComment div.divComment').html(data.div);
                    setTimeout(\"$('#dialogComment').dialog('close') \",2000);
 
                    // Refresh the grid with the update
                    $.fn.yiiGridView.update('event-client-grid');
                }
 
        } ",
    ))?>;
    return false;
 
}
 
</script>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogComment',
    'options'=>array(
        'title'=>'Create classroom',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));?>
<div class="divForForm"></div>
 
<?php $this->endWidget();?>