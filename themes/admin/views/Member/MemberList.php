<?php
//=================================================
//
//      แสดงสามาชิกทั้งหมด
//
// =================================================
?>

<div id="formtitle">
    <div class="title">ข้อมูลสมาชิก</div>&nbsp;
    <div class="title_menu">
        <div class="my_buttons">
            <a href="index.php?r=Member/MemberForm" >
                <img src="<?= Yii::app()->theme->baseUrl; ?>/images/toolbar/add.png" alt=""/>
                เพิ่มข้อมูลสมาชิก
            </a>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div align="right" class="row" style="margin-bottom: 5px;">
    <?php
    $this->widget('application.extensions.PageSize.PageSize', array(
        'mGridId' => 'data-grid', //Gridview id
        'mPageSize' => @$_GET['pageSize'],
        'mDefPageSize' => Yii::app()->params['defaultPageSize'],
        'mPageSizeOptions' => Yii::app()->params['pageSizeOptions'], // Optional, you can use with the widget default
    ));
    ?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'data-grid',
    //'htmlOptions' => array('style' => 'width:500px'),
    'pager' => array('cssFile' => Yii::app()->theme->baseUrl . '/css/gridViewStyle/gridView.css'),
    'cssFile' => Yii::app()->theme->baseUrl . '/css/gridViewStyle/gridView.css',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'summaryText' => 'แสดงข้อมูล {start} - {end} จาก {count} รายการ ',
    'columns' => array(
        'id',
        array(
            'name' => 'pic',
            'type' => 'html',
            'value' => '(!empty($data->pic))?
                CHtml::image("./images/avatar/" .   $data->pic,"",array("style" => "width:50px;"))
                :"no image"',
        ),
        'fullname',
        'email',
        'mobile',
        'Detail' => array(
            'header' => 'Detail',
            'type' => 'raw',
            'value' => 'CHtml::link(\'Detail\', array(\'Student/StudyHistory\' , \'id\' => $data->id))'
        ),
        //'stdclass',
        'chkWork' => array(
            'header' => 'Check Work',
            'type' => 'raw',
            'value' => 'CHtml::link(\'Check\', array(\'Student/StudyHistory\' , \'id\' => $data->id))'
        ),
        array(
            'header' => 'Managment',
            'class' => 'CButtonColumn',
            'template' => ' {edit} {delete}',
            'buttons' => array(
                'edit' => array(
                    'label' => 'Edit',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/gr-update.png",
                    'url' => 'Yii::app()->createUrl("Member/MemberForm", array("id" => $data->id))'
                ),
                'delete' => array(
                    'label' => 'Delete',
                    //'visible' => '($data->id < 2 )?false:true',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/del.jpg",
                    'url' => 'Yii::app()->createUrl("Member/Delete", array("id" => $data->id))',
                    'click' => 'function() { if (!confirm("ยืนยันการลบข้อมูล")) return false; }',
                ),
            )
        )
    )
));
?>

<div align="right" class="CbuttonDetail">
    <?= CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/gr-update.png"); ?>=แก้ไข ,
    <?= CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/del.jpg"); ?>=ลบข้อมูล
</div>

