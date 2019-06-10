<?php
namespace app\models;
use \yii\db\Expression;
use yii\web\UploadedFile;

class BookLend extends \yii\db\ActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'book_lend_track';
	}

	/**
	 * @return array primary key of the table
	 **/	 
	public static function primaryKey()
	{
		return array('lend_id');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lend_id' => 'ID',
			'book_id' => 'Book ID',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'special_notes' => 'Special Notes'
		);
	}
	
	public function rules()
	{	
        return [
            [['start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['book_id'], 'required'],
            [['book_id'], 'integer'],  
            [['special_notes'], 'string'],              
        ];
	}

	public function getBook()
	{	
        return $this->hasOne(Book::className(), ['book_id' => 'book_id']);
	}

}