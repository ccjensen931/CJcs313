<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Address Form</title>
</head>
<body>
<div class="form-group">
    <div class="container">
        <div class="row">
            <div class="col-6">
                First Name <input type="text" name="First Name" id="First Name" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="col-6">
                Last Name <input type="text" name="Last Name" id="Last Name" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
        </div>
        <div class="row">
            Email <input type="text" name="Email" id="Email" class="form-control" placeholder="" aria-describedby="helpId" required>
        </div>
        <div class="row">
            Address <input type="text" name="Address 1" id="Address 1" class="form-control" placeholder="" aria-describedby="helpId" required>
        </div>
        <div class="row">
            <div class="col-8">
                Address 2 (Optional) <input type="text" name="Address 2" id="Address 2" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-4">
                City <input type="text" name="City" id="City" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                Zip Code <input type="text" name="Zip Code" id="Zip Code" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="col-4">
                State <input type="text" name="State" id="State" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="col-5">
                Country <input type="text" name="Country" id="Country" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
        </div>
    </div>
</div>
</body>
</html>