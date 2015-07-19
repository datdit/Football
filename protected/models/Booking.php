<?php

/*
 *    Booking Ground
 */

class Booking extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'booking';
    }

    public function relations() {
        return array(
            'members' => array(self::BELONGS_TO, 'Member', 'member_id'),
            'grounds' => array(self::BELONGS_TO, 'Ground', 'ground_id'),
        );
        //parent::relations();
    }

    public function rules() {
        return array(
            array('BookDate', 'type', 'type' => 'date', 'dateFormat' => 'yyyy-MM-dd'),
            array('BookStart, BookEnd, member_id, ground_id, ConfirmFlag, total_hour, total_money', 'numerical'),
            array('id, BookDate', 'safe', 'on' => 'search'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('member_id', $this->member_id, true);
        $criteria->compare('ground_id', $this->ground_id, true);
        $criteria->compare('ConfirmFlag', $this->ConfirmFlag, true);
        $criteria->compare('ฺBookDate', $this->BookDate, true);
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id ASC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
            )
        ));
    }

    //======== กำหนดเงื่อนไขให้สอดคล้องกับ Search ด้านบน เพื่อให้ผลลัพธ์เปลี่ยนตาม
    public function getSearchCriteria() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('member_id', $this->member_id, true);
        $criteria->compare('ground_id', $this->ground_id, true);
        $criteria->compare('ConfirmFlag', $this->ConfirmFlag, true);
        return $criteria;
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ground_id' => 'สนามที่',
            'BookDate' => 'วันที่จองสนาม',
            'BookStart' => 'เวลาเริ่ม (นาฬิกา)',
            'BookEnd' => 'ถึงเวลา (นาฬิกา)',
            'total_hour' => 'จำนวนชั่วโมง',
            'total_money' => 'จำนวนเงิน (บาท)',
            'member_id' => 'สมาชิก',
            'ConfirmFlag' => 'สถานะ'
        );
    }

    public function getTime() {
        return array(
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            13 => 13,
            14 => 14,
            15 => 15,
            16 => 16,
            17 => 17,
            18 => 18,
            19 => 19,
            20 => 20,
            21 => 21,
            22 => 22
        );
    }

    //======= แสดงสถานะของการจองสนาม =======================
    static public function getFlag($isConfirmFlag) {
        if ($isConfirmFlag == 1)
        //return CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/ok.png");
            return '<font color="green">ใช้บริการแล้ว</font>';
        else
        //return CHtml::image(Yii::app()->theme->baseUrl . "/css/gridViewStyle/icon/gr-delete.png");
            return '<font color="red">จอง</font>';
    }

    // ================ Check Duplicate ================
    // สนาม , วันที่  , เวลา
    static public function ChkDuplicate($id, $bDate, $bTime1, $bTime2) {
        $isDup = FALSE;   // True = จองซ็ำ  จองวันเวลาดังกล่าวไม่ได้
        // กรองข้อมูลวันที่และสนาม
        $criteria = new CDbCriteria();
        $criteria->condition = 'ground_id=:id AND BookDate=:bDate AND ConfirmFlag=0';
        $criteria->params = array(':id' => $id, ':bDate' => $bDate);
        $model = Booking::model()->findAll($criteria);

        //เช็คเวลาที่จอง
        foreach ($model as $rw) {
            if (($bTime1 >= $rw->BookStart) and ( $bTime1 < $rw->BookEnd)) {
                // BookStart อยู่ระย่าง เวลาที่เลือกไว้  เวลาที่จองไว้ เล่น 10-12 นาฬิกา
                // ex.  10 -12 , ทำงานในส่วนนี้เมื่อ BookStart อยู่ระว่าง 10 -11 นาฬิกา
                $isDup = TRUE;
                break;
            } else {
                // ทำงานในส่วนี้เมื่อ BookStart น้อยกว่า 10 (9 ลงมา) และ ฺBookStart มากกว่า 12 (13 ขั้นไป)
                // ถ้า BookStart มากกว่าแสดงว่าว่างจองได้เลย 
                // แต่ถ้าน้อยกว่า ต้องตรวจสอบ BookEnd ช่วงเวลาไปทับช่วง 10 -12 หรือไม่  (11 ขึ้นไป)
                if  (($bTime1 < $rw->BookStart) and ($bTime2 > $rw->BookStart)) {
                    $isDup = TRUE;
                    break;
                }
            }
        }

        return $isDup;
    }

    //=========  หาผลรวม จำนวนเงิน ===============
    public function totals() {
        $criteria = $this->getSearchCriteria();
        $criteria->select = 'SUM(total_money)';
        return '<p align=right><b>' . number_format($this->commandBuilder->createFindCommand($this->getTableSchema(), $criteria)->queryScalar()) . '</b></p>';
    }

    //===== Total ==============
    /*
      public function getTotalMoney() {

      $cmd = Yii::app()->db->createCommand()
      ->select('SUM(total_money)')
      ->from($this->tableName())
      ->andWhere('BookDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)')
      ->andWhere('BookDate <= DATE_SUB(CURDATE(), INTERVAL 1 DAY)');

      return $cmd->queryScalar();
      =========

      $criteria2 = new CDbCriteria();
      $criteria2->addInCondition('BookDate', array(null));
      $criteria2->addBetweenCondition('BookDate', date('Y-m-d'), '2014-05-25', 'OR');

      $criteria3 = new CDbCriteria();
      $criteria3->addInCondition('BookDate', array(null), 'AND');
      $criteria3->addBetweenCondition('BDate', '1990-01-01', date('Y-m-d'), 'OR');

      $criteria3->mergeWith($criteria2);
      }
     * 
     */
}

?>