<?php include ('inc/header.php');?>
<?php include ('lib/Database.php');
$db = new Database();

?>

<?php
function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
 
  if (!is_array($user_tree_array))
    $user_tree_array = array();
 
  $sql = "SELECT * FROM forcat WHERE  catParent = $parent ORDER BY catId ASC";
  $query = $db->select($sql);
  if ($query) {
    while ($row = mysql_fetch_object($query)) {
      $user_tree_array[] = array("catId" => $row->catId, "catName" => $spacing . $row->catName);
      $user_tree_array = fetchCategoryTree($row->catId, $spacing . '&nbsp;&nbsp;', $user_tree_array);
    }
  }
  return $user_tree_array;
}

print_r($user_tree_array);

function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {
 
    if (!is_array($user_tree_array))
    $user_tree_array = array();
 $db = new Database();
  $sql = "SELECT * FROM forcat WHERE  catParent = $parent ORDER BY catId ASC";
  $query = $db->select($sql);
  if ($query) {
     $user_tree_array[] = "<ul>";
    while ($row = mysqli_fetch_object($query)) {
	  $user_tree_array[] = "<li>". $row->catName."</li>";
      $user_tree_array = fetchCategoryTreeList($row->catId, $user_tree_array);
    }
	$user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}


?>
<ul>
<?php
  $res = fetchCategoryTreeList();
  print_r($res);
  foreach ($res as $r) {
    echo  $r;
  }
?>
</ul>

<?php include ('inc/footer.php');?>