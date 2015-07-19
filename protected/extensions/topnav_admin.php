<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TopNav_Admin extends CWidget {

    public function run() {

        echo '<div id="main-menu">';

        $this->widget('application.extensions.mbmenu.MbMenu', array(
            'items' => array(
                array('label' => 'หน้าแรก', 'url' => array('/Main/index'),),
                array('label' => 'ข้อมูลพื้นฐาน',
                    'items' => array(
                        array('label' => 'รายสมาชิก', 'url' => array('/Member/MemberListAll')),
                        array('label' => 'สนามฟุตบอล', 'url' => array('/Ground/GroundListAll')),
                    )),
                array('label' => 'ข้อมูลการจองสนาม',
                    'items' => array(
                        array('label' => 'การจองสนาม', 'url' => array('/Booking/BookingListAll')),
                        //array('label' => 'สนามฟุตบอล', 'url' => array('/Ground/GroundListAll')),
                    )),
                //array('label' => 'กำหนดสิทธิ์', 'url' => array('/rights'), 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName)),
                //array('label' => 'เข้าระบบ', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                //array('label' => 'กำหนดค่าเบื้องต้น', 'url' => array('/Main/SetConfigForm&id=1')),
                array('label' => 'ออกระบบ (' . Yii::app()->session['username'] . ')', 'url' => array('/Home/Logout')),
            ),
        ));

        echo '</div>';
    }

}

?>
