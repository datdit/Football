<?php

/*
 *   Ground Model
 */

class Ground extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'ground';
    }

        public function rules() {
        return array(
            array('GroundName, Price', 'required'),
            array('GroundName', 'length', 'max' => 50),
            array('GroundDesc', 'length', 'max' => 200),
            array('Price', 'numerical'),
            array('pic',
                'file',
                'types' => 'jpg, gif, png',
                'allowEmpty' => true,
                'maxSize' => 2 * 1024 * 1024,
                'on' => 'insert, update',
                'tooLarge' => 'The file was larger than 512 Kb. Please upload a smaller file.',
                'wrongType' => 'Please upload only images in the format jpg, gif, png',
            ),
            array('id, GroundName', 'safe', 'on' => 'search'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('GroundName', $this->GroundName, true);
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
            'GroundName' => 'ชื่อสนาม',
            'GroundDesc' => 'รายละเอียด',
            'Price' => 'ค่าเช่า/ชม.',
            'pic' => 'ภาพสนาม',
        );
    }
    
            // Return array Dropdown
    public function getListGround() {
        return CHtml::listData($this->findAll(array('order' => 'GroundName')), 'id', 'GroundName');
    }

}

?>
