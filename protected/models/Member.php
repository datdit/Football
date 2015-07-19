<?php

/*
 *   Student Model
 */

class Member extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'members';
    }
    
    
    /*
      public function relations() {
      return array(
      'testscore' => array(self::HAS_MANY, 'TestScore', 'student_id'),
      'lesstestscore' => array(self::HAS_MANY, 'LessTestScore', 'student_id'),
      'lessworkscore' => array(self::HAS_MANY, 'LessWorkScore', 'student_id'),
      'studentloginlog' => array(self::HAS_MANY, 'StudentLoginLog', 'student_id')
      );
      //parent::relations();
      }
     * 
     */

    public function rules() {
        return array(
            array('username, password, fullname, email, mobile', 'required'),
            //array('name, email', 'required'),
            array('mobile', 'length', 'max' => 20),
            array('address', 'length', 'max' => 200),
            array('username, password', 'length', 'max' => 50),
            array('fullname, email, pic', 'length', 'max' => 100),
            array('username', 'unique'),
            array('pic',
                'file',
                'types' => 'jpg, gif, png',
                'allowEmpty' => true,
                'maxSize' => 2 * 1024 * 1024,
                'on' => 'insert, update',
                'tooLarge' => 'The file was larger than 512 Kb. Please upload a smaller file.',
                'wrongType' => 'Please upload only images in the format jpg, gif, png',
            ),
            //array('lastupdate', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert, update'),
            array('id, fullname, email, mobile', 'safe', 'on' => 'search'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('mobile', $this->mobile, true);
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

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'UserName',
            'password' => 'Password',
            'password2' => 'Confirm Password',
            'fullname' => 'ชื่อสกุล',
            'address' => 'ที่อยู่',
            'email' => 'E-mail',
            'mobile' => 'มือถือ',
            'pic' => 'ภาพประจำตัว',
        );
    }
    
        // Return array Dropdown
    public function getListMember() {
        return CHtml::listData($this->findAll(array('order' => 'fullname')), 'id', 'fullname');
    }


}

?>
