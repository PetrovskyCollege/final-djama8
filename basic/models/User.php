<?php
 
namespace app\models;
 
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

 
/**
 * User model
 *
 * @property integer $id
 * @property string $login
 * @property string $name
 * @property string $password
 * @property string $birthday
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
 
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
 
    // /**
    //  * @inheritdoc
    //  */
    // public function rules()
    // {
    //     return [
    //         ['status', 'default', 'value' => self::STATUS_ACTIVE],
    //         ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
    //     ];
    // }
 
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
 
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
 
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($name)
    {
        return static::findOne(['name' => $name]);
    }
 
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
 
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
 
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
 
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
 
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)  
    {  
        return $this->password = Yii::$app->security->generatePasswordHash($password);  
    }
 
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }
 
}