<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_signup.css">
    <title>signup</title>
</head>
<body>
<a href="home.php">page d'acceuil</a>
<h1>Signup:</h1>
<div class="container">   
<br><form action="signupp.php" method="POST" enctype="multipart/form-data">
<P>user_name:</P><input required type="text" name="user_name"><div></div><div class="photo" ><input type="image" alt="image" src="./photo/photo.png" width="150px"> <input type="file" accept="image/png, image/jpeg" name="photo" required></div>
<P>full_name:</P> <input required type="text" name="full_name"> <div class="photo" >
<P>e_mail:</P><input required type="email" name="e_mail"><div></div>
<!-- <P>TEL:</P><input required type="tel" pattern="[0-9]{10}" name="tel"><div></div> -->
<P>password:</P><input required type="password" name="pass"><div></div>

<input class="form-submit" type="submit" name="submit" value="save">

    </form>
</div>
</div>
</body>
</html>