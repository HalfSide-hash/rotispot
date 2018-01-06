<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>The Roti Spot</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <style type=text/css>
            .myJumbotron {
                 background-color:#ff3600;
                 color:white;
                  padding: 10px;
                  font-family:verdana;
                  min-height: 100px;
                  
                        }
            .mylogin{
                min-height:100px;
               width:700px;
               margin: 0 auto;
            }


            </style>
    </head>
    <body>
    <div class="jumbotron myJumbotron" style="background-color:#f9e5a9; margin-bottom: 0;">
            <div class="container text-center">
                <h1>The Roti Spot</h1>
                <p>A Caribbean Experience</p>
            </div>
    </div>
<div style="background-color:#f9e5a9;">
    <div class="container">
       <div class="jumbotron mylogin" style="background-color:#ff9d68;">
            <h2>For the Hard Worker</h2>
            <h3>Employee Login </h3>
            <br></br>
            <form method="POST" action="employeeconfirm.php">
        <div class="form-group row" style= "text-align:center; padding-left: 35%; position:relative;">
            <div class="col-xs-6" >
           <div class="form-group"> <span class="glyphicon glyphicon-user"></span>
        <label for="usr">Username:</label>
         <input type="text" class="form-control" id="usr" name="username" required>
           </div>
           <div class="form-group"> <div class="form-group"> <span class="glyphicon glyphicon-lock"></span>
                 <label for="pwd">Password:</label>
                 <input type="password" class="form-control" id="pwd" name="pass" required>
           </div>
           <button type="submit" name="submit" class="btn btn-primary active">Log In</button>
           </div>
           </div>
           </form>
           </div>
       </div>
       <div class="row">
</div>
</div>
<div class="jumbotron" style="background-color:#f9e5a9;">
<p align="center"><a href="../index.html">Return to Index</a></p>

</div>
<div class="container">
</div>
    </body>
</html>
