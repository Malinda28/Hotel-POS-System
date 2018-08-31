<?php

/**
 * This is the model class for table "room".
 *
 * The followings are the available columns in table 'room':
 * @property integer $room_no
 * @property string $availability
 * @property string $type
 * @property string $Discription
 * @property integer $max_adults
 * @property integer $max_children
 */
class Room extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'room';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('room_no, type', 'required'),
            array('room_no', 'numerical', 'integerOnly'=>true),
            //array('availability', 'length', 'max'=>15),
            array('type', 'length', 'max'=>10),
           // array('Discription', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('room_no, availability, type, Discription, max_adults, max_children', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'room_no' => 'Room No',
            'availability' => 'Availability',
            'type' => 'Type',
            'Discription' => 'Discription',
            'max_adults' => 'Max Adults',
            'max_children' => 'Max Children',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('room_no',$this->room_no);
        $criteria->compare('availability',$this->availability,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('Discription',$this->Discription,true);
        $criteria->compare('max_adults',$this->max_adults);
        $criteria->compare('max_children',$this->max_children);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Room the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}