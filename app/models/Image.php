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
        $this->db->bind(':uid', $uid);
        $this->db->bind(':location', $location);
        if ($this->db->execute()) {
            return true;
        } else {
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

    //to get the like count
    public function get_image_info($image_id)
    {
        $this->db->query('SELECT * FROM images WHERE id = :image_id');
        $this->db->bind(':image_id', $image_id);

        $row = $this->db->single_result();

        return $row;
    }
    public function get_creator_data($user_id)
    {
        $this->db->query('SELECT username, profile, email FROM users WHERE id = :uid');
        $this->db->bind(':uid', $user_id);

        $row = $this->db->single_result();

        return $row;
    }
    public function add_like($uid, $image_id)
    {
        if (!$this->check_like($uid, $image_id)) {
            $this->save_like($uid, $image_id);
            $this->db->query('UPDATE images set likes=likes+1 where uid=:uid && id =:image_id');
            $this->db->bind(':uid', $uid);
            $this->db->bind(':image_id', $image_id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function sub_like($uid, $image_id)
    {
        if ($this->check_like($uid, $image_id)) {
            $this->delete_like($uid, $image_id);
            $this->db->query('UPDATE images set likes=likes-1 where uid=:uid && id =:image_id');
            $this->db->bind(':uid', $uid);
            $this->db->bind(':image_id', $image_id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function check_like($uid, $image_id)
    {
        $this->db->query('SELECT * FROM liked where  uid=:uid && image_id=:image_id');
        $this->db->bind(':uid', $uid);
        $this->db->bind(':image_id', $image_id);
        $this->db->execute();
        $row = $this->db->single_result();

        if ($this->db->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function save_like($uid, $image_id)
    {
        $this->db->query('INSERT INTO liked(uid,image_id) VALUES (:uid , :image_id)');
        $this->db->bind(':uid', $uid);
        $this->db->bind(':image_id', $image_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        };
    }
    public function delete_like($uid, $image_id)
    {
        $this->db->query('DELETE FROM liked where uid = :uid && image_id = :image_id');
        $this->db->bind(':uid', $uid);
        $this->db->bind(':image_id', $image_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        };
    }

    public function profile_upload($uid, $location)
    {
        $this->db->query('UPDATE users set profile=:location where id=:uid');
        // bind values
        $this->db->bind(':uid', $uid);
        $this->db->bind(':location', $location);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function fetch_profile($uid){
        $this->db->query('SELECT  profile FROM users where id =:uid');
        $this->db->bind(':uid', $uid);
        $this->db->execute();
        $row = $this->db->result_set();
        return $row;
    }
}
