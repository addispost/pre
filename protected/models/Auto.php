<?php

/**
 * This is the model class for table "Auto".
 *
 * The followings are the available columns in table 'Auto':
 * @property integer $id
 * @property string $model_code
 * @property string $title
 * @property integer $create_id
 * @property string $create_time
 * @property string $update_time
 * @property string $modify_user_id
 * @property string $group
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $create
 */
class Auto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Auto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, create_id, create_time, update_time, status', 'required'),
			array('id, create_id, status', 'numerical', 'integerOnly'=>true),
			array('model_code, title', 'length', 'max'=>255),
			array('modify_user_id, group', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, model_code, title, create_id, create_time, update_time, modify_user_id, group, status', 'safe', 'on'=>'search'),
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
			'create' => array(self::BELONGS_TO, 'User', 'create_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'model_code' => 'Model Code',
			'title' => 'Title',
			'create_id' => 'Create',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'modify_user_id' => 'Modify User',
			'group' => 'Group',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('model_code',$this->model_code,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('create_id',$this->create_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('modify_user_id',$this->modify_user_id,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Auto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
