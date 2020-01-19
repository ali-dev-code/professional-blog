<?php require_once 'config/init.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<?php user_login(); ?>
 <div class="row justify-content-lg-center">
    <div class = "col-sm-5" >
    <form action = ""  method = "POST"  >

<div class="form-group">
  <label for="">Username</label>
  <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <?php  if (isset($login_errors['u'])): ?>
                    <span class="text-danger">
                      <?php echo $login_errors['u']; ?>
                    </span>
                    <?php endif;  ?>
  <small id="helpId" class="text-muted">Help text</small>
</div>
<div class="form-group">
  <label for="">Password</label>
  <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <?php  if (isset($login_errors['p'])): ?>
                    <span class="text-danger">
                      <?php echo $login_errors['p']; ?>
                    </span>
                    <?php endif;  ?>
  <small id="helpId" class="text-muted">Help text</small>
</div>

<div class="form-group">
 <button type = "submit"  name = "login"  class = "btn btn-primary" > login  </button>
</div>



</form>

    </div>
 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
