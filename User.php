<?php
session_start();

class User
{
    private $id;
    private $pass;
    public $name = '';
    public $surname = '';
    public $email = '';


	public function __construct($email = '')
	{
	    if (!empty($email)) {
            foreach (self::getUsers() as $key => $user) { // self равен вызову метода this
                if($email == $user['email']){
                    $this->id = $key;
                    $this->name = $user['name'];
                    $this->surname = $user['surname'];
                    $this->email = $user['email'];
                    $this->pass = $user['password'];
                }
            }
        }
	}

    public function autendificated($pass)
    {
    	if($pass == $this->pass){
    		$_SESSION['id'] = $this->id;
    		return true;
    	}

    	return false;
    }

    public static function getUsers() { //статический метод
        return [
            1=>['name'=>'Василий', 'surname'=>'Петров', 'email'=>'vasya-petya@gmail.com', 'password'=>'12345'],
            2=>['name'=>'Федор', 'surname'=>'Пупкин', 'email'=>'vasya-pupkin@gmail.com', 'password'=>'1234'],
        ];
    }
}