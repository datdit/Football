<?php
//=================================================
//
//      รายการสนามที่จองแล้ว
//
// =================================================
?>

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
        //'id',
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            'name' => 'ground_id',
            'value' => '$data->grounds->GroundName',
            'filter' => Ground::model()->ListGround,
        ),
        array(
            'header' => 'วันที่จองสนาม',
            'type' => 'raw',
            'value' => '"<center>" . $data->BookDate . "</center>"'
        ),
        array(
            'header' => 'เวลา (นาฬิกา)',
            'type' => 'raw',
            'value' => '"<center>" . $data->BookStart . " - " . $data->BookEnd . "</center>"'
        ),
        //'BookStart',
        //'BookEnd',
        array(
            'header' => 'จำนวนชั่วโมง',
            'type' => 'raw',
            'value' => '"<center>" . $data->total_hour . "</center>"'
        ),
        array(
            'header' => 'จำนวนเงิน',
            //'name' => 'total_money',
            'value' => 'number_format($data->total_money)',
            'type' => 'raw',
            'htmlOptions' => array('align' => 'right'),
            'footer' => $model->totals(),
        ),
        array(
            'name' => 'member_id',
            'value' => '$data->members->fullname',
            'filter' => Member::model()->ListMember,
        ),
        array(
            'name' => 'ConfirmFlag',
            'type' => 'raw',
            'filter' => array(1 => 'ใช้บริการแล้ว', 0 => 'จอง'),
            'value' => 'Booking::getFlag($data->ConfirmFlag)',
            'htmlOptions' => array('style' => 'text-align:center;')
        ),
        array(
            'header' => 'Managment',
            'class' => 'CButtonColumn',
            'template' => ' {complete} {cancel}',
            'buttons' => array(
                'complete' => array(
                    'label' => 'complete',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/ok.png",
                    'url' => 'Yii::app()->createUrl("Booking/BookingComplete", array("id" => $data->id))',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'get',
                            'url' => 'js:$(this).attr("href")',
                            'success' => 'js:function(data) { $.fn.yiiGridView.update("data-grid");}',
                            'beforeSend' => 'function(){$("#content").addClass("loading");}',
                            'complete' => 'function(){ $("#content").removeClass("loading");}',
                        //'error' => 'js:function() { alert("error"); }'
                        )
                    ),
                ),
                'cancel' => array(
                    'label' => 'cancel',
                    //'visible' => '($data->id < 2 )?false:true',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/gr-delete.png",
                    'url' => 'Yii::app()->createUrl("Booking/BookingCancel", array("id" => $data->id))',
                    'click' => 'function() { if (!confirm("ยืนยันการยกเลิกการจอง")) return false; }',
                ),
            )
        )
    )
));
?>

<div align="right" class="CbuttonDetail">
    <?= CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/ok.png"); ?>=เข้าใช้บริการ ,
    <?= CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/gr-delete.png"); ?>=ยกเลิกการจอง
</div>

