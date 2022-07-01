<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Album example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
<body>
    
<?php
            if(isset($_GET['error'])){
                $er = $_GET['error'];
                echo "<p class=\"error\">$er</p>";
            }
            if (isset($_GET['success'])) {
                $msg = $_GET['success'];
                echo "<p class=\"success\">$msg</p>";
            }
        ?>
<main>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          
          
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mypost.php">My Posts</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="newpost.php">New Post</a>
          </li> 
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="feed.php">Show Feed</a>
          </li> 
          

        </ul>
        <form role="search" style="display:flex" method="post"action="follow.php" > 
          <input class="form-control" style="padding:2px ;margin:auto" type="search" placeholder="Search" aria-label="Search" name="search">
          <span>---</span>
          <input type="submit" style="margin:auto"value="follow">
        </form> 

      </div>
    </div>
  </nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
                include "db_conn.php";
                session_start();
                $currentUserId = intval($_SESSION['user_name']);
                $sql = "SELECT * FROM post WHERE userId in (select following from following where follower = '$currentUserId')";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($post = mysqli_fetch_assoc($res)) { ?>
                      <div class="col">
                        <div class="card shadow-sm">
                        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Post Img</text></svg> -->
                        <img src="uploads/<?=$post['Img']?>">
                        <div class="card-body">
                          <p class="card-text"><?=$post['Caption']?></p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <form action="comment.php" method="post">
                                <input style="display : none" type="text" name="pid" value=<?=$post['pid']?> >
                                <textarea name="comment"  cols="30" rows="10">Comment here</textarea>
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Comment</button>
                              </form>
                            
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                }
            ?>
        
          

        

      </div>
    </div>
  </div>

</main>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>