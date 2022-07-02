
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/style.css">

</head>
<body>  
<section class="form-container">

    <form autocomplete="off" action="<?php echo BASE_URL?>login/authentication_login" method="POST">
      <h3>login now</h3>
      <input type="text" name="username" class="box" placeholder="enter your username" required>
      <input type="password" name="password" class="box" placeholder="enter your password" required>
      <input type="submit" class="btn" name="login" value="login now">
      <p>don't have an account? <a href="#">register now</a></p>
   </form>

</section>

</body>
</html>