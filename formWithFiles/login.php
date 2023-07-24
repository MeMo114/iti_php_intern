<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>

  <div class="container">
    <h2>Login</h2>
    <form method="post" action="validUser.php">
        <div class="form-group">
            <label for="userName">Username:</label>
            <input type="text" name="userName" id="userName" required class="form-control">
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required class="form-control">
            <br><br>
            <input type="submit" value="Login" class= "btn btn-primary btn-lg">
            <a href="addUser.php" class= "btn btn-primary btn-lg">Click here to signUp</a><br><br>

        </div>
      
    </form>

   </div>

  </body>
</html>