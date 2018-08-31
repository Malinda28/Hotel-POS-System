<?php

/**
 * This is the model class for table "res_items".
 *
 * The followings are the available columns in table 'res_items':
 * @property integer $item_id
 * @property string $item_name
 * @property integer $regular_price
 * @property integer $large_price
 * @property string $item_description
 * @property string $category
 */
class Restaurant_items extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'res_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_name, regular_price, large_price, item_description, category', 'required'),
			array('category', 'numerical', 'integerOnly'=>true),
			array('item_name, category', 'length', 'max'=>65),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('item_id, item_name, regular_price, large_price, item_description, category', 'safe', 'on'=>'search'),
			array('item_name', 'match',
                'pattern' => '/^[a-zA-Z\s]+$/'
               ),
			  
			   
			   
			     array('item_name', 'unique', 'message' => "Item name already exists."),
		);
		 return[
			
        [['regular_price', 'large_price'], 'double'],];
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'ResCategory' => array(self::BELONGS_TO, 'ResCategory', 'category_id'),
	);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Itema',
			'item_name' => 'Item Name',
			'regular_price' => 'Regular Price',
			'large_price' => 'Large Price',
			'item_description' => 'Item Description',
			'category' => 'Category',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('regular_price',$this->regular_price);
		$criteria->compare('large_price',$this->large_price);
		$criteria->compare('item_description',$this->item_description,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Restaurant_items the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
