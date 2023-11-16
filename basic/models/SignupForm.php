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
    public $login;
    public $password;
    public $birthday;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This name has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['login', 'trim'],
            ['login', 'required'],
            ['birthday','required'],
            ['login', 'string', 'max' => 255],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This login address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 3],
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
 
        $user = new User();
        $user->name = $this->name;
        $user->login = $this->login;
        $user->birthday = $this->birthday;
        $user->password = $user->setPassword($this->password);  
        $user->auth_key = $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}