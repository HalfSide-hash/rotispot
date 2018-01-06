<?php include 'customerheader.php'; 
      include 'categoryfunctions.php'; //for use with displaying categories ?>
        
<!DOCTYPE html>
<html>
<!-- Creates a page which displays all categories. -->
<style type="text/css">
	aside{
		text-align: center;
		font-size: 35px;

	}

	 li{
		list-style-type: none;
		text-align: center;
	}

	hr{
		 border-width: 3px;
		 border-color: yellow;
		 
	}


</style>
<body>
<main>
    <div class="container-fluid" style = "background-color: #ffc878;">
    <aside>
        <h1 style="font-size: 50px;">Categories</h1>
        <nav>
        <!-- Calls function from categoryfunctions.php to display categories. -->

          
           	<li><?php echo all_categories() ?></li>
        </nav>           
    </aside>
</div>
</main>    
</body>
</html>
        
