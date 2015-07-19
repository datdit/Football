<?php
/* @var $this Members2Controller */
/* @var $model Members2 */

$this->breadcrumbs=array(
	'Members2s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Members2', 'url'=>array('index')),
	array('label'=>'Create Members2', 'url'=>array('create')),
	array('label'=>'Update Members2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Members2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Members2', 'url'=>array('admin')),
);
?>

<h1>View Members2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'fullname',
		'email',
		'mobile',
		'address',
		'pic',
		'lastupdate',
	),
)); ?>
