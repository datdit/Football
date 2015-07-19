<?php

class ShowMember extends CWidget {

    public $model;

    public function init() {
        parent::init();
    }

    public function run() {
        $m_name = $this->model->fullname ;

        echo "<center>";
        if (empty($this->model->pic)) {
            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/User.png");
        } else {
            echo CHtml::image("./images/avatar/" . $this->model->pic);
        }
        echo "</center>";
        echo "<br><b>User : </b>" . $this->model->username . " (" . $this->model->id . ")";
        echo "<br><b>ชื่อ : </b>" . $m_name . "";
        echo "<div class='pic_person_area'>";
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/person.jpg", '', array('class' => 'pic_person')), array('/Home/Profile', 'id' => Yii::app()->session['id']));
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/detail.jpg", '', array('class' => 'pic_person')), array('/Home/ShowBooking'));
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/key.jpg", '', array('class' => 'pic_person')), array('/Home/Password'));

        // ตรวจสอบว่าเป็น Admin
        if (Yii::app()->session['user_type'] == 1) {
            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/config.png", '', array('class' => 'pic_person')), array('/Main'));
        }
        
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/logout.jpg", '', array('class' => 'pic_person')), array('/Home/Logout'));
        echo "</div>";

        parent::run();
    }

}

?>