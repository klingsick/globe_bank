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
  echo h($id);

 ?>

<?php $page_title = 'Show Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    Page ID: <?php echo h($id); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
