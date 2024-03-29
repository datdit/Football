<?php

/**
 * StudentIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class MemberIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        /*
          $users = array(
          // username => password
          'demo' => 'demo',
          'admin' => 'admin',
          );
         * 
         */

        $attributes = array();
        $attributes['username'] = $this->username;
        $attributes['password'] = $this->password;
        $model = Member::model()->findByAttributes($attributes);
        //$model = $user->findByAttributes($attributes);

        if (!empty($model)) {
            $this->errorCode = self::ERROR_NONE;
            //Yii::app()->session['ses_id'] = md5(rand(1,1000));
            $date = new DateTime();
            Yii::app()->session['ses_id'] = md5($date->getTimestamp());
            Yii::app()->session['id'] = $model->id;
            Yii::app()->session['username'] = $model->username;
            Yii::app()->session['user_type'] = $model->user_type;
            Yii::app()->user->setState('isUser', true);
        } else {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        return !$this->errorCode;
        /*
          if (!isset($users[$this->username]))
          $this->errorCode = self::ERROR_USERNAME_INVALID;
          else if ($users[$this->username] !== $this->password)
          $this->errorCode = self::ERROR_PASSWORD_INVALID;
          else
          $this->errorCode = self::ERROR_NONE;
          return !$this->errorCode;
         * 
         */
    }

}