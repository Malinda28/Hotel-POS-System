<?php

/**
 * This is the model class for table "steward".
 *
 * The followings are the available columns in table 'steward':
 * @property integer $steward_id
 * @property string $name
 * @property string $gender
 * @property string $availability
 */
class Steward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'steward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, status', 'required'),
			array('Gender', 'required'),			
			array('Name', 'length', 'max'=>30),
			array('Gender', 'length', 'max'=>20),
			array('status', 'length', 'max'=>50),
			array('Name', 'match',
                'pattern' => '/^[a-zA-Z\s]+$/'
               ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Name, Gender, status', 'safe', 'on'=>'search'),
			
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
			'Name' => 'Name',
			'Gender' => 'Gender',
			'status' => 'Availability',
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

		$criteria->compare('steward_id',$this->steward_id);
		$criteria->compare('Name',$this->name,true);
		$criteria->compare('Gender',$this->gender,true);
		$criteria->compare('status',$this->availability,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Steward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
