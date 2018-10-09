<?php
  function find_all_subjects() {
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_subject_by_id($id) {
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
  }

  function find_subject_count() {
    global $db;
    $sql = "SELECT COUNT('*') AS total FROM subjects";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $result = mysqli_fetch_assoc($result_set);
    return $result['total'];
  }

  function update_subject($subject) {
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "WHERE id='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
//      redirect_to(url_for('/staff/subjects/show.php?id=' . $subject['id']));
        return true;
    } else {
      // update failed
      echo mysqli_error($db);
      db_disconnect($db);
    }

  }

  function insert_subject($subject) {
    global $db;

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "', ";
    $sql .= "'" . $subject['position'] . "', ";
    $sql .= "'" . $subject['visible'] . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    // $result is boolean
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_subject_row($subject) {
    global $db;
    $sql = "DELETE FROM subjects WHERE id ='" . $subject['id'] . "'";
    $sql .= " LIMIT 1";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function find_all_pages() {
    global $db;
    $sql = "SELECT * FROM pages ";
    $sql.= "ORDER BY subject_id, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
?>
