<?php
namespace app\models;
use \yii\db\Expression;
use yii\web\UploadedFile;

class Users extends \yii\db\ActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'users';
	}

	/**
	 * @return array primary key of the table
	 **/	 
	public static function primaryKey()
	{
		return array('user_id');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'ID',
			'salutation' => 'Salutation',
			'title' => 'Title',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'street' => 'Street',
			'streetnumber' => 'Street Number',
			'zip' => 'Zip',
			'city' => 'City',
			'description' => 'Description',	
			'photo' => 'Photo',	
		);
	}
	
	public function rules()
	{	
        return [
            [['salutation', 'title', 'firstname', 'lastname', 'street', 'streetnumber', 'zip', 'city', 'description'], 'required'],
            [['salutation', 'title', 'firstname', 'lastname', 'street', 'streetnumber', 'zip', 'city', 'description'], 'string'],  
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            
        ];	
	}	
	

	public function getBooklend()
	{	
	     return $this->hasMany(BookLend::className(), ['user_id' => 'user_id'])->with(['book']);
	}
	

}