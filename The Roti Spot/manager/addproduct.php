<?php include 'managerheader.php'; 

    include '../databaseConnect.php';
    global $db;

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE)
    {
        $category_id = 1;
    }

    $queryAllCategories = 'SELECT * FROM category
                           ORDER BY pro_Category';

    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();
?>
    <main>
        <div class="container-fluid" style = "background-color: #ffc878;">
        <form method="POST" action="addproductconfirm.php" style="padding-left: 300px; padding-right: 300px">
           <h1>Add Product</h1><br>
             <h3>Category:</h3>
              <select name="category_id" class="btn btn-primary dropdown-toggle"
                    type="button" data-toggle="dropdown"
                    style="background-color: #004080; font-size: 20px; border-color:#004080;" required>
            <option disabled selected value></option>
            <?php foreach ($categories as $category) :
                    if ($category['pro_Category'] == $product['pro_Category']){
                      $selected = 'selected';
                    }else{
                      $selected = '';
                    }
            ?>
            <option style="background-color:white; color:black;"
                    value="<?php echo $category['pro_Category']; ?>"<?php echo $selected ?>>
                       <?php echo htmlspecialchars($category['pro_Category']); ?>
            </option>
            <?php endforeach; ?>
            </select><br>
    <div class="form-group">
        <h3>Name:</h3>
        <input type="text" name="name" class="form-control" required><br>
    </div>
    <div class="form-group">
        <h3>Price:</h3>
        <input type="text" name="price" class="form-control" placeholder="0.00" pattern="^\d*(\.\d{2}$)?" required><br>
    </div>
    <div class="form-group">
        <h3>Image Name:</h3>
        <input type="text" name="image" class="form-control" placeholder="This needs to match the name of your .png file" required><br><br>
    </div>
    <div class="form-group">
        <h3>Quantity:</h3>
        <input type="text" name="quantity" class="form-control" required><br><br>
    </div>
    <div class="form-group">
        <h3>Description:</h3>
        <textarea rows="10" cols="50" name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary"/>Submit</button><br>
    </form><br>
    </div>
    </main>
    </body>
</html>
