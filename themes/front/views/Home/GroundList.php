<h1>สนามแข่งขัน</h1>

<?php
foreach ($model as $rw) {
    ?>
    <table border='0'>
        <tr>
            <td valign='top'>
                <?php
                // เก็บ Link Image ของสนาม
                $imgLink = Yii::app()->baseUrl . '/images/ground/' . $rw->pic;
                ?>
                <a href="<?php echo $imgLink; ?>" target="_blank"><img src="<?php echo $imgLink; ?>" width="150px"></a>
            </td>
            <td valign='top'>
                <b>ID : <?php echo $rw->id; ?></b><br />
                <b>สนาม : </b> <?php echo $rw->GroundName; ?><br />
                <b>ราคา/ชั่วโมง (บาท) : <?php echo number_format($rw->Price); ?></b><br />
                <b>รายละเอียด : </b> <?php echo $rw->GroundDesc; ?><br />
                <?php
                if (!empty(Yii::app()->session['id'])) {
                    echo CHtml::Button("จองสนาม", array('submit' => array('/Home/Booking', 'id' => $rw->id), 'class' => 'button'));
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>