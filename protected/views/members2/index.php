<?php
/* @var $this Members2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Members2s',
);

$this->menu=array(
	array('label'=>'Create Members2', 'url'=>array('create')),
	array('label'=>'Manage Members2', 'url'=>array('admin')),
);
?>

<h1>Members2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
