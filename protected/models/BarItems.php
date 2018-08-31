<?php

/**
 * This is the model class for table "bar_items".
 *
 * The followings are the available columns in table 'bar_items':
 * @property integer $bar_item_id
 * @property string $beverage_name
 * @property integer $volume
 * @property integer $category
 * @property string $price_25ml
 * @property string $price_50ml
 * @property string $price_100ml
 * @property string $price_300ml
 * @property string $price_750ml
 * @property string $price_1000ml
 */
class BarItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bar_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('beverage_name, volume, category', 'required'),
			
			array('volume', 'numerical', 'integerOnly'=>true),
			array('beverage_name', 'length', 'max'=>10),
			array('price_25ml, price_50ml, price_100ml, price_300ml, price_750ml, price_1000ml', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('beverage_name, volume, category, price_25ml, price_50ml, price_100ml, price_300ml, price_750ml, price_1000ml', 'safe', 'on'=>'search'),
			array('beverage_name', 'match',
                'pattern' => '/^[a-zA-Z\s]+$/'
               ),
			   array('beverage_name', 'unique', 'message' => "Beverage name already exists."),
		);
		  
		  return[
			
        [['price_25ml', 'price_50ml',' price_100ml',' price_300ml', 'price_750ml', 'price_1000ml'], 'double'],];
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
			
			'beverage_name' => 'Beverage Name',
			'volume' => 'Volume',
			'category' => 'Category',
			'price_25ml' => 'Price 25ml',
			'price_50ml' => 'Price 50ml',
			'price_100ml' => 'Price 100ml',
			'price_300ml' => 'Price 300ml',
			'price_750ml' => 'Price 750ml',
			'price_1000ml' => 'Price 1000ml',
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

		$criteria->compare('bar_item_id',$this->bar_item_id);
		$criteria->compare('beverage_name',$this->beverage_name,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('category',$this->category);
		$criteria->compare('price_25ml',$this->price_25ml,true);
		$criteria->compare('price_50ml',$this->price_50ml,true);
		$criteria->compare('price_100ml',$this->price_100ml,true);
		$criteria->compare('price_300ml',$this->price_300ml,true);
		$criteria->compare('price_750ml',$this->price_750ml,true);
		$criteria->compare('price_1000ml',$this->price_1000ml,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
