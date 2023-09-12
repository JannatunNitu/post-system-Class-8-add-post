<?php
session_start();
include "./env.php";
$query = "SELECT * FROM posts";
$response = mysqli_query($conn , $query);
$posts = mysqli_fetch_all($response, 1);

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
        <a class="navbar-brand" href="../index.php" style=" font-size:40px; font-weight:700; color:#157347;">Post System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="menu">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class=" btn btn-success" aria-current="page" href="../index.php" style="margin-right: 30px; font-size:30px;">Add post</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-success" href="./all_post.php" style="font-size:30px;">All post</a>
            </li>
          </ul>
       
    
        </div>
      </div>
    </nav>
    <!-- navigation section ends here -->

    <!-- table section starts here -->

     <div class="col-lg-6 mx-auto">
     <table class="table">
        <tr>
            <th>#</th>
            <th>Author</th>
            <th>Title</th>
            <th>Details</th>
        </tr>
        <?php
          if(count($posts)  > 0){
             
          
          foreach($posts as $key=>$post){
        ?>    
            <tr>
            <td> <?= ++$key ?> </td>
            <td> <?= $post['author'] ?> </td>
            <td> <?= $post['title'] ?> </td>
            <td> <?= strlen($post['detail']) > 50 ? substr($post['detail'],0 ,20) .'....' : $post['detail'] ?> </td>
            </tr>
        <?php  
          }
        }
        else{
        ?>  
          <tr>
          <td colspan="4" class="text-center">
            <h2>No data found😩</h2>
          </td>
        </tr>
       <?php 
        }
        ?>

     </table>
     </div>

    <!-- tablesection ends here -->

<!-- success popul mssg -->
<div class="toast <?= isset( $_SESSION['msg']) ? "show" : "" ?> " style="position: absolute; bottom:20px; right:20px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-body align-items-center" style="margin-left: 50px;">
  <?= isset( $_SESSION['msg']) ? $_SESSION['msg'] : "" ?>
    <div class="mt-2 pt-2 col-4 m-auto">
      <button type="button" class="btn btn-success" data-bs-dismiss="toast">Done</button>
    </div>
  </div>
</div>





<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
</body>
</html>

<?php
session_unset();
?>