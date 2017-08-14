<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 16:34
 */
namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message' => '用户名不能为空'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],


            ['password', 'required','message' => '密码不能为空'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
//            $user->email = $this->email;
            $user->setPassword($this->password);
//            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}