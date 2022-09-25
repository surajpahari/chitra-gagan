<?php
session_start();

//flash message helper
  
function flash($name = '', $message = '', $class = 'message-success')
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {

      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }

      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }

      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
      echo '<div class="flash-div">
        <div class="flash-div-message ' . $class . '">' . $_SESSION[$name] . '</div>
      </div>';

      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}
function is_logged_in(){
    if(!isset($_SESSION['user_id'])){
        return false;
    }
    else{
        return true;
    }
}