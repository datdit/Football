<h3>รายการจองสนาม</h3>
<table id="cssTbl" style="width:680px;">
    <tr>
        <th rowspan="2">สนามที่</th>
        <th rowspan="2">วันที่จอง<br />(yyyy-mm-dd)</th>
        <th colspan="2">เวลา (นาฬิกา)</th>
        <th rowspan="2">เวลา<br />(ชั่วโมง)</th>        
        <th rowspan="2">จำนวนเงิน<br /> (บาท)</th>
        <th rowspan="2">สถานะ</th>
        <th rowspan="2">ยกเลิก</th>
    </tr>
    <tr>
        <th>เวลาเริ่ม</th>
        <th>ถึงเวลา</th>
    </tr>

    <?php foreach ($model as $rw) { ?>
        <tr>
            <td><?php echo $rw->ground_id; ?></td>
            <td align="center"><?php echo $rw->BookDate; ?></td>
            <td align="center"><?php echo $rw->BookStart; ?></td>
            <td align="center"><?php echo $rw->BookEnd; ?></td>
            <td align="center"><?php echo $rw->total_hour; ?></td>
            <td align="center"><?php echo number_format($rw->total_money); ?></td>
            <td align="center">จองแล้ว</td>
            <td align="center">
                <?php
                echo CHtml::link('ยกเลิก', "#", array("submit" => array('/Home/BookingDelete', 'id' => $rw->id),
                    'confirm' => 'ยืนยันการยกเลิก?', 'csrf' => true
                ))
                ?>
            </td>
        </tr>
    <?php } ?>
</table>