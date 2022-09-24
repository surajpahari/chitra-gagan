<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('User');
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
            if (empty($data['lname'])) {
                $data['lname_err'] = 'Please enter lname';
            }
            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                //check email
                if ($this->user_model->find_user_by_email($data['email'])) {
                    echo $data['email'];
                    $data['email_err'] = 'Email is already taken';
                }
            }
            //validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            } else {
                //check email
                if ($this->user_model->find_user_by_username($data['username'])) {
                    echo $data['username'];
                    $data['username_err'] = 'Username is already taken';
                }
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
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register user
                if ($this->user_model->register($data)) {
                    flash('register_sucess', 'Registration Sucessful');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                echo 'not validated';
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
            //check for username
            if ($this->user_model->find_user_by_username($data['username'])) {
                //user found 
            } else {
                //user not found
                $data['username_err'] = 'No user found';
                //error
            }
            if (
                empty($data['username_err']) &&
                empty($data['password_err'])
            ) {
                //validated 
                //check and set logged in user
                $logged_in_user = $this->user_model->login($data['username'], $data['password']);

                if ($logged_in_user) {
                    //create session
                    $this->create_user_session($logged_in_user);

                } else {
                    $data['password_err'] = 'Password Incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                echo 'not validated';
                print_r($data);
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
    public function create_user_session($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_fname'] = $user->fname;
        $_SESSION['user_lname'] = $user->lname;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        echo 'welcome '. $_SESSION['user_fname'];

    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_fname'] );
        unset($_SESSION['user_lname']);
        unset($_SESSION['user_username']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}
