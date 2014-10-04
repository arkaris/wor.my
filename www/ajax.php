<?php

include '/class/auth.class.php';
include '/class/ajaxRequest.class.php';

//проверить куки
/*
if (!empty($_SESSION["email"]) && !empty($_SESSION["password"])) {
    // check session in cookies
    session_id($_COOKIE['sid']);
}
*/

session_start();

class AuthorizationAjaxRequest extends AjaxRequest
{
    public $actions = array(
        "login" => "login",
        "logout" => "logout",
        "register" => "register",
    );

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            // Method Not Allowed
            //http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("email", "");
        setcookie("password", "");

        $email = $this->getRequestParam("email");
        $password = $this->getRequestParam("password");
        $remember = !!$this->getRequestParam("remember");

        if (empty($email)) {
            $this->setFieldError("email", "Enter the email");
            return;
        }

        if (empty($password)) {
            $this->setFieldError("password", "Enter the password");
            return;
        }

        $user = new Auth\User();
        $auth_result = $user->authorize($email, $password, $remember);

        if (!$auth_result) {
            $this->setFieldError("password", "Invalid email or password");
            return;
        }

        $this->status = "ok";
        $this->setResponse("redirect", ".");
        $this->message = sprintf("Hello, %s! Access granted.", $email);
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("email", "");
        setcookie("password", "");

        $user = new Auth\User();
        $user->logout();

        $this->setResponse("redirect", ".");
        $this->status = "ok";
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            // Method Not Allowed
            //http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("email", "");
        setcookie("password", "");

        $email = $this->getRequestParam("email");
        //$password1 = $this->getRequestParam("password1");
        //$password2 = $this->getRequestParam("password2");
        $password = $this->getRequestParam("password");

        if (empty($email)) {
            $this->setFieldError("email", "Enter the email");
            return;
        }

        /*if (empty($password1)) {
            $this->setFieldError("password1", "Enter the password");
            return;
        }

        if (empty($password2)) {
            $this->setFieldError("password2", "Confirm the password");
            return;
        }

        if ($password1 !== $password2) {
            $this->setFieldError("password2", "Confirm password is not match");
            return;
        }*/
        if (empty($password)) {
            $this->setFieldError("password", "Enter the password");
            return;
        }

        $user = new Auth\User();

        try {
            $new_user = $user->create($email, $password);
        } catch (\Exception $e) {
            $this->setFieldError("email", $e->getMessage());
            return;
        }
        //$user->authorize($email $password1);

        $this->message = sprintf("Hello, %s! Thank you for registration.", $email);
        $this->setResponse("redirect", "/");
        $this->status = "ok";
    }
}

$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
