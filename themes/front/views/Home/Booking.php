<script type="text/javascript">
    function onSubmit() {
        var BookStart = document.getElementById("BookStart").value;
        var BookEnd = document.getElementById("BookEnd").value;
        var total_hour = BookEnd - BookStart;
        //alert(total_hour);
        if (total_hour < 1) {
            alert("กรุณาเลือกเวลาให้ถูกต้อง");
            return false;
        } else {
            return true;
        }
        //$('#myform').submit();
    }
</script>

<h1>จองสนามฟุตบอล</h1>


<table>
    <tr>
        <td valign="top">
            <table border='0'>
                <tr>
                    <td valign='top'>
                        <?php
                        // เก็บ Link Image ของสนาม
                        $imgLink = Yii::app()->baseUrl . '/images/ground/' . $GroundModel->pic;
                        ?>
                        <a href="<?php echo $imgLink; ?>" target="_blank"><img src="<?php echo $imgLink; ?>" width="150px"></a>
                        <?php //echo CHtml::link(CHtml::image($imgLink, 'สนาม', array('width'=>'150px')), array('view'));    ?>
                    </td>
                    <td valign='top'>
                        <b>ID : <?php echo $GroundModel->id; ?></b><br />
                        <b>สนาม : </b> <?php echo $GroundModel->GroundName; ?><br />
                        <b>ราคา/ชั่วโมง (บาท) : <?php echo number_format($GroundModel->Price); ?></b><br />
                        <b>รายละเอียด : </b> <?php echo $GroundModel->GroundDesc; ?><br />
                    </td>
                </tr>
            </table>

            <?php
            echo CHtml::beginForm(array('Home/ConfirmBooking'), 'post', array('id' => 'myform'));

            echo CHtml::hiddenField("ground_id", $GroundModel->id);
            echo CHtml::hiddenField('price', $GroundModel->Price);
            echo CHtml::hiddenField("isOK", "Yes");
            ?>

            <table>
                <tr>
                    <td>วันที่จองสนาม </td>
                    <td>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => 'BookDate',
                            //'model' => $model,
                            'value' => date('Y-m-d'),
                            'options' => array(
                                'showAnim' => 'slideDown', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                'showButtonPanel' => TRUE,
                                'dateFormat' => 'yy-m-d'
                            ),
                            'htmlOptions' => array(
                                'style' => ''
                            ),
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>จากเวลา (นาฬิกา)</td>
                    <td><?php
                        echo CHtml::DropDownList('BookStart', '', Booking::model()->time);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ถึงเวลา (นาฬิกา)</td>
                    <td>                 <?php echo CHtml::DropDownList('BookEnd', '', Booking::model()->time); ?>

                        <?php
                        ?>                        
                        </div>           
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?php
                        echo CHtml::ajaxSubmitButton('คำนวณ', array('Home/CalHour'), array('update' => '#total_hour',)
                        );
                        ?>


                    </td>
                </tr>
                <tr>
                    <td valign='top'>สรุปการจอง </td>
                    <td><div id="total_hour">...</div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>

                        <?php
                        //echo CHtml::submitButton('ยืนยันการจอง', array('name' => 'submit'));

                        echo CHtml::submitButton("ยืนยันการจองสนาม", array(
                            //'title' => 'Topic',
                            'name' => 'submit',
                            //'onclick' => 'js:confirm();'
                            'onclick' => 'return onSubmit()'
                        ));
                        ?>
                    </td>
                </tr>
            </table>
            <?php
            ?>
            <?php echo CHtml::endForm() ?>  

        </td>
        <td>&nbsp;</td>
        <td valign="top">
            <!-- =================   แสดงข้อมูลการจองของสนาม ======================  -->
            <b>ข้อมูลที่มีการจองแล้ว</b>
            <table id="cssTbl" style="width:300px;">
                <tr>
                    <th>วันที่จอง<br />(yyyy-mm-dd)</th>
                    <th>เวลาที่จอง (นาฬิกา)</th>
                </tr>
                <?php foreach ($booking as $rw) { ?>
                    <tr>
                        <td align="center"><?php echo $rw->BookDate; ?></td>
                        <td align="center"><?php echo $rw->BookStart . " - " . $rw->BookEnd; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </td>
    </tr>
</table>