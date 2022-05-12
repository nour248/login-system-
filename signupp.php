<?php
extract($_POST);
include_once("connection.php");
$user_name=$_POST['user_name'];
$full_name=$_POST['full_name'];
$e_mail=$_POST['e_mail'];
$pass=$_POST['pass'];

//ghfghf
        


$requete = "SELECT*FROM login where user_name = '".$user_name."' ";
$result = mysqli_query($conn,$requete);

if(mysqli_num_rows($result))
{
    echo "user name Already Exists"; 
    echo "<p><a href=\"signup.php\">signup</a></p>";
	exit();
}
else{
    
    $img_name=$_FILES['photo']['name'];
    $img_size=$_FILES['photo']['size'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $error=$_FILES['photo']['error'];
    $photo=explode('.',$img_name);
    $file_ext = strtolower(end($photo));
    $query="INSERT INTO login(user_name,full_name,password,e_mail,photo ) VALUES ( '$user_name','$full_name', 'md5($pass)', '$e_mail','$file_ext');";
    $sql1=mysqli_query($conn,$query)or die("Could Not Perform the Query");


}
if($sql1)
{      


        if($error===0){

                move_uploaded_file($tmp_name,"photo/".$user_name.".".$file_ext);
                $requete = "SELECT id FROM login where user_name = '".$user_name."' ";
                $result = mysqli_query($conn,$requete);
                $row= mysqli_fetch_assoc($result);
                $id= $row['id'];
                $sql = "INSERT INTO compte(id,user,pass) VALUES ('$id','$user_name' ,'$pass' );";
                $result2 = mysqli_query ($conn,$sql) ;
                echo "<center><h1>enregistrement reussi</h1>
                <p>vous êtes enregistré sous le nom d'utilisateur: 
                <br>
                <span>".$user_name."</span>
                
                </p> 
                <p><a href=\"home.php\">login</a></p>
                </center>";
            }
        
        else{
            $er='unkown error eccurred';
            header("Location: home.php?error=$er");
        }
}
else{
   header("location: home.php");

}
