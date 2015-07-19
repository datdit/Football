<?php
/* @var $this Members2Controller */
/* @var $model Members2 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'members2-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastupdate'); ?>
		<?php echo $form->textField($model,'lastupdate'); ?>
		<?php echo $form->error($model,'lastupdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->