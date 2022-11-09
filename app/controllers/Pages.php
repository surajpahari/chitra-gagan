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
        // $data = [];
        $uid = $_SESSION['user_id'];
        $data = $this->image_model->get_images($uid);

        $this->view('pages/mygallery', $data);
    }
    public function profile_upload(){
        $uid = $_SESSION['user_id'];
        $data = $this->image_model->fetch_profile($uid);
        $this->view('pages/profile_upload', $data);
    }
}
