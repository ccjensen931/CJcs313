<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Team Activity 3</title>
</head>
<body>
<form action="formHandler.php" method="post">
    Name: <div class="form-group">
      <label for="name"></label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    Email: <div class="form-group">
      <label for="email"></label>
      <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
<!--     Major: <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="major" id="CS" value="Computer Science">
        Computer Science<br>
        <input type="radio" class="form-check-input" name="major" id="WDD" value="Web Design and Development">
        Web Design and Development<br>
        <input type="radio" class="form-check-input" name="major" id="CIT" value="Computer Information Technology">
        Computer Information Technology<br>
        <input type="radio" class="form-check-input" name="major" id="CE" value="Computer Engineering">
        Computer Engineering<br>
      </label>
    </div> -->

    Major: <div class="form-check">
    <label class="form-check-label">
    <?php $majors = array("CS" => "Computer Science",
        "WDD" => "Wed Design and Development",
        "CIT" => "Computer Information Technology",
        "CE" => "Computer Engineering");
        
        foreach($majors as $major => $major_name)
        {
            echo '<input type="radio" class="form-check-input" name="major" id="' . $major . '" value="' . $major_name
                . '">' . $major_name . '<br>';
        }?>
    </label>
    </div><br>

    Select the continents you have visited: <br>
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="continents[]" id="NA" value="NA">
        North America<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="SA" value="SA">
        South America<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="EU" value="EU">
        Europe<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="AS" value="AS">
        Asia<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="AU" value="AU">
        Australia<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="AF" value="AF">
        Africa<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="AN" value="AN">
        Antarctica<br>
      </label>
    </div><br>
    Comments: <div class="form-group">
      <label for="comments"></label>
      <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>