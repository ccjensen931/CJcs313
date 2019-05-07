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
<form action="newPage.php" method="post">
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
    Major: <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="major" id="major" value="cs">
        Computer Science<br>
        <input type="radio" class="form-check-input" name="major" id="major" value="wdd">
        Web Design and Development<br>
        <input type="radio" class="form-check-input" name="major" id="major" value="cit">
        Computer Information Technology<br>
        <input type="radio" class="form-check-input" name="major" id="major" value="ce">
        Computer Engineering<br>
      </label>
    </div>
    <<div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="na">
        North America<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="sa">
        South America<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="eu">
        Europe<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="as">
        Asia<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="au">
        Australia<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="af">
        Africa<br>
        <input type="checkbox" class="form-check-input" name="continents[]" id="continents" value="an">
        Antarctica<br>
      </label>
    </div>
    Comments: <div class="form-group">
      <label for="comments"></label>
      <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>