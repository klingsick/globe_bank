<?php
require_once('../../../private/initialize.php');

if(is_post_request()) {
// Handle form values sent by new.phpinfo

  $subject = [];
  $subject['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $subject['position'] = isset($_POST['position']) ? $_POST['position'] : '';
  $subject['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';

  // INSERT
  $result = insert_subject($subject);
  if($result == 1) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
  } else {
    echo "Insert failed";
  }
// if(is_post_request)
} else {
  redirect_to(url_for('/staff/subjects/new.php'));
}




 ?>
