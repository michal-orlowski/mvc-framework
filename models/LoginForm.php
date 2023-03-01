<?php

namespace app\models; 
use morlowsk\corephp\Application;
use morlowsk\corephp\Model;

/**
 * Summary of LoginForm
 * @author Michal Orlowski
 * @copyright (c) 2023
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password ='';

	/**
	 * @return array
	 */
	public function rules(): array 
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email address',
            'password' => 'Password'
        ];
    }
    public function login()
    {
        //$user = new User;
        //$user->findOne(['email' => $this->email]);
        $user = User::findOne(['email' => $this->email]);

        

        if (!$user) {
            $this->addError('email', 'User does not exist with this email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

      
        return Application::$app->login($user);
    }
}