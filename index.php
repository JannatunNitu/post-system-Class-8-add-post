<?php
session_start();

// print_r($_SESSION['form_errors']['details_error']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <!-- navigation section starts here -->
    <nav class="navbar navbar-expand-lg" style="padding: 30px 0 50px 0;">
      <div class="container">
        <a class="navbar-brand" href="index.php" style=" font-size:40px; font-weight:700; color:#157347;">Post System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="menu">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class=" btn btn-success" aria-current="page" href="index.php" style="margin-right: 30px; font-size:30px;">Add post</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-success" href="./database/all_post.php" style="font-size:30px;">All post</a>
            </li>
          </ul>
       
    
        </div>
      </div>
    </nav>
    <!-- navigation section ends here -->

    <!-- form section starts here -->
    <div class="card col-4 m-auto">
    <form action="./controller/post_sys.php" method="POST" style="text-align: center; padding:40px 0; background-color:#ddd;">
     <input name="author" 
     value="<?=isset($_SESSION['old']['author']) ? $_SESSION['old']['author'] : '' ?>" 
     type="text" style="width: 300px; height:50px; border-radius: 10px; border: 2px solid #ddd; margin-bottom:5px;"  placeholder="Enter your name"><br>
     <!-- error msg show -->
    <?php
     if(isset($_SESSION['form_errors']['author_error'])){

    ?>  
      <span class="text-danger" style="margin-left:-180px;">
     <?= $_SESSION['form_errors']['author_error'] ?>
     </span><br>
    <?php 
     }
    ?>
     <input name="title" 
     value="<?=isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : '' ?>" 
     type="text" placeholder="Enter your post title" style="width: 300px; height:50px; border-radius: 10px; border: 2px solid #ddd; margin-top:10px;"> <br>
     <!-- title error show-->
     <?php
     if(isset($_SESSION['form_errors']['title_error'])){
     ?> 
        <span class="text-danger" style="margin-left:-180px;">
        <?= $_SESSION['form_errors']['title_error'] ?>
        </span><br>
     <?php  
     }
     ?>
     
     <textarea name="details" placeholder="Enter your post details" style="width: 300px; height:100px; border-radius: 10px; border: 2px solid #ddd; margin-top:30px;"><?=isset($_SESSION['old']['details']) ? $_SESSION['old']['details'] : '' ?></textarea> <br>
     <!-- details error show -->
     <?php
     if(isset($_SESSION['form_errors']['details_error'])){
     ?> 
      <span class="text-danger" style="margin-left:-170px;">
      <?= $_SESSION['form_errors']['details_error'] ?>
      </span><br>
     <?php 
     }
     ?>
     
     <button class="btn btn-success" style="font-size: 20px; font-weight:700; margin-top:20px;">Submit your post</button>
    </form>
    </div>
    <!-- form section ends here -->

<!-- success popul mssg -->
<div class="toast <?= isset( $_SESSION['msg']) ? "show" : "" ?> " style="position: absolute; bottom:20px; right:20px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-body align-items-center" style="margin-left: 50px;">
  <?= isset( $_SESSION['msg']) ? $_SESSION['msg'] : "" ?>
    <div class="mt-2 pt-2 col-4 m-auto">
    <a href="index.php"><button type="button" class="btn btn-success" data-bs-dismiss="toast">Done</button></a>
    </div>
  </div>
</div>





<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
</body>
</html>

<?php
session_unset();
?>