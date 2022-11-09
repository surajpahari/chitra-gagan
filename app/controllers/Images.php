<?php
class Images extends Controller
{
    public function __construct()
    {
        if (!is_logged_in()) {
            redirect('users/login');
        }
        $this->image_model = $this->model('Image');
    }
    public function index()
    {
        // $data = [];
        $uid = $_SESSION['user_id'];
        $data=$this->image_model->get_images($uid);
        
        $this->view('images/index',$data);
    }
    public function get_image_info($image_id)
    {
      $data = $this->image_model->get_image_info($image_id);
      echo json_encode(json_decode(json_encode($data), true));
    }
    public function get_creator_info($image_id)
    {
      $data = $this->image_model->get_creator_data($image_id);
      echo json_encode(json_decode(json_encode($data), true));    }
  
    public function upload()
    {
        $data = [];
        $data['user_id'] = $_SESSION['user_id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST["submit"])) {
                //getting the details of the files that is uploaded
                $file = $_FILES['file'];
                // var_dump($_FILES);
                $f_name = $_FILES['file']['name'];
                $f_temp = $_FILES['file']['tmp_name'];
                $f_error = $_FILES['file']['error'];
                $f_size = $_FILES['file']['size'];
                $f_type = $_FILES['file']['type'];
                $f_newname = "";
                //getting the title heading
                $title = $_POST["title"];


                //getting the extension of file that is uploaded
                //explode separate the string into parts from given point and store it in array
                $f_sep = explode('.', $f_name);

                //end(arr) gives the value of last index of the array 
                //strlower() lowers the sting case
                $f_ext = strtolower(end($f_sep));

                //determining which extension is allowed
                $allowed = array('png', 'jpeg', 'jpg');

                //in_array(value,arr) function checks the given value in the given arr
                if (in_array($f_ext, $allowed)) {
                    if ($f_error === 0) {
                        if ($f_size < 100000000) {
                            $f_newname = uniqid('', true) . "." . $f_ext;
                            $f_destination = UPLD_FILE . "/" . $f_newname;
                            move_uploaded_file($f_temp,$f_destination);
                            $this->image_model->upload_images($data['user_id'],$f_newname);
                            $this->index();
                            
                        } else {
                            echo ("yout file is too big");
                        }
                    } else {
                        echo "Error uploading your file";
                    }
                } else {
                    echo ("This type of file is not allowed");
                }
                //uploading file in datbase matching with title
                // header("Location:../fronts/resource.php");
            } else {
                echo "cannot be connected";
                // var_dump($_POST);
            }
            // $data=[];

            // header('images/index');;
        }
        else{
            $this->view('images/upload');
            
        }
    }
    public function profile_upload()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        } else {
        $this->view('images/upload');
      }
    }
    public function add_like($alt)
    {
        $info = explode("X:",$alt);
        $data = $this->image_model->add_like($info[0],$info[1]);
        echo $data;
    }
    public  function sub_like($alt){

        $info = explode("X:",$alt);
        $data = $this->image_model->sub_like($info[0],$info[1]);
        echo $data;
    }
    public function check_like($alt){
        $info = explode("X:",$alt);
        $data = $this->image_model->check_like($info[0],$info[1]);
        echo $data;
    }
}
