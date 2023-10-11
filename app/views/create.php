<!-- views/create.php (View) -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">

</head>
<body>
    <h1>Register</h1>
    <form action="?action=register" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
        or 
        <a href="index.php?action=login"> Login </a> 
    </form>
</body>
</html>
