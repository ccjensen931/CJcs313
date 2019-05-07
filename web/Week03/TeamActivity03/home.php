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
    Name: <div class="form-group">
      <label for="name"></label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    Email: <<div class="form-group">
      <label for="email"></label>
      <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    Major: <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="cs" id="cs" value="checkedValue" checked>
        Computer Science
        <input type="radio" class="form-check-input" name="wdd" id="wdd" value="checkedValue" checked>
        Web Design and Development
        <input type="radio" class="form-check-input" name="cit" id="cit" value="checkedValue" checked>
        Computer Information Technology
        <input type="radio" class="form-check-input" name="ce" id="ce" value="checkedValue" checked>
        Computer Engineering
      </label>
    </div>
    Comments: <div class="form-group">
      <label for="comments"></label>
      <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
    </div>
</body>
</html>