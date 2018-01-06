<?php include 'customerheader.php'; ?>
<html>
<head>
  <title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>
<div class="container-fluid" style = "background-color: #ffc878;">
<?php include '../dbh.php';

  // shorten to a term to use
  $searchterm=trim($_POST['searchterm']);
  echo "<p>Your search: ".$searchterm."</p>";

  //  search term not found
  if (!$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchterm = addslashes($searchterm);
  }

  //search the products for the search term
  $query = "SELECT * FROM product WHERE `pro_Name` LIKE '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  //display results
  echo "<p>Number of products found: ".$num_results."</p>";
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Product Name: ";
     echo "<a href= 'productpage.php?id=".htmlspecialchars(stripslashes($row['linkName']))."'>".htmlspecialchars(stripslashes($row['pro_Name']))."</a>";
     echo "</p>";
  }

  $result->free();
  $db->close(); ?>
  
  </div>