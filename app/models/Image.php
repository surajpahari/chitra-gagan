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
    public function upload_images($uid, $location, $title, $meta_data)
    {
        $new_id = $this->new_id();
        $this->db->query('INSERT INTO images(id,uid,location,title) 
        VALUES(:id,:uid,:location,:title)');
        // bind values
        $this->db->bind(':id', $new_id);
        $this->db->bind(':uid', $uid);
        $this->db->bind(':location', $location);
        $this->db->bind(':title', $title);
        if (!empty($meta_data)) {
            $this->db->execute();
            $this->upload_meta($new_id, $meta_data['exposure'], $meta_data['aperture'], $meta_data['shutter_speed'], $meta_data['category'], $meta_data['iso']);
        }
    }
    public function get_images($uid)
    {
        $this->db->query('SELECT * FROM images WHERE uid = :uid ORDER BY images.id DESC');
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
    public function fetch_profile($uid)
    {
        $this->db->query('SELECT  profile FROM users where id =:uid');
        $this->db->bind(':uid', $uid);
        $this->db->execute();
        $row = $this->db->result_set();
        return $row;
    }
    public function image_sugesstion()
    {
        $this->db->query('SELECT  * FROM images ORDER BY RAND()  LIMIT 12');
        // $this->db->bind();
        $this->db->execute();
        $row = $this->db->result_set();
        return $row;
    }
    public function images_sugesstion()
    {
        $this->db->query("SELECT MAX(id) FROM images");
        $this->db->execute();
        $row = $this->db->single_data_count();


        // generate a list of N random values, making sure they're distinct

    }
    public function search_image($title)
    {
        $search = $title . '%';
        $this->db->query('SELECT  * FROM images WHERE title like :pattern ORDER BY title ASC LIMIT 12');
        // $this->db->bind();
        $this->db->bind(':pattern', $search);
        $row = $this->db->fetch_all();
        return $row;
    }
    public function delete_image($image_id)
    {
        $this->db->query('DELETE FROM images WHERE id = :image_id');
        $this->db->bind(':image_id', $image_id);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
    function new_id()
    {
        $this->db->query("SELECT MAX(id) AS max_id FROM images");
        $this->db->execute();
        $row = $this->db->single_data_count();
        return $row['max_id'] + 1;
    }
    function upload_meta($id, $exposure, $aperture, $shutter_speed, $category, $iso)
    {
        $this->db->query('INSERT INTO image_meta(id,exposure,aperture,shutter_speed,category,iso) 
        VALUES(:id,:exposure,:aperture,:shutter_speed,:category,:iso)');
        // bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':exposure', $exposure);
        $this->db->bind(':aperture', $aperture);
        $this->db->bind(':shutter_speed', $shutter_speed);
        $this->db->bind(':category', $category);
        $this->db->bind(':iso', $iso);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function fetch_meta_data($image_id)
    {
        $this->db->query('SELECT * FROM image_meta WHERE id =:image_id');
        $this->db->bind(':image_id', $image_id);

        $row = $this->db->result_set();

        if ($this->db->row_count() > 0) {
            return $row;
        } else {
            return [];
        }
    }
}
