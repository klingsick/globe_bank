<?php require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];
//$menu_name = $_GET['menu_name'];


//$position = '';
//$visible = '';

//echo $menu_name;

if(is_post_request()) {

  $subject = [];
  $subject['id'] = $id;
  $subject['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $subject['position'] = isset($_POST['position']) ? $_POST['position'] : '';
  $subject['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';

  // update database
  $result = update_subject($subject);
  if($result == 1) {
    redirect_to(url_for('/staff/subjects/show.php?id=' . $subject['id']));
  } else {
    echo "Update failed";
  }

} else {
  $subject = find_subject_by_id($id);

  // get count of subjects for 'position'
  $subject_count = find_subject_count();
//  $subject_set = find_all_subjects();
 // $subject_count = mysqli_num_rows($subject_set);
  //mysqli_free_result($subject_set);


}


?>

<?php $subject_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
              for($i=1; $i <= $subject_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($subject['position'] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
             ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php
            if($subject['visible'] == 1) { echo "checked"; }
          ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
