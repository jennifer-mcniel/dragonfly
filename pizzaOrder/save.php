<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Placed</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<?php
require '/home/dragonfl/dbpizza.php';

$name = $_POST['Name'];
$phone = $_POST['Telephone'];
$email = $_POST['Email'];
$address = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$pizza_size = $_POST['size'];

$pizza_toppings = ""; // String concatenate toppings

$topping;
$cnt = 1;
for ($i=1; $i<9; $i++) {
    $topping = topping.$i;
    if(isset($_POST["$topping"])) {
        $pizza_toppings = $pizza_toppings . $_POST["$topping"];
        if ($cnt < 3){
            $pizza_toppings = $pizza_toppings . "_";
        }
        $cnt++;
    }
}

$deliver = $_POST['delivery'] === 'Delivery' ? 1 : 0; //boolean??
$notes = $_POST['Notes'];


$sql = "INSERT INTO `orders` (`name`, `phone`, `email`, `address`, `city`, 
`state`, `pizza_size`, `pizza_toppings`, `delivery`, `notes`) VALUES ('$name', 
'$phone', '$email', '$address', '$city', 'WA', '$pizza_size', '$pizza_toppings', $deliver, '$notes')";

//echo $sql;


echo
    "
        <div class='container'>
            <h2>Your order has been placed!</h2>
            <div class='order'>
                <div class='p-5'>
                    <h3>Customer Details</h3>
                    <p><span>Name:  </span>" . $name . "</p>
                    <p><span>Phone:  </span>" . $phone . "</p>
                    <p><span>Email:  </span>" . $email . "</p>
                    <p><span>Address:  </span>" . $address . ", " . $city . " " . $state . "</p>
                    <h3>Order Details</h3>
                    <p><span>Size:  </span>" . $pizza_size . "</p>
                    <p><span>Toppings: </span>" . implode(", ", explode("_", $pizza_toppings)) ."</p>
                    <p><span>Takeout or Delivery:  </span>" . $_POST['delivery'] . "</p>
                    <p><span>Notes:  </span>" . $notes . "</p>
                </div>
            </div>
        </div>
    ";

$result = @mysqli_query($cnxn, $sql);

?>

</body>
</html>
