<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Fun Stuff Store</title>
</head>
<body>
    
<?php
    $_SESSION["Test"] = "This is a test.";
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <p> Test 1.1 </p>
        </div>
        <div class="col-4">
            <p> Test 1.2 </p>
        </div>
        <div class="col-4">
            <p> Test 1.3 </p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <p> Test 2.1 </p>
        </div>
        <div class="col-4">
            <p> Test 2.2 </p>
        </div>
        <div class="col-4">
            <p> Test 2.3 </p>
        </div>
    </div>
</div>

<div class="card">
    <img class="card-img-top" data-src="holder.js/100x180/?text=Image cap" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Item 1</li>
        <li class="list-group-item">Item 2</li>
        <li class="list-group-item">Item 3</li>
    </ul>
</div>

<ul class="list-group">
    <li class="list-group-item active">Active item</li>
    <li class="list-group-item">Item</li>
    <li class="list-group-item disabled">Disabled item</li>
</ul>

<nav class="nav justify-content-center">
  <a class="nav-link" href="cart.php">Cart</a>
</nav>

</body>
</html>