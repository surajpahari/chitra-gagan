<?php
/* PDO database class  that connects to the database through prepared stmt*/
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $db_handler;
    private $stmt;
    private $error;


    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //PDO instance
        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //prepare statement with query

    public function query($sql)
    {
        $this->stmt = $this->db_handler->prepare($sql);
    }

    //bind values
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_string($value):
                    $type = PDO::PARAM_STR;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }


    //Execute the prepare statement
    public function execute()
    {
        return $this->stmt->execute();
    }


    //get result set as array of object
    public function result_set()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //get single record as object
    public function single_result()
    {
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //row count
    public function row_count()
    {
        return $this->stmt->row_count();
    }
}
