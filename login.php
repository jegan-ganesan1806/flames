<?php
// Database connection details

$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$host = 'sql12.freesqldatabase.com';
$username = 'sql12629984';
$password = 'Yp9zwpkeWv';
$database = 'sql12629984';
$port = '3306';

$conn = new mysqli($host, $database, $password, $username);
if($conn->connect_error){
  die('Connection failed : '.$conn->connect_error);
}else{
  $sql = "INSERT INTO jodi (name1,name2) VALUES ('$name1', '$name2')";

  if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}   

$conn->close();
$n1=$_POST['name1'];
$n2=$_POST['name2'];
$name1 = strtolower(str_replace(' ', '', $_POST['name1']));
$name2 = strtolower(str_replace(' ', '', $_POST['name2']));

    $count1 = strlen($name1);
    $count2 = strlen($name2);

    $totalCount = $count1 + $count2;

    $commonCount = 0;
    for ($i = 0; $i < $count1; $i++) {
        for ($j = 0; $j < $count2; $j++) {
            if ($name1[$i] == $name2[$j]) {
                $commonCount++;
                $name1[$i] = $name2[$j] = ' ';
                break;
            }
        }
    }

    // Calculate the FLAMES result
    $flames = array('F', 'L', 'A', 'M', 'E', 'S');
    $flamesCount = count($flames);

    // Perform the FLAMES game logic
    $resultCount = $totalCount - $commonCount;
    while ($flamesCount > 1) {
        $index = ($resultCount % $flamesCount) - 1;
        if ($index < 0) {
            $index = $flamesCount - 1;
        }

        // Remove the selected FLAMES letter
        $flames = array_merge(array_slice($flames, 0, $index), array_slice($flames, $index + 1));
        $flamesCount--;
    }

    // Retrieve the FLAMES result
    $result = $flames[0];
    if($result=='F'){
        $fin="you and " . $n2 . " Friends";
        $img="friends.png";
    }else if($result=='L'){
        $fin = "you are lucky to get " . $n2 . " as your love";
        $img="lovers.jpg";
    }else if($result=='A'){
        $fin = "We found that you are having affection with " . $n2 . " :)";
        $img="affection.png";
    }else if($result=='M'){
        $fin = "hey " . $n1 . " you find your life partner you are going to marry " . $n2;
        $img="marriage.jpg";
    }else if($result=='E'){
        $fin = $n1 . ", it's better to stay away from " . $n2 . " because he is your enemy";
        $img="enemy.jpg";
    }else if($result=='S'){
        $fin = $n1 .",you found your sibbling";
        $img="sibblings.jpg";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="next">
    <div class="result">
        <?php echo $fin;
        ?>
    </div>
    <div class="image">
        <img class="im" src="<?php echo $img;?>" alt="">
    </div>
</body>
</html>