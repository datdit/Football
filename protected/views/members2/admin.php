<?php
/* @var $this Members2Controller */
/* @var $model Members2 */

$this->breadcrumbs=array(
	'Members2s'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Members2', 'url'=>array('index')),
	array('label'=>'Create Members2', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#members2-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Members2s</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'members2-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'fullname',
		'email',
		'mobile',
		/*
		'address',
		'pic',
		'lastupdate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
