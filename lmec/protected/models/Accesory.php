<?php

/**
 * This is the model class for table "tbl_accesory".
 *
 * The followings are the available columns in table 'tbl_accesory':
 * @property string $id
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property AccesoryOrder[] $accesoryOrders
 * @property EquipmentTypeAccesory[] $equipmentTypeAccesories
 */
class Accesory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Accesory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_accesory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, active', 'safe', 'on'=>'search'),
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
			'accesoryOrders' => array(self::HAS_MANY, 'AccesoryOrder', 'accesory_id'),
			'equipmentTypeAccesories' => array(self::HAS_MANY, 'EquipmentTypeAccesory', 'accesory_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'active' => 'Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		//$criteria->compare('active',$this->active);
                $criteria->condition = 'active = 1'; 	//mostrar solo los activos

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}