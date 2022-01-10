<?php
session_start();
$conn = mysqli_connect("localhost","root","","pathshaladb");
if(isset($_SESSION['name'])){ ?>
<script>
window.location = "webDashboard.php";
</script>
<?php } 
    if(isset($_POST["submit"])){
      $email = $_POST["email"];
      $password = $_POST["password"];
      $query = "SELECT * FROM pathshaladata WHERE email='$email' AND password='$password' ";
      $result=mysqli_query($conn,$query);
      if($data=mysqli_fetch_assoc($result)){ 
        $_SESSION['id']=$data['id'];
        $_SESSION['name']=$data['name'];
        $_SESSION['email']=$data['email'];
        $_SESSION['role']=$data['role'];
        ?>
<script>
window.location = "webDashboard.php";
</script>
<?php
      }
      else{
        ?>
<script>
alert("Username or Password did not matched");
</script>
<?php
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dayDreamer</title>
    <link rel="icon" href="images/favicon_f.ico">
    <script src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.css" rel="stylesheet" />



    <link rel="stylesheet" href="css/webHome.css">
</head>

<body>
    <nav class="navbar navbar-dark w-100 upperNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/classroom.png" class="navBrandCust float-left" alt=""><span
                    class="upperNavText">Pathshala</span>
            </a>

            <div class="header_icon">
                <a href="#"><i class="fab fa-facebook-f fabCust"></i></a>
                <a href="#"><i class="fab fa-twitter ml-2 fabCust"></i></a>
                <a href="#"><i class="fab fa-linkedin-in ml-2 fabCust"></i></a>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="Post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form1Example1" name="email" class="form-control" />
                            <label class="form-label" for="form1Example1">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example2" name="password" class="form-control" />
                            <label class="form-label" for="form1Example2">Password</label>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                        checked />
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                </div>
                            </div>

                            <div class="col">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="backgroundCust">
        <div class="topBannerOverlay">
            <nav class="navbar navbar-expand-lg navCust2 mb-3" id="navCust">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars" style="color:rgb(27, 23, 23); font-size:28px;"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse ml-5" id="navbarNav">
                        <ul class="navbar-nav ml-4 mr-5">
                            <li class="nav-item">
                                <a class="nav-link navLinkCust" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkCust" href="#">CLassroom</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkCust" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkCust" href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Login</button>
            </nav>
            <div class="clearfix"></div>
            <div class="container">
                <div class="row">
                    <P class="text-center titleCust">Welcome to Pathshala</P>
                    <div class="clearfix"></div>
                    <P class="qouteTxt mt-3 text-center"><i class="fa fa-quote-left" style="color: wheat;"
                            aria-hidden="true"></i><span> If You are planning for a year, sow rice; if you are planning
                            for a decade, plant trees; if you are planning for a lifetime, educate people – <span
                                class="fs-5">Chinese Proverb</span></span><i class="fa fa-quote-right"
                            style="color: wheat;" aria-hidden="true"></i></P>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btnWrap mt-5">
                            <button class="btn btn-danger btn-rounded btn-lg btnCust float-left" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i
                                    class="fas fa-chalkboard-teacher" style="color: black;"></i> Go to
                                Pathshala</button>
                            <button class="btn btn-info btn-rounded btn-lg btnCust float-left ml-3 btnSU"
                                onClick="window.location='webSignin.php'"><i class="fa fa-sign-in" style="color: black;"
                                    aria-hidden="true"></i> Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card innerCard">
                    <div class="card-body">
                        <h5 class="card-title text-center">Why Pathshala?</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card innerCard">
                    <div class="card-body">
                        <h5 class="card-title text-center">Features</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card innerCard">
                    <div class="card-body">
                        <h5 class="card-title text-center">Contact Us</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="text-center p-1 footerNav">
        <p class="text-center text-light fs-5 mt-2">&copy; 2021 Copyright Tech Rhythms</p>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>