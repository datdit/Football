<?php

/*
 *   Member for Registration
 */

class MemberRegis extends CActiveRecord {

    public $password2;
    //public $verifyCode;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'members';
    }

    public function rules() {
        return array(
            array('username, password, fullname, email, mobile, password2', 'required'),
            array('mobile', 'length', 'max' => 20),
            array('address', 'length', 'max' => 200),
            array('username, password', 'length', 'max' => 50),
            array('fullname, email, pic', 'length', 'max' => 100),
            array('username', 'unique'),
            array('password', 'compare', 'compareAttribute' => 'password2'),
            // email has to be a valid email address
            //array('email', 'email'),
            // verifyCode needs to be entered correctly
            //array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'insert'),
        );
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
            'verifyCode' => 'รหัสป้องกัน'
        );
    }
    

}

?>
