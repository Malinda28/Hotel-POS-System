<?php

/**
 * This is the model class for table "other_ei".
 *
 * The followings are the available columns in table 'other_ei':
 * @property integer $yearmonth
 * @property string $sales
 * @property string $costofsales
 * @property string $otherincome
 * @property string $admin_exp
 * @property string $sales_disexp
 * @property string $financial_exp
 */
class OtherEi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'other_ei';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yearmonth, sales, costofsales, otherincome, admin_exp, sales_disexp, financial_exp', 'required'),
			array('yearmonth', 'numerical', 'integerOnly'=>true),
		
			array('sales, costofsales, otherincome, admin_exp, sales_disexp, financial_exp', 'length', 'max'=>14),
			
			array('yearmonth', 'length', 'max'=>6,'min'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('yearmonth, sales, costofsales, otherincome, admin_exp, sales_disexp, financial_exp', 'safe', 'on'=>'search'),
			array('yearmonth', 'unique', 'message' => "Year / Month already exists."),

			
		);
		   
		  return[
			
        [['sales',' costofsales',' otherincome', 'admin_exp', 'sales_disexp', 'financial_exp'], 'double'],
		
    ];

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
			'yearmonth' => 'Year / Month',
			'sales' => 'Sales',
			'costofsales' => 'Cost of sales',
			'otherincome' => 'Other Income',
			'admin_exp' => 'Administration Expenses',
			'sales_disexp' => 'Sales and Distribution Expenses',
			'financial_exp' => 'Financial Expenses',
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

		$criteria->compare('yearmonth',$this->yearmonth);
		$criteria->compare('sales',$this->sales,true);
		$criteria->compare('costofsales',$this->costofsales,true);
		$criteria->compare('otherincome',$this->otherincome,true);
		$criteria->compare('admin_exp',$this->admin_exp,true);
		$criteria->compare('sales_disexp',$this->sales_disexp,true);
		$criteria->compare('financial_exp',$this->financial_exp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OtherEi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
