<?php
/* @var $this Members2Controller */
/* @var $model Members2 */

$this->breadcrumbs=array(
	'Members2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Members2', 'url'=>array('index')),
	array('label'=>'Manage Members2', 'url'=>array('admin')),
);
?>

<h1>Create Members2</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>