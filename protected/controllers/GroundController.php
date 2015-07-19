<?php

/*
 *  Ground Controller
 */

class GroundController extends Controller {

    // === Model Name
    public $mDB = "Ground";

    public function actionGroundListAll() {
        // Clear cache data Schema
        //Yii::app()->cache->flush();  
        Yii::app()->theme = "admin";
        $model = new Ground("search");
        $model->unsetAttributes();
        if (isset($_GET[$this->mDB])) {
            $model->attributes = $_GET[$this->mDB];
        }
        $this->render("/Ground/GroundList", array("model" => $model));
    }

    // ============== Udate Data ===============================
    public function actionGroundForm($id = NULL) {
        Yii::app()->theme = "admin";
        //$mDB = 'Student';
        $msg_text = "";

        if (!empty($_POST[$this->mDB])) {
            $savetype = $_POST['savetype']; // check return when saved
            // ใช้ในกรณีแก้ไข
            $model = new Ground();
            $id = $_POST[$this->mDB] ['id'];
            if (!empty($id)) {
                $model = Ground::model()->findByPk($id);
                $GroundFile = $model->pic;
            }

            // Check Old File
            $file = CUploadedFile::getInstance($model, 'pic');
            if ((is_object($file) && get_class($file) === 'CUploadedFile')) {
                $GroundFile = md5(time()) . '_pic.' . $file->getExtensionName();
                $model->pic = $GroundFile;
            } else {
                $model->pic = $GroundFile;
            }

            // Save Data to Database
            $folder = 'images/ground/';
            $model->attributes = $_POST[$this->mDB];
            if ($model->save()) {

                if ((is_object($file) && get_class($file) === 'CUploadedFile')) {
                    $file->saveAs($folder . $GroundFile);
                    $fname = $folder . $GroundFile;
                    $image = Yii::app()->image->load($fname);
                    //$image->resize(100, 100);
                    $image->save();
                }

                // Yii::app()->user->setFlash('register', 'บันทึกเรียบร้อย');
                if ($savetype == 1)
                    $this->redirect(array('Ground/GroundForm'));

                $msg_text = "<div class='facebox-save-success'>บันทึกข้อมูลเรียบร้อย</div>";
                // ตรวจสอบ id ถ้ามีค่าเป็นการแก้ไข
                // แต่ถ้าไม่มีค่าเป็นการเพิ่มใหม่
                if (empty($id))
                    $id = Yii::app()->db->getLastInsertID();
            }
        }
        // ค้นหาและแสดงข้อมูลในฟอร์มเพื่อรอการแก้ไข
        $model = new Ground();
        if (!empty($id))
            $model = Ground::model()->findByPk($id);
        // Render Form
        $this->render("/Ground/GroundForm", array("model" => $model, "msg_text" => $msg_text));
    }

    // ================ DElete Data ========================
    public function actionDelete($id = NULL) {
        Yii::app()->theme = "admin";
        if (!empty($id)) {
            $model = Ground::model()->deleteByPk($id);
        }
        $this->redirect(array('/Ground/GroundListAll'));
    }

}

?>
