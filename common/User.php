<?php

class User
{
    public function login($email, $password)
    {
        $db = new DB();
        $user = $db->getOne('users', array(
            'email' => $email,
            'password' => sha1($password)
        ));

        if ($user !== null) {
            $_SESSION['user'] = $user;

            return true;
        } else {
            return false;
        }
    }

    public function loggedIn()
    {

    }
}
