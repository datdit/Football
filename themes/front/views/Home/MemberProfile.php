<h1>ข้อมูลส่วนตัว</h1>
<div class="hrLine"></div>

<?php if (Yii::app()->user->hasFlash('register')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('register'); ?>
    </div>
<?php endif; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'register-form',
    //'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
        ));

echo CHtml::hiddenField('id', $model->id);
?>

<?php echo $form->errorSummary($model); ?>

<div class="field">
    <?php echo $form->labelEx($model, 'pic', array('class' => 'cLabel')); ?>
    <?php if (!empty($model->pic)) { ?>
        <img src="./images/avatar/<?= $model->pic ?>" width="50" align="top" >
        <br>
        <?php echo $form->fileField($model, 'pic', array('class' => 'input', 'style' => 'margin-left:140px')); ?>
    <?php } else { ?>
        <?php echo $form->fileField($model, 'pic', array('class' => 'input')); ?>

    <?php } ?>
    <?php echo $form->error($model, 'pic'); ?>
</div>


<div class="hrLine"></div>

<div class="field">
    <?php echo $form->labelEx($model, 'fullname', array('class' => 'cLabel')); ?>
    <?php echo $form->textField($model, 'fullname', array('class' => 'input')); ?>
    <?php echo $form->error($model, 'fullname'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'email', array('class' => 'cLabel')); ?>
    <?php echo $form->textField($model, 'email', array('class' => 'input')); ?>
    <?php echo $form->error($model, 'email'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'mobile', array('class' => 'cLabel')); ?>
    <?php echo $form->textField($model, 'mobile', array('class' => 'input')); ?>
    <?php echo $form->error($model, 'mobile'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'address',array('class'=>'cLabel')); ?>
    <?php echo $form->textArea($model, 'address', array('class' => 'input', 'style' => 'width:450px;')); ?>
    <?php echo $form->error($model, 'address'); ?>
</div>

<div class="hrLine"></div>

<?php echo CHtml::submitButton('บันทึกข้อมูล', array('class' => 'button', 'style' => 'margin-left:140px')) ?>
<?php $this->endWidget(); ?>
<p>&nbsp;<br>&nbsp;</p>
