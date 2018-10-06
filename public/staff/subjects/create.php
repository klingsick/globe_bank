<?php
require_once('../../../private/initialize.php');

if(is_post_request()) {
// Handle form values sent by new.phpinfo

  $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $position = isset($_POST['position']) ? $_POST['position'] : '';
  $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

  // INSERT
  $result = insert_subject($menu_name, $position, $visible);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
// if(is_post_request)
} else {
  redirect_to(url_for('/staff/subjects/new.php'));
}




 ?>
