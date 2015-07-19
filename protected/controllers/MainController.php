<?php

/*
 *  Main Controller for Control panel
 */

class MainController extends CController {

    public function init() {
        Yii::app()->theme = "admin";
    }

    public function actionIndex() {

        if (empty(Yii::app()->session['id'])) {
            $this->redirect(Yii::app()->params['MyBaseURL']);
        } elseif (Yii::app()->session['user_type'] == 1) {
            $data = array();
            $data["myValue"] = "Content Loaded";
            $this->render("/Main/index", $data);
        } else {
            $this->redirect(Yii::app()->params['MyBaseURL']);
        }
    }

    public function actionSetConfigForm($id = NULL) {
        //Yii::app()->theme = "admin";

        $mDB = "SetConfig";
        $msg_text = "";

        if (!empty($_POST['SetConfig'])) {
            //if (isset($_POST['yt0'])) {
            //$savetype = $_POST['savetype']; // check return when saved
            // ใช้ในกรณีแก้ไข
            $model = new SetConfig();
            $id = $_POST[$mDB] ['id'];
            if (!empty($id))
                $model = SetConfig::model()->findByPk($id);

            // Save Data to Database
            $model->attributes = $_POST[$mDB];
            $model->intro = $_POST['intro'];
            $model->howto = $_POST['howto'];
            $model->hope = $_POST['hope'];
            if ($model->save()) {
                $msg_text = "<div class='facebox-save-success'>บันทึกข้อมูลเรียบร้อย</div>";
                if (empty($id))
                    $id = Yii::app()->db->getLastInsertID();
            }
        }
        // ค้นหาและแสดงข้อมูลในฟอร์มเพื่อรอการแก้ไข
        $model = new SetConfig();
        if (!empty($id))
            $model = SetConfig::model()->findByPk($id);
        // Render Form
        $this->render("/Main/ConfigForm", array("model" => $model, "msg_text" => $msg_text));
    }

    public function actionSetTestType() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //$model = new NewsCon;
            $model = Tests::model()->findByPk($id);  // use whatever the correct class name is
            $model->flag = $_GET['type'];     //($model->hotnews == 1 ? 0 : 1);
            //$model->hotnews_date = new CDbExpression('NOW()');
            $model->save();
            return true;
        } else {
            return FALSE;
        }
    }
    
    //====================
    public function actionShowSummary() {
        $model = new Booking();
        $this->render('/Main/ShowSummary', array(
            'model' => $model,
        ));
    }

}

?>
