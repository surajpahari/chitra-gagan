<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->image_model = $this->model('Image');
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome'
        ];
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        $this->view('pages/about', $data);
    }
    public function mygallery()
    {
        $uid = $_SESSION['user_id'];
        $data = $this->image_model->get_images($uid);
    
        $row1 = array();
        $row2 = array();
        $row3 = array();
    
        array_push($row1, $data[0]);
        for ($i = 1; $i < count($data); $i++) {
          if (($i + 2) % 3 == 0) {
            array_push($row1, $data[$i]);
          } elseif (($i + 1) % 3 == 0) {
            array_push($row2, $data[$i]);
          } elseif ($i % 3 == 0) {
            array_push($row3, $data[$i]);
          }
        }
    
        $newData = array($row1, $row2, $row3);
        $this->view('pages/mygallery', $newData);
    }
    public function profile_upload(){
        $uid = $_SESSION['user_id'];
        $data = $this->image_model->fetch_profile($uid);
        $this->view('pages/profile_upload', $data);
    }
}
