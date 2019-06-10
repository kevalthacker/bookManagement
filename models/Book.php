<?php
namespace app\models;
use \yii\db\Expression;
use yii\web\UploadedFile;

class Book extends \yii\db\ActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'book';
	}

	/**
	 * @return array primary key of the table
	 **/	 
	public static function primaryKey()
	{
		return array('book_id');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'book_id' => 'ID',
			'book_title' => 'Book Title',
			'book_author' => 'Book Author',
			'book_published_year' => 'Book Published Year',
			'book_img' => 'Book Image',
			'book_inventory' => 'Book Inventory',
		);
	}
	
	public function rules()
	{	
        return [
            [['book_title', 'book_author'], 'required'],
            [['book_title', 'book_author'], 'string'],  
            [['book_published_year', 'book_inventory'], 'required'],
            [['book_published_year', 'book_inventory'], 'integer'],              
            [['book_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            
        ];
	}


}