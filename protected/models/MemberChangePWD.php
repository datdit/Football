<?php

/*
 *   Member Change Password Model for Registration
 */

class MemberChangePWD extends CActiveRecord {

    public $pwd;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'members';
    }

    public function rules() {
        return array(
            array('password, pwd', 'required'),
            array('password', 'compare', 'compareAttribute' => 'pwd'),
        );
    }

    public function attributeLabels() {
        return array(
            'password' => 'Password',
            'pwd' => 'Confirm Password',
        );
    }

}

?>
