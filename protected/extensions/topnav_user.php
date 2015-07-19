<?php

class TopNav_User extends CWidget {

    public function run() {
        echo '<div id="main-menu">';
        $this->widget('application.extensions.mbmenu.MbMenu', array(
            'items' => array(
                array('label' => 'หน้าแรก', 'url' => array('/Main/index'),),
                array('label' => 'บทเรียน',
                    'items' => array(
                        array('label' => 'บทเรียน', 'url' => array('Learn/LessonList&id=' . Yii::app()->session['id'])),
                        array('label' => 'แบบทดสอบปลายภาค', 'url' => array('/Learn/FinalTest&id=' . Yii::app()->session['id'])),
                )),
                array('label' => 'ข้อมูลนักเรียน',
                    'items' => array(
                        array('label' => 'ข้อมูลส่วนตัว', 'url' => array('User/UserForm&id=' . Yii::app()->session['id'])),
                        //array('label' => 'เปลี่ยนรหัสผ่าน', 'url' => array('/User/Password')),
                        array('label' => 'เปลี่ยนรหัสผ่าน', 'url' => array('/User/ChangPassword')),
                )),
                array('label' => 'ออกระบบ (' . Yii::app()->session['username'] . ')', 'url' => array('/User/Logout')),
            ),
        ));
        echo '</div>';
    }

}

?>
