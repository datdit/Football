<?php if (!empty($msg_text)): ?>
    <script type="text/javascript">
        $(function() {
            var msg_text = "<?php echo $msg_text; ?>";
            $.facebox(msg_text);
        });
    </script>
<?php endif; ?>

<h1>เปลี่ยนรหัสผ่าน</h1>
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

<?php echo $form->errorSummary($model); ?>
<?php echo CHtml::hiddenField('id', Yii::app()->session['id']) ?>


<div class="field">
    <?php echo $form->labelEx($model, 'password',array('class'=>'cLabel')); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => 'input', 'style' => 'width:150px;')); ?>
    <?php echo $form->error($model, 'password'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'pwd',array('class'=>'cLabel')); ?>
    <?php echo $form->passwordField($model, 'pwd', array('class' => 'input', 'style' => 'width:150px;')); ?>
    <?php echo $form->error($model, 'pwd'); ?>
</div>

<div class="hrLine"></div>

<?php echo CHtml::submitButton('เปลี่ยนรหัสผ่าน', array('class' => 'button','style'=>'margin-left:140px')) ?>
<?php $this->endWidget(); ?>