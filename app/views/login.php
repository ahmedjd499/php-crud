<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">

</head>
<body>
    <h1>Login</h1>
    <form method="post" action="../../index.php?action=login">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login"> or 
  <a href="index.php?action=register"> Register</a> 
    </form>
</body>
</html>
