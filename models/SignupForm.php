<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $name;
    public $username;    
    public $email;
    public $password;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],            
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\Admin', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
       //echo "AAA";exit;
        $admin = new Admin();
        $admin->name = $this->name;        
        $admin->username = $this->username;
        $admin->email = $this->email;
        $admin->setPassword($this->password);
        $admin->generateAuthKey();
        return $admin->save() ? $admin : null;
    }
 
}