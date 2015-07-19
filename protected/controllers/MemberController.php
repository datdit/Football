<?php

/*
 *   Member Controller
 */

class MemberController extends Controller {

    // === Model Name
    public $mDB = "Member";

    public function actionMemberListAll() {
        // Clear cache data Schema
        //Yii::app()->cache->flush();  
        Yii::app()->theme = "admin";
        $model = new Member("search");
        $model->unsetAttributes();
        if (isset($_GET[$this->mDB])) {
            $model->attributes = $_GET[$this->mDB];
        }
        $this->render("/Member/MemberList", array("model" => $model));
    }

    // ============== Udate Student Data ===============================
    public function actionMemberForm($id = NULL) {
        Yii::app()->theme = "admin";
        //$mDB = 'Student';
        $msg_text = "";

        if (!empty($_POST[$this->mDB])) {
            $savetype = $_POST['savetype']; // check return when saved
            // ใช้ในกรณีแก้ไข
            $model = new Member;
            $id = $_POST[$this->mDB] ['id'];
            if (!empty($id)) {
                $model = Member::model()->findByPk($id);
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
            $folder = 'images/avatar/';
            $model->attributes = $_POST[$this->mDB];
            if ($model->save()) {

                if ((is_object($file) && get_class($file) === 'CUploadedFile')) {
                    $file->saveAs($folder . $GroundFile);
                    $fname = $folder . $GroundFile;
                    $image = Yii::app()->image->load($fname);
                    $image->resize(100, 100);
                    $image->save();
                }

                // Yii::app()->user->setFlash('register', 'บันทึกเรียบร้อย');
                if ($savetype == 1)
                    $this->redirect(array('Member/MemberForm'));

                $msg_text = "<div class='facebox-save-success'>บันทึกข้อมูลเรียบร้อย</div>";
                // ตรวจสอบ id ถ้ามีค่าเป็นการแก้ไข
                // แต่ถ้าไม่มีค่าเป็นการเพิ่มใหม่
                if (empty($id))
                    $id = Yii::app()->db->getLastInsertID();
            }
        }
        // ค้นหาและแสดงข้อมูลในฟอร์มเพื่อรอการแก้ไข
        $model = new Member;
        if (!empty($id))
            $model = Member::model()->findByPk($id);
        // Render Form
        $this->render("/Member/MemberForm", array("model" => $model, "msg_text" => $msg_text));
    }

    public function actionDelete($id = NULL) {
        Yii::app()->theme = "admin";
        if (!empty($id)) {
            $model = Member::model()->deleteByPk($id);
        }
        $this->redirect(array('/Member/MemberListAll'));
    }

}

?>
