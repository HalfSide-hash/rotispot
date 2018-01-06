<?php include 'customerheader.php';

    include 'categoryfunctions.php';

//displays the categories available

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    $cID = $_GET['id'];

    $queryCategory = "SELECT *
                     FROM category
                     WHERE pro_Category = '$cID'";
    $result = $db->prepare($queryCategory);
    $result->bindValue('$cID', $category_id);
    $result->execute();
    $category = $result->fetch();
    $category_name = $category['category_Name'];
    $result->closeCursor();

    //get products for selected category
    $queryProducts = "SELECT * FROM product
                  WHERE pro_Category = '$cID'
                  ORDER BY pro_ID";
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue('$cID', $category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();

?>

<!DOCTYPE html>
<html>

<body>
<main>
    <div class="container-fluid" style = "background-color: #ffc878;">
    <h2><center><?php echo $category_name; ?></center></h2>
    <div class="row">
    <?php foreach ($products as $product) : ?>
                <div class="col-sm-2">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading" style = "background-color: coral;"><center><?php echo $product['pro_Name']; ?></center></div>
                            
                            <div class="img-responsive"><a href = "productpage.php?id=<?php echo $product['linkName']; ?>">
                            
                            <img src="../images/<?php echo $product['linkName'].'.png'; ?>" class="img-responsive" style="width:100%"
                            alt="../images/<?php echo $product['linkName'].'.png'; ?>"></a>
                            </div>
                       
                        <div class="panel-footer" style = "background-color: yellow;"> $<?php echo $product['pro_Price']; ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
</main>
</body>
</html>
