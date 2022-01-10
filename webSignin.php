<?php
$conn = mysqli_connect("localhost","root","","pathshaladb");
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $userid = $_POST["userid"];
  $password = $_POST["password"];
  $password2 = $_POST["confirmPassword"];
  $role = $_POST["role"];

  if($password == $password2){
    $query = "INSERT INTO pathshaladata (name,address,email,phone,password,role,id) VALUES ('$name','$address','$email','$phone','$password','$role','$userid')";
    $result = mysqli_query($conn,$query);
    if($result==true){?>
    <script>alert("Success");</script>
    <?php }
    else{
      echo "Wrong";
    }
  }
  else{
    ?>
    <script>alert("Password did not matched");</script>
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
    <link src="js/jquery-3.5.1.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
    

        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"/>
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.css"
    rel="stylesheet"/>



    <link rel="stylesheet" href="css/webSignin.css">
</head>
<body>
    <div class="navbar w-100 upperNav">
        <h1 class="text-center container d-inline-block p-3 titleCust">Create Account</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 float-left">
                    <img src="images/classroom.png" class="navBrandCust img-fluid" alt="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 float-right">
                    <form class="formCustom form my-3" id="signup" method="POST">
                        <!-- 2 column grid layout with text inputs for the names -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="username" name="name" class="form-control" />
                              <small></small>
                              <label class="form-label">Name</label>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Address input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="address" name="address" class="form-control" />
                          <small></small>
                          <label class="form-label">Address</label>
                        </div>
                      
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="email" name="email" class="form-control" />
                          <small></small>
                          <label class="form-label">Email</label>
                        </div>
                      
                        <!-- Number input -->
                        <div class="form-outline mb-4">
                          <input type="number" id="phone" name="phone" class="form-control" />
                          <small></small>
                          <label class="form-label">Phone</label>
                        </div>
                        <!-- Id input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="userid" name="userid" class="form-control" />
                          <small></small>
                          <label class="form-label">Id</label>
                        </div>
                      
                        <!-- Password -->
                        <div class="form-outline mb-4">
                          <input type="password" name="password" id="password" class="form-control" />
                          <small></small>
                          <label class="form-label">Password</label>
                        </div>
                        
                        <!--Confirm Password -->
                        <div class="form-outline mb-4">
                          <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" />
                          <small></small>
                          <label class="form-label">Confirm Password</label>
                        </div>

                        <!-- User Role input -->
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form6Example7">Your Role?</label><br>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="Teacher" id="Teacher">
                            <label class="form-check-label" for="Teacher">
                              Teacher
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="Student" id="Student" checked>
                            <label class="form-check-label" for="Student">
                              Student
                            </label>
                          </div>
                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                          <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked/>
                          <label class="form-check-label"> Create an account? </label>
                        </div>
                      
                        <!-- Submit button -->
                        <input type="submit" value="Sign up" name="submit" class="btn btn-primary btn-block mb-4 button">
                      </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div></div>



    <div class="text-center p-1 footerNav">
      <p class="text-center text-light fs-5 mt-2">&copy; 2021 Copyright Tech Rhythms</p>
    </div>

      
    
    <link src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    <link src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- MDB -->
    <link
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/javascript" src="js/webSignin.js">
</body>
</html>