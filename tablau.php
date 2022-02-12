<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;

            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <center><h1>LISTE DES INSCRITS</h1></center>
    <a href="deconnexion.php">DECONNEXION</a></br>
    <a href="home.php">HOME</a>
    <?php
    session_start();
    if(isset($_SESSION['pass'])&& isset($_SESSION['user'])){
    include_once 'connection.php';
    $result = mysqli_query($conn,"SELECT * FROM login");
    $nblignes = mysqli_num_rows($result);

    echo "<table>
 <tr>
 <td>id</td>
 <td>user_name</td>
 <td>full_name</td>
 <td>e_mail</td>
 <td>photo</td>
 </tr>\n";
 function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    } 
    return false;
}
    for ($i = 0; $i < $nblignes; $i = $i + 1) {
        $id =  mysqli_result($result, $i, "id");
        $user_name = mysqli_result($result, $i, "user_name");
        $full_name =  mysqli_result($result, $i, "full_name");
        $e_mail =  mysqli_result($result, $i, "e_mail");
        $photo = mysqli_result($result,$i,"Photo");
        echo "<tr>
        <td>$id</td>
        <td>$user_name</td>
      <td>$full_name</td>
      <td>$e_mail</td>
      <td><img alt=\"image\" src=\"./photo/".$user_name.".".$photo."\" width=\"150px\" height=\"150px\" </td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);}

    ?>
</body>

</html>