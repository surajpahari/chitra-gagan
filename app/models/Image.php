<?php
class Image
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getImages()
    {
        echo 'get image from database';
    }
    public function upload_images($uid, $location)
    {
        $this->db->query('INSERT INTO images(uid,location) 
        VALUES(:uid,:location)');
        // bind values
        $this->db->bind(':uid',$uid);
        $this->db->bind(':location', $location);
        if($this->db->execute()){
            return true;
        }
        else{
            return false; 
        }

      
    }
    public function get_images($uid)
    {
        $this->db->query('SELECT * FROM images WHERE uid = :uid');
        $this->db->bind(':uid', $uid);

        $row = $this->db->result_set();
 
        if ($this->db->row_count() > 0) {
            return $row;
        } else {
            return [];
        }


        // return $row;
    }
}
