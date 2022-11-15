<?php
class Images extends Controller
{
  public function __construct()
  {
    if (!is_logged_in()) {
      redirect('users/login');
    }
    $this->image_model = $this->model('Image');
    $this->new_data = array();
  }
  public function index()
  {
    // $data = [];
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

    $newData['images'] = array($row1, $row2, $row3);
    $newData['mygallery'] = true;
    $this->view('pages/mygallery', $newData);
  }
  public function get_image_info($image_id)
  {
    $data = $this->image_model->get_image_info($image_id);
    echo json_encode(json_decode(json_encode($data), true));
  }
  public function get_creator_info($image_id)
  {
    $data = $this->image_model->get_creator_data($image_id);
    echo json_encode(json_decode(json_encode($data), true));
  }

  public function upload()
  {
    $data = [];
    $meta_data = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data['user_id'] = $_SESSION['user_id'];

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
        $title = trim($_POST['title']);
        $title = htmlspecialchars($title);
        $title = ltrim($title);
        $data["image_title"] = $title;
        echo ($_POST['meta_check']);
        // if ($_POST['meta_check'] == "yes") {
        $exposure = trim($_POST['exposure']);
        $meta_data['exposure'] = $exposure;
        $aperture = trim($_POST['aperture']);
        $meta_data['aperture'] = $aperture;
        $shutter_speed = trim($_POST['shutter-speed']);
        $meta_data['shutter_speed'] = $shutter_speed;
        $iso = trim($_POST['iso']);
        $meta_data['iso'] = $iso;
        $category = trim($_POST['category']);
        $meta_data['category'] = $category;
        // }

        if (empty($title)) {
          $data["title_err"] = "Empty title file";
          $data["upload_err"] = '';
          $this->view('images/upload', $data);
        } else {
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
                $f_destination = UPLD_FILE . "/" . $f_newname;
                move_uploaded_file($f_temp, $f_destination);
                // var_dump($meta_data);
                $this->image_model->upload_images($data['user_id'], $f_newname, $title,$meta_data);
                // var_dump($meta_data);
                $this->index();
                $this->view('pages/mygallery', $this->new_data);
              } else {
                $data["upload_err"] = "File is too big";
                $this->view('images/upload', $data);
              }
            } else {
              $data["upload_err"] = "Error uploading your file";
              $this->view('images/upload', $data);
            }
          } else {
            $data["upload_err"] = "This type of file is not allowed";
            $this->view('images/upload', $data);
          }
        }
        //uploading file in datbase matching with title
        // header("Location:../fronts/resource.php");
      } else {
        $data["upload_err"] = "cannot be connected";
        $this->view('images/upload', $data);

        // var_dump($_POST);
      }
      // $data=[];

      // header('images/index');;
    } else {
      $data = [
        'image_title' => '',
        'upload_err' => '',
        'title_err' => '',


      ];
      $this->view('images/upload', $data);
    }
  }

  public function add_like($user_id, $image_id)
  {
    // $info = explode("X:", $alt);
    $data = $this->image_model->add_like($user_id, $image_id);
    echo $data;
  }
  public  function sub_like($user_id, $image_id)
  {

    // $info = explode("X:", $alt);
    $data = $this->image_model->sub_like($user_id, $image_id);
    echo $data;
  }
  public function check_like($user_id, $image_id)
  {
    // $info = explode("X:", $alt);
    $data = $this->image_model->check_like($user_id, $image_id);
    echo $data;
  }

  //for profile pictur
  public function get_profile($uid)
  {
    $data = $this->image_model->fetch_profile($uid);
    echo json_encode(json_decode(json_encode($data), true));
  }

  public function download_file($file)
  {
    // echo "file aay file";

    if (!empty($file)) {
      $filename = basename($file);
      $separate_array = explode('.', $filename);
      $filepath = UPLD_FILE . $filename;
      if (!empty($filename) &&  file_exists($filepath)) {
        // //Define header
        // header("Cache-Control: public");
        // header("Content-Description: File Transfer");
        // header("Content-Description: attachment; fileame=zip");
        // header("Content-Type: application/zip");
        // header("Content-Transfer-Emcoding:binary");
        // echo("download ta vayo");
        // // ($separate_array);
        header("Pragma: public", true);
        header("Expires: 0"); // set expiration time
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment; filename=" . basename($file));
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . filesize($file));
        die(file_get_contents($file));

        readfile($filepath);
        exit;
      } else {
        echo "This File does not exist";
      }
    }
  }

  public function downloads_file($file)
  {
    // $file = $_GET['filename'];
    $filename = basename($file);
    $filepath = UPLD_FILE . $filename;
    try {
      header('Content-type: image/*');
      header("Content-Disposition: attachment; filename=\"$filepath\"");
      readfile($filepath);
    } catch (Exception $ex) {
      echo $ex->getMessage();
    }
  }
  function get_image_property($file)
  {
    $data = getimagesize(UPLD_FILE . $file);
    echo json_encode(json_decode(json_encode($data), true));
  }
  function delete_users_image($image_id)
  {
    if ($this->image_model->delete_image($image_id)) {
      $this->index();
    }
  }
  function get_image_meta($image_id)
  {
    $data = $this->image_model->fetch_meta_data($image_id);
    echo json_encode(json_decode(json_encode($data), true));
  }
}
