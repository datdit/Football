<h1>สมัครสมาชิก</h1>
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
        ));
?>

<?php echo $form->errorSummary($RegisModel); ?>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'username',array('class'=>'cLabel')); ?>
    <?php echo $form->textField($RegisModel, 'username', array('class' => 'input', 'style' => 'width:150px;')); ?>
    <?php echo $form->error($RegisModel, 'username'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'password',array('class'=>'cLabel')); ?>
    <?php echo $form->passwordField($RegisModel, 'password', array('class' => 'input', 'style' => 'width:150px;')); ?>
    <?php echo $form->error($RegisModel, 'password'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'password2',array('class'=>'cLabel')); ?>
    <?php echo $form->passwordField($RegisModel, 'password2', array('class' => 'input', 'style' => 'width:150px;')); ?>
    <?php echo $form->error($RegisModel, 'password2'); ?>
</div>

<div class="hrLine"></div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'fullname',array('class'=>'cLabel')); ?>
    <?php echo $form->textField($RegisModel, 'fullname', array('class' => 'input')); ?>
    <?php echo $form->error($RegisModel, 'fullname'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'email',array('class'=>'cLabel')); ?>
    <?php echo $form->textField($RegisModel, 'email', array('class' => 'input')); ?>
    <?php echo $form->error($RegisModel, 'email'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'mobile',array('class'=>'cLabel')); ?>
    <?php echo $form->textField($RegisModel, 'mobile', array('class' => 'input')); ?>
    <?php echo $form->error($RegisModel, 'mobile'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($RegisModel, 'address',array('class'=>'cLabel')); ?>
    <?php echo $form->textArea($RegisModel, 'address', array('style' => 'width:400px;')); ?>
    <?php echo $form->error($RegisModel, 'address'); ?>
</div>

<div class="hrLine"></div>

<?php echo CHtml::submitButton('Register', array('class' => 'button','style'=>'margin-left:140px')) ?>
<?php $this->endWidget(); ?>
<p>&nbsp;<br>&nbsp;</p>
