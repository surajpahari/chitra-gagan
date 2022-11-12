<?php
class Pages extends Controller
{
  public function __construct()
  {
    $this->image_model = $this->model('Image');
  }

  public function index()
  {
    $data = $this->image_model->image_sugesstion();
    $row1 = array();
    $row2 = array();
    $row3 = array();

    array_push($row1, $data[0]);
    for ($i = 1; $i < count($data); $i++) {
      if (($i + 3) % 3 == 0) {
        array_push($row1, $data[$i]);
      } elseif (($i + 2) % 3 == 0) {
        array_push($row2, $data[$i]);
      } elseif (($i + 1) % 3 == 0) {
        array_push($row3, $data[$i]);
      }
    }

    $newData = array($row1, $row2, $row3);
    $this->view('pages/index', $newData);
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
    if (isset($_SESSION['user_id'])) {
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
    } else {
      $this->view(SITE);
    }
  }
  public function profile_upload($error)
  {
    if (isset($_SESSION['user_id'])) {
      $data=[];
      $uid = $_SESSION['user_id'];
      $data['image'] = $this->image_model->fetch_profile($uid);
      $data['upload_error'] = $error;
      // var_dump($data);
      $this->view('pages/profile_upload', $data);
    } else {
      redirect('users/login');
    }
  }
  public function profile_upload_handler()
  {
    $data = [];
    if (isset($_SESSION['user_id'])) {
      $data['user_id'] = $_SESSION['user_id'];
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["submit"])) {
          //getting the tilte of the image
          //getting the details of the files that is uploaded
          $file = $_FILES['file'];
          // var_dump($_FILES);
          $f_name = $_FILES['file']['name'];
          $f_temp = $_FILES['file']['tmp_name'];
          $f_error = $_FILES['file']['error'];
          $f_size = $_FILES['file']['size'];
          $f_type = $_FILES['file']['type'];
          $f_newname = "";
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
              if ($f_size < 10000000000) {
                $f_newname = uniqid('', true) . "." . $f_ext;
                $f_destination = PROF_FOLD . "/" . $f_newname;
                move_uploaded_file($f_temp, $f_destination);
                $this->image_model->profile_upload($data['user_id'], $f_newname);
                $this->index();
              } else {
                 $data['upload_error']='File is too big';
                //  sleep(5);
                 $this->profile_upload("go govinda");

                // flush();
              }
            } else {
              $data['upload_error']="Error uploading your file";
              // sleep(3);
              //  $this->profile_upload();

            }
          } else {
            $data['upload_error']="This type of file is not allowed";
            $this->profile_upload($data['upload_error']);
            // sleep(3);
            // $this->profile_upload();
          }
          //uploading file in datbase matching with title
          // header("Location:../fronts/resource.php");
        } else {
          $data['upload_error']="cannot be connected";
           $this->profile_upload($data['upload_error']);
          // var_dump($_POST);
        }
        // $data=[];
        // header('images/index');;
      } else {
        $this->profile_upload("");
        // $this->view('pages/profile_upload');
      }
    }
  // public function profile($uid){
  //     if($uid == $_SESSION['user_id']){
  //         $
  //     }
  // }
}
}
