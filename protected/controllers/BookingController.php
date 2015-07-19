<?php

/*
 *  Booking Controller
 */

class BookingController extends Controller {

    // === Model Name
    public $mDB = "Booking";

    public function init() {
        Yii::app()->theme = "admin";
    }

    public function actionBookingListAll() {
        // Clear cache data Schema
        //Yii::app()->cache->flush();  
        $model = new Booking("search");
        $model->unsetAttributes();
        if (isset($_GET[$this->mDB])) {
            $model->attributes = $_GET[$this->mDB];
        }
        $this->render("/Booking/BookingListAll", array("model" => $model));
    }

    /*
      public function actionGroundBookingListAll() {
      //$model = new Booking();
      Yii::app()->theme = "admin";
      $critiria = new CDbCriteria();
      $critiria->condition = 'ConfirmFlag=0';
      $critiria->order = 'ground_id, BookDate';
      //$critiria->params = array(':id' => $id);
      $model = Booking::model()->findAll($critiria);

      //$GroundModel = Ground::model()->findByPk($id);
      $this->render('/Ground/GroundBookingListAll', array(
      'model' => $model,
      //'GroundModel' => $GroundModel,
      //'booking' => $booking,
      //'id'=>$id,
      ));
      }
     * 
     */

    //=================== ยกเลิกการจองสนาม ============================

    public function actionBookingCancel($id = NULL) {
        if (!empty($id)) {
            $model = Booking::model()->deleteByPk($id);
        }
        $this->redirect(array('/Booking/BookingListAll'));
    }

    //================== ชำระเงิน และใช้บริการ =================================

    public function actionBookingComplete($id = NULL) {
        //$result = Booking::model()->($id);
        yii::app()->db
                ->createCommand("UPDATE booking SET ConfirmFlag=1 WHERE id=:id")
                ->bindValues(array(':id' => $id))
                ->execute();
        return true;
        //$this->redirect(array('/Ground/GroundBookingListAll'));
    }

}

?>