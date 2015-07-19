<?php
/* @var $this Members2Controller */
/* @var $model Members2 */

$this->breadcrumbs=array(
	'Members2s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Members2', 'url'=>array('index')),
	array('label'=>'Create Members2', 'url'=>array('create')),
	array('label'=>'View Members2', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Members2', 'url'=>array('admin')),
);
?>

<h1>Update Members2 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>