<?php require_once('../../../private/initialize.php');

$position_count = '';

// get subjects and subject_id's
$subject_set = find_all_subjects();


if(is_post_request()) {
// Handle form values sent by new.phpinfo

$page = [];
$page['subject_id'] = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
$page['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
$page['position'] = isset($_POST['position']) ? $_POST['position'] : '';
$page['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
$page['content'] = isset($_POST['content']) ? $_POST['content'] : '';

// Insert
$result = insert_page($page);
if($result == 1) {
  $new_id = mysqli_insert_id($db); // gets the new page id
  redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
} else {
  echo "Insert failed";
}

}


?>

<?php $page_title = 'Create New Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Create Page</h1>

    <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
      <dl>
        <dt>Page Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
          <?php
          while($subject = mysqli_fetch_assoc($subject_set)) {
            echo "<option value=\"{$subject['id']}\">{$subject['menu_name']}</option>";
          }
          ?>
        </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
        <dt>Content</dt>
        <dd>
          <textarea name="content" rows="20" cols="50"></textarea>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
