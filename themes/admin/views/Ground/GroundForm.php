<?php if (!empty($msg_text)): ?>
    <script type="text/javascript">
        $(function() {
            var msg_text = "<?php echo $msg_text; ?>";
            $.facebox(msg_text);
        });
    </script>
<?php endif; ?>

<script type="text/javascript">
    function onSubmit(savetype) {
        //alert("ok " + savetype);
        $('#savetype').val(savetype);
        $('#myform').submit();
    }
</script>

<div id="formtitle">
    <div class="title">ข้อมูลสนาม</div>&nbsp;
    <div class="title_detail">
        <?php echo $model->id != NULL ? "(แก้ไข ID : " . $model->id . ")" : "(เพิ่มข้อมูลใหม่)"; ?>
    </div>
    <div class="title_menu">
        <?php //if ($model->group_id == 1) : ?>
        <div class="my_buttons">
            <a href="index.php?r=Ground/GroundForm" >
                <img src="<?= Yii::app()->theme->baseUrl; ?>/images/toolbar/add.png" alt=""/>
                เพิ่มข้อมูล</a>
            <a href="index.php?r=Ground/GroundListAll" >
                <img src="<?= Yii::app()->theme->baseUrl; ?>/images/toolbar/stop.png" alt=""/>
                ปิด</a>
        </div>
        <?php //endif; ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'myform',
    //'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    //'focus' => array($model, 'username'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
        ));

echo $form->hiddenField($model, "id");
echo CHtml::hiddenField("savetype");
?>

<?php echo $form->errorSummary($model); ?>

<div class="divform">
    <table class="tblform" cellpadding="0" cellspacing="1">

        <tr  class="noline"><td class="td1">
                <?php echo $form->labelEx($model, 'pic', array('class' => 'cLabel')); ?>
            </td><td>
                <?php if (!empty($model->pic)) { ?>
                    <img src="./images/ground/<?= $model->pic ?>" width="80" align="buttom" >
                    
                    <?php echo $form->fileField($model, 'pic', array('class' => 'input', 'style' => 'margin-left:10px')); ?>
                <?php } else { ?>
                    <?php echo $form->fileField($model, 'pic', array('class' => 'input')); ?>

                <?php } ?>
                <?php echo $form->error($model, 'pic'); ?>
            </td></tr>

        <tr  class="noline"><td class="td1">
                <?php echo $form->labelEx($model, "GroundName"); ?></td><td>
                <?php echo $form->textField($model, "GroundName", array('class' => 'txt')); ?>
                <?php echo $form->error($model, "GroundName"); ?>
            </td></tr>

        <tr  class="noline"><td class="td1">
                <?php echo $form->labelEx($model, "Price"); ?></td><td>
                <?php echo $form->textField($model, "Price", array('class' => 'txt')); ?>
                <?php echo $form->error($model, "Price"); ?>
            </td></tr>

        <tr  class="noline"><td class="td1">
                <?php echo $form->labelEx($model, "GroundDesc"); ?></td><td>
                <?php echo $form->textArea($model, "GroundDesc", array('maxlength' => 200, 'rows' => 3, 'cols' => 50));
                ?>
                <?php echo $form->error($model, "GroundDesc"); ?>
            </td></tr>


        <tr class="noline">
            <td class="td1">&nbsp;</td>
            <td>
                <?php //echo CHtml::submitButton(Yii::t('ui', 'Submit'), array('class' => 'btn btn-primary'));   ?>

                <div class="my_buttons">
                    <a href="#" onclick="return onSubmit(0);">
                        <img src="<?= Yii::app()->theme->baseUrl; ?>/images/toolbar/filesave.png" alt=""/>
                        บันทึกข้อมูล
                    </a>

                    <?php //if ($model->group_id == 1) : ?>
                    <a href="#" onclick="return onSubmit(1);">
                        <img src="<?= Yii::app()->theme->baseUrl; ?>/images/toolbar/filesave_new.png" alt=""/>
                        บันทึกและเพิ่มใหม่
                    </a>
                    <?php //endif; ?>

                </div>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>
