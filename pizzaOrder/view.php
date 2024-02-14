<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<div class="container">

    <?php
    require "/home/dragonfl/dbpizza.php";

    $sql = "SELECT * FROM orders";
    $result = @mysqli_query($cnxn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $phone = $row["phone"];
        $email = $row["email"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $size = $row["pizza_size"];
        $toppings = explode("_", $row["pizza_toppings"]);
        $toppingsStr = "";

        foreach ($toppings as $value) {
            $toppingStr = $toppingStr . $value . " ";
        }
        $toppings = implode(", ", $toppings);


        $delivery = $row["delivery"] == 1 ? 'Delivery' : 'Takeout';
        $notes = $row["notes"];


        echo "
        <div class='order'>
            <div class='p-5'>
                <h3>Customer Details</h3>
                <p><span>Order ID:  </span>" . $id . "</p>
                <p><span>Name:  </span>" . $name . "</p>
                <p><span>Phone:  </span>" . $phone . "</p>
                <p><span>Email:  </span>" . $email . "</p>
                <p><span>Address:  </span>" . $address . ", " . $city . " " . $state . "</p>
                <h3>Order Details</h3>
                <p><span>Size:  </span>" . $size . "</p>
                <p><span>Toppings:  </span>" . $toppings . "</p>
                <p><span>Takeout or Delivery:  </span>" . $delivery . "</p>
                <p><span>Notes:  </span>" . $notes . "</p>
            </div>
        </div>
        ";
    }
    ?>

</div>
</body>
</html>
