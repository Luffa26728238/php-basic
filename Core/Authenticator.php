<?php

namespace Core;


class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query("select * from users where email = :email", [
                "email" => $email,
            ])->find();

        if ($user) {

            if (password_verify($password, $user["password"])) {

                $this->login([
                    "email" => $email,
                ]);

                return true;
            }
        }
        return false;
    }


    public function login($user)
    {
        $_SESSION["user"] = [

            "email" => $user["email"],

        ];
        // update the current session id with a newly generated one
        session_regenerate_id(true);  // or false

    }


    public function logout()
    {

        Session::destroy();

    }

}