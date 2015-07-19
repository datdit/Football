<?php

class HomeController extends Controller {

    public function init() {
        Yii::app()->theme = "front";
    }

// ==================== Activate CCaptcha ===================
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'testLimit' => 2,
            ),
        );
    }

    public function actionIndex() {
        // Clear cache data Schema
        Yii::app()->cache->flush();
        $this->render("/Home/index");
    }

    // ========================= Login ======================

    public function actionLogin() {
        $model = new MemberLoginForm();
        // collect user input data
        if (isset($_POST['MemberLoginForm'])) {
            $model->attributes = $_POST['MemberLoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                // Check User Logout time ago or Not.
                $criteria = new CDbCriteria();
                $criteria->condition = "id=:id";
                $criteria->params = array(':id' => Yii::app()->session['id']);
                $criteria->order = "id DESC";
                //$this->redirect(Yii::app()->user->returnUrl);
                $this->render('/Home/index');
            }
        }
        $this->render("/Home/index");
    }

    // =========================== LOgout =================
    public function actionLogout() {
        unset(Yii::app()->session['ses_id']);
        unset(Yii::app()->session ["id"]);
        unset(Yii::app()->session ["username"]);
        $this->redirect(Yii::app()->homeUrl);
    }

    // =================== ลงทะเบียนผุ้ใช้ที่หน้าแรกของเว็บ =====================
    public function actionRegistration() {
        $RegisModel = new MemberRegis();
        if (isset($_POST['MemberRegis'])) {
            $RegisModel->attributes = $_POST['MemberRegis'];
            if ($RegisModel->validate()) {
                //$StdModel->stdclass = $_POST['StudentRegis']['stdclass'];
                $RegisModel->save();
                Yii::app()->user->setFlash('register', '<center>ขอบคุณสำหรบการลงทะเบียน<br><br>ท่านสามารถ Login เข้าระบบได้แล้ว</center>');
                $this->refresh();
            }
        }
        $this->render('/Home/Registration', array('RegisModel' => $RegisModel));
    }

    // ====================== แก้ไขข้อมูลส่วนตัว =====================
    public function actionProfile($id = null) {
        $model = new Member("search");
        $avatar_name = "";

        if (isset($_POST['Member'])) {
            $id = $_POST['id'];
            $model = Member::model()->findByPk($id);
            $OldFile = $model->pic;

            // Check Old File
            $file = CUploadedFile::getInstance($model, 'pic');
            if ((is_object($file) && get_class($file) === 'CUploadedFile')) {
                $avatar_name = $id . '_pic.' . $file->getExtensionName();
                $model->pic = $avatar_name;
            } else {
                $model->pic = $OldFile;
            }

            $folder = 'images/avatar/';
            $model->attributes = $_POST['Member'];
            if ($model->save()) {
                if ((is_object($file) && get_class($file) === 'CUploadedFile')) {
                    $file->saveAs($folder . $avatar_name);
                    $fname = $folder . $avatar_name;
                    $image = Yii::app()->image->load($fname);
                    $image->resize(100, 100);
                    $image->save();
                }
                Yii::app()->user->setFlash('register', "<center>&nbsp;<br>แก้ไขข้อมูลเรียบร้อย<br>&nbsp;</center>");
            }
        }
        if (!empty($id))
            $model = Member::model()->findByPk($id);
        $this->render('/Home/MemberProfile', array('model' => $model));
    }

    // ====================== เปลี่ยน Password =====================
    public function actionPassword() {
        $model = new MemberChangePWD();
        if (isset($_POST['MemberChangePWD'])) {
            if (isset($_POST['id'])) {
                $model = MemberChangePWD::model()->findByPk($_POST['id']);
                $model->attributes = $_POST['MemberChangePWD'];
                if ($model->validate()) {
                    $model->save();
                    Yii::app()->user->setFlash('register', '<center><br>คุณเปลี่ยนรหัสผ่านเรียบร้อย<br>&nbsp;</center>');
                    $this->refresh();
                }
            }
        }

        $this->render('/Home/Password', array('model' => $model));
    }

    // ==================== ข้อกำหนด ==============================
    public function actionLaw() {
        $this->render('/Home/Law');
    }

    // ==================== ติดต่อเรา ==============================
    public function actionContact() {
        $this->render('/Home/Contact');
    }

// ==================== Ground List =============================
    public function actionGroundList() {
        $model = Ground::model()->findAll();
        $this->render('/Home/GroundList', array('model' => $model));
    }

    // ==================== Booking =============================
    public function actionBooking($id = NULL) {
        $id = $_GET['id'];
        $model = new Booking();

        $critiria = new CDbCriteria();
        $critiria->condition = 'ground_id=:id';
        $critiria->order = 'BookDate, BookStart';
        $critiria->params = array(':id' => $id);
        $booking = Booking::model()->findAll($critiria);

        $GroundModel = Ground::model()->findByPk($id);
        $this->render('/Home/Booking', array(
            'model' => $model,
            'GroundModel' => $GroundModel,
            'booking' => $booking,
                //'id'=>$id,
        ));
    }

    // ============= Calculate Hour ======================
    public function actionCalHour() {
        $est = $_POST['BookEnd'] - $_POST['BookStart'];
        $price = $_POST['price'] * $est;
        //echo CHtml::encode(print_r($est));
        echo 'จำนวนชั่วโมง : ' . $est . ' ชั่วโมง <br />คิดเป็นเงิน : ' . number_format($price) . ' บาท';
    }

    // ================ Confirm Booking ===================

    public function actionConfirmBooking() {
        $model = new Booking();
        if (isset($_POST['submit'])) {

            //=== Convert String 2014-05-29 to Date Format yyyy-mm-dd
            $mDate = $_POST['BookDate'];
            $dd1 = strtotime($mDate);
            $dd2 = date('Y-m-d', $dd1);

            $isDup = Booking::model()->ChkDuplicate($_POST['ground_id'], $dd2, $_POST['BookStart'], $_POST['BookEnd']);

            // ถ้าข้อมูลไม่ซ้ำ บ้นทึกได้
            if ($isDup == FALSE) {
                $model->BookDate = $dd2;
                $model->BookStart = $_POST['BookStart'];
                $model->BookEnd = $_POST['BookEnd'];
                $model->total_hour = $_POST['BookEnd'] - $_POST['BookStart'];
                $model->total_money = ($_POST['BookEnd'] - $_POST['BookStart']) * $_POST['price'];
                $model->member_id = Yii::app()->session['id'];
                $model->ground_id = $_POST['ground_id'];
                $model->save();
                //$msg_text = "Yes";
                Yii::app()->user->setFlash('register', '<center><br>การจองสนามเรียบร้อย<br>&nbsp;</center>');
                $this->render('/Home/BookingYes');
            } else {
                Yii::app()->user->setFlash('register', '<center><br />เกิดความผิดพลาด<br />ไม่สามารถการจองสนามได้<br />&nbsp;</center>');
                $this->render('/Home/BookingNo');
            }
        }
    }

    //==============  ข้อมูลการจองของ User ========================
    public function actionShowBooking() {
        $id = Yii::app()->session['id'];
        $criteria = new CDbCriteria();
        $criteria->condition = 'member_id=:id AND ConfirmFlag=0';
        $criteria->order = 'BookDate, BookStart';
        $criteria->params = array(':id' => $id);

        $model = Booking::model()->findAll($criteria);
        $this->render('/Home/ShowBooking', array('model' => $model));
    }

// ============== Delete Booking =================
    public function actionBookingDelete($id = NULL) {
        $result = Booking::model()->deleteByPk($id);
        $this->redirect(array('/Home/ShowBooking'));
    }

    /**
     * Performs the AJAX validation.
     * @param Members2 $model the model to be validated
     */
    /*
      protected function performAjaxValidation($model) {
      if (isset($_POST['ajax']) && $_POST['ajax'] === 'myform') {
      //echo CActiveForm::validate($model);
      echo $total_hour;
      Yii::app()->end();
      }
      }
     * 
     */
}

?>
