<?php
class Users extends Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        //process from

        //sanitize the POST data


        //checking for the post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // echo 'submitted';
            $data = [
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'username' => trim($_POST['username']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fname_err' => '',
                'lname_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // validate fname
            if (empty($data['fname'])) {
                $data['fname_err'] = 'Please enter fname';
            }
            //validate lname
            if (empty($data['lame'])) {
                $data['lname_err'] = 'Please enter lname';
            }
            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            //validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            //validate Password 
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 character';
            }
            //validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
            }
            if (
                empty($data['email_err']) && empty($data['fname_err']) &&
                empty($data['lname_err']) && empty($data['username_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err'])
            ) {
                //validated 
                die('Sucess');
            } else {
                print_r($data);
                //load view with errors
                // $this->view('users/register', $data);
            }
        } else {
            //Init data
            $data = [
                'fname' => '',
                'lname' => '',
                'email' => '',
                'password' => '',
                'username' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //checking for the post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process from
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];
            //validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            //validate Password 
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            if (
                empty($data['username_err']) &&
                empty($data['password_err'])){
                //vlidated 
                echo 'validated';
            } else {
                echo 'validated';
                //load view with errors
                // $this->view('users/register', $data);
            }


        } else {
            //Init data
            $data = [

                'username' => '',
                'password' => '',


            ];
            $this->view('users/login', $data);
        }
    }
}
