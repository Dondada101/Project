<?php
if (isset($_POST['search'])) {
  $search = $_POST['search'];
  error_log("Query received: " . $search);
  require "../classes/conn.class.php";
  require "../classes/search.class.php";
  require "../classes/searchctrl.class.php";
  $model=new Search();
  $query= new Searchctrl($model);
  $results=$query->search($search);
  error_log("Results fetched: " . print_r($results, true));
  foreach ($results as $result) {
      echo "<tr><td>" . htmlspecialchars($result['hname']) . "</td><td>" . htmlspecialchars($result['hlvl']) . "</td></tr>";
  }
}