<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //register function
    public function register($data)
    {
        $this->db->query('INSERT INTO users(fname,lname,username,email,password) 
        VALUES(:fname,:lname,:username,:email,:password)');
        //bind values
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        
        //execute
        if($this->db->execute()){
            return true;
        }
        else{
            return false; 
        }
    }

    //find user by email
    public function find_user_by_email($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single_result();

        if ($this->db->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function find_user_by_username($username)
    {

        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single_result();

        if ($this->db->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username,$password){
        $this->db->query('SELECT * FROM users where username = :username');
        $this->db->bind(':username',$username);
        $row = $this->db->single_result();
        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
            return $row;
        }
        else{
            return false;
        }

    }
}
