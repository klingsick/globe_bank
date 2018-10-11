<?php require_once('../../../private/initialize.php'); ?>

<?php
  // long way
//  if (isset($_GET['id']) {
//   $id = $_GET['id'];
//  } else {
//    $id = 1;
// }
  // shorthand (ternary conjunction)
  $id = isset($_GET['id']) ? $_GET['id'] : '1';

  if(is_post_request()) {
    $page = [];
    $page['id'] = $id;

    $result = delete_page($page);
    if($result == 1) {
      redirect_to(url_for('/staff/pages/index.php'));
    } else {
      echo "Delete failed";
    }

  } else {
    $page = find_page_by_id($id);
  }

 ?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    <h1>Delete Subject: <?php echo h($page['menu_name']); ?></h1>
    <p>Click the button to permanently delete this subject</p>

<div class="attributes">
  <dl>
    <dt>Menu Name</dt>
    <dd><?php echo h($page['menu_name']); ?></dd>
  </dl>
  <dl>
    <dt>Position</dt>
    <dd><?php echo h($page['position']); ?></dd>
  </dl>
  <dl>
    <dt>Visible</dt>
    <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
  </dl>
  <dl>
    <dt>Content</dt>
    <dd><?php echo h($page['content']); ?></dd>
  </dl>
</div>
<form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($id))); ?>" method="post">
<input type="submit" value="Delete Page">
</form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
