<?php

/**
 * This is the model class for table "kitchen_ingrediants".
 *
 * The followings are the available columns in table 'kitchen_ingrediants':
 * @property integer $ingrediant_id
 * @property string $ingrediant_name
 * @property integer $ingrediant_qty
 * @property string $unit
 */
class KitchenIngrediants extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kitchen_ingrediants';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' ingrediant_name, ingrediant_qty, unit', 'required'),
			array(' ingrediant_qty', 'numerical', 'integerOnly'=>true),
			array('ingrediant_name', 'length', 'max'=>15),
			array('unit', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ingrediant_id, ingrediant_name, ingrediant_qty, unit', 'safe', 'on'=>'search'),
			array('ingrediant_name', 'match',
                'pattern' => '/^[a-zA-Z\s]+$/'
               ),
			  
		
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
			'ingrediant_id' => 'Ingrediant',
			'ingrediant_name' => 'Ingrediant Name',
			'ingrediant_qty' => 'Ingrediant Qty',
			'unit' => 'Unit',
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

		$criteria->compare('ingrediant_id',$this->ingrediant_id);
		$criteria->compare('ingrediant_name',$this->ingrediant_name,true);
		$criteria->compare('ingrediant_qty',$this->ingrediant_qty);
		$criteria->compare('unit',$this->unit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KitchenIngrediants the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
