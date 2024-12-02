<?php

session_start();


$status = isset($_GET['status']) ? $_GET['status'] : '';
$message = isset($_GET['message']) ? $_GET['message'] : '';

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boovel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../icons/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <nav class="navbar bg-light">
    <div class="container">
      <a class="navbar-brand">
        <img src="../icons/logo.png" alt="plane logo" class="logo">
      Boovel</a>
     

      <form class="d-flex" name="email" method="post" action="../includes/waitlist.php">
        <input class="form-control me-2 form_1" type="email" name="email" placeholder="Email" aria-label="email" required>
        <button class="btn btn-outline-success form_1" type="submit">Join Waitlist</button>
        
      </form>
    </div>
  </nav>

  <div class="wrap-for-bg-image"></div>
  <div class="container main">
      <h1>Travel to destinations that need you. <span style="color: #198754; text-transform: uppercase;">Help boost tourism</span> in lesser-known locations</h1>
       <p>Every year, popular tourist destinations attract the majority of visitors, leaving small towns and local businesses struggling. We focus on places that need a tourism boost to thrive. With our travel agency, you can explore these underserved destinations while finding affordable flights, accommodations, and activities. By booking with us, you're not only discovering new places, but you're also helping local communities grow and succeed.</p>
        <form action="../includes/waitlist.php" class="form_2" method="post" name="email">
        <input type="email" class="form-control me-2 input_2" placeholder="Email" name="email">
        <button class="btn btn-success input_2" type="submit">Join Waitlist</button>
        </form> 
        
        <?php if ($status && $message): ?>
        <div style="margin-top: 20px;" class="alert <?php echo ($status == 'success') ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo htmlspecialchars($message); ?>
        </div>
       
    <?php endif; ?>

    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="main.js" async defer></script>
  </body>
</html>