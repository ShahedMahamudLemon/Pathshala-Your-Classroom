<?php
session_start();
$conn = mysqli_connect("localhost","root","","pathshaladb");
if(!isset($_SESSION['name'])){?>
<script>
window.location = "webHome.php";
</script>
<?php
}
if(isset($_POST['postBtn'])){
    $catchid=$_SESSION['id'];
    
    if($_SESSION['role']=="Teacher"){
        $title=$_POST['title'];
        $des=$_POST['description'];
        $temail=$_SESSION['email'];
        $query2 = "INSERT INTO dashboardinfo (id,title,description,temail) VALUES ('$catchid','$title','$des','$temail')";
        mysqli_query($conn,$query2);
        
        ?>
<script>
alert("Successfully Posted");
windows.location = "webDashboard.php";
</script>
<?php
    }
    else{
        ?>
<script>
alert("Sorry ,you are a student");
</script>
<?php
    }
}
if(isset($_POST['caCr'])){
    $catchid=$_SESSION['id'];
    
    if($_SESSION['role']=="Teacher"){
        $code=$_POST['code'];
        $query1 = "INSERT INTO classdata (id,classcode) VALUES ('$catchid','$code')";
        mysqli_query($conn,$query1);
        ?>
<script>
alert("Successfully Created");
</script>
<?php
    }
    else{
        ?>
<script>
alert("wrong");
</script>
<?php
    }
}
if(isset($_POST['removebtn'])){
    $cid=$_POST["pid"];
    
    if($_SESSION['role']=="Teacher"){
        $query300 = "DELETE FROM dashboardinfo WHERE postid='$cid'";
        mysqli_query($conn,$query300);
        ?>
<script>
alert("Successfully Deleted");
</script>
<?php
    }
    else{
        ?>
<script>
alert("wrong");
</script>
<?php
    }
}

if(isset($_POST['rmvSt'])){
    $stid=$_POST["sid"];
    
    if($_SESSION['role']=="Teacher"){
        $query3 = "DELETE FROM pathshaladata WHERE id='$stid'";
        mysqli_query($conn,$query3);
        ?>
<script>
alert("Successfully Deleted");
</script>
<?php
    }
    else{
        ?>
<script>
alert("wrong");
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
    <title>Dashboard</title>
    <link rel="icon" href="images/favicon_f.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/webDashboard.css">

</head>

<body>
    <nav class="navbar navbar-inverse fixed-top mb-5">
        <div class="container-fluid">
            <div class="navbar-header mainav">
                <div class="dboard">

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>

                    <div id="mySidepanel" class="sidepanel" windows.load=>

                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="#" onclick="closeNav()" id="dashSB">Dashboard</a>
                        <a href="#" onclick="closeNav()" id="manageSB">Manage</a>
                        <a href="webHome.php" target="_blank" onclick="closeNav()">Site Home</a>
                        <form method="post">
                            <input type="submit" class="btn btn-success btn-sm logout" value="logout"
                                name="logout"></input>
                        </form>
                        <?php 
                            if(isset($_POST['logout'])){
                                session_unset();
                                session_destroy();?>
                        <script>
                        window.location = "webHome.php";
                        </script>
                        <?php
                            }
                        ?>

                    </div>

                    <button class="openbtn" id="openbtn1" onclick="openNav()">&#9776; </button>
                    <a class="navbar-brand navBrandCust" id="hh" href="#">Dashboard</a>

                </div>
                <div class="userName">
                    <a href="#" class="adminName text-decoration-none"><i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $_SESSION['name'] ; ?></a>
                </div>
            </div>
            <script>
            function openNav() {
                document.getElementById("mySidepanel").style.width = "150px";
            }

            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
            </script>

        </div>
    </nav>
    <div class="clearfix"></div>
    <br>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                <!--Recent Notice-->
                <div class="card mt-2 cardCust" id="recentNotice">
                    <div class="card-body">
                        <h3 class="text-center mb-2">Recent Notice</h3>
                        <?php 
    $query9 = "SELECT * FROM dashboardinfo WHERE 1 ORDER BY date DESC"; 

	$result = mysqli_query($conn,$query9);
	

	while ($data = mysqli_fetch_assoc($result)) { 		
			$pt = $data["title"];
			$pd = $data["description"];
            $ptime= $data["date"] ?>
                        <h5><?php echo $pt;?></h5>
                        <span class="font-italic" style="font-size: 0.7rem;"><?php echo $ptime;?></span>
                        <p class="font-weight-light" style="font-size: 1rem;"><?php echo $pd;?><br>
                            <a class="font-weight-bold text-decoration-none" data-toggle="collapse"
                                href="#collapseExample1" role="button" aria-expanded="false"
                                aria-controls="collapseExample"><i class="fa fa-comment" aria-hidden="true"></i>
                                Comments</a>
                        </p>



                        <!--comments-->
                        <div class="collapse bg-light" id="collapseExample1">
                            <div class="commentSec card">
                                <h5 class="text-center">Comments</h5>
                                <div class="userComment ml-2">
                                    <h6><i class="fa fa-user" aria-hidden="true"></i> Md Shuvo Khan</h5>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, sit.</p>
                                        <hr style="background: black;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <?php	
} ?>
                        <!--Comment end-->
                        <hr style="background: gray;">
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Recent Notice End-->
                <div class="clearfix"></div>
                <!--Manage-->
                <form method="post">
                    <div class="card mt-3 cardCust" id="managePost">
                        <div class="card-body">
                            <h3 class="text-center mb-2">Manage Notice</h3>
                            <?Php
                            $query11 = "SELECT * FROM dashboardinfo WHERE 1 ORDER BY date DESC"; 

                            $result = mysqli_query($conn,$query11);
                            while ($data = mysqli_fetch_assoc($result)) {
                            $pt = $data["title"];
                            $pd = $data["description"]; 
                            $ptime= $data["date"]?>
                            <h5><?php echo $pt?></h5>
                            <span class="font-italic" style="font-size: 0.7rem;"><?php echo $ptime;?></span>
                            <p class="font-weight-light" style="font-size: 1rem;"><?php echo $pd?><br>
                                <a class="font-weight-bold text-decoration-none" data-toggle="collapse"
                                    href="#collapseExample3" role="button" aria-expanded="false"
                                    aria-controls="collapseExample"><i class="fa fa-comment" aria-hidden="true"></i>
                                    Comments</a>
                                <input type="hidden" value="<?php echo $data["postid"]?>" name="pid">
                                <button name="removebtn" class="btn btn-outline-primary" type="submit"><i
                                        class="fa fa-trash" aria-hidden="true"></i> Remove Post</button>
                            </p>
                            <!--comments-->
                            <div class="collapse bg-light" id="collapseExample3">
                                <div class="commentSec card">
                                    <h5 class="text-center">Comments</h5>
                                    <div class="userComment ml-2">
                                        <h6><i class="fa fa-user" aria-hidden="true"></i> Md Shuvo Khan</h5>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, sit.
                                            </p>
                                            <hr style="background: black;">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php	
		
} ?>
                            <!--Comment end-->
                            <hr style="background: gray;">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
                <!--Manage End-->
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card text-center mt-3 p-2 cardCust" id="postNotice">
                    <div class="postxt">
                        <h5 class="text-center">Post a Notice</h5>
                    </div>
                    <div class="clearfix"></div>
                    <form action="#" method="Post">
                        <div class="form">
                            <label for="title">Title*</label><br>
                            <textarea name="title" id="" rows="2" placeholder="Title goes here" required></textarea><br>
                            <label for="Post">Description*</label><br>
                            <textarea name="description" id="" rows="3" placeholder="What's in your mind?"
                                required></textarea><br>

                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" name="postBtn" class="btn btn-success btn-sm mt-1">Post</button>
                    </form>
                </div>
                <div class="clearfix"></div>


                <form method="post">
                    <div class="card text-center mt-3 p-2 cardCust" id="manageStudent">
                        <div class="card-body">
                            <h3 class="text-center mb-2">Manage Student</h3>
                            <form action="" method="post">
                                <div class="tableCust mt-3">
                                    <h5 class="text-center">Student List</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                    $queue="select * FROM pathshaladata where role='Student'";
                                    $lebu=mysqli_query($conn,$queue);
                                    while($dt=mysqli_fetch_assoc($lebu)){
                                    ?>
                                        <tr>
                                            <td><?php echo $dt["name"]?></td>
                                            <td><?php echo $dt["phone"]?></td>
                                            <td>
                                                <input type="hidden" value="<?php echo $dt["id"];?>" name="sid">
                                                <button name="rmvSt" title="Remove" class="btn btn-danger"
                                                    type="submit"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </form>
                            <form method="post">
                                <div class="clearfix"></div>
                                <?php
                                $x=$_SESSION['id'];
                            $query100 = "SELECT * FROM classdata WHERE id='$x'"; 

                            $result = mysqli_query($conn,$query100);
                            while ($data = mysqli_fetch_assoc($result)) {
                            $codeid = $data["classcode"];
                        ?>
                                <h6 class="text-center font-weight-light">Class Code: <?php echo $codeid;?></h5>
                                    <?php
                                }?>
                                    <div class="createCLass mt-3">
                                        <h4 class="text-center">Create a new class</h4>
                                        <textarea class="my-1" name="code" id="" cols="43" rows="1"
                                            placeholder="Enter a new code" required></textarea>
                                        <div class="clearfix"></div>
                                        <button type="submit" name="caCr"
                                            class="btn btn-success btn-sm mt-1">Create</button>
                                    </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="text-center p-1 footerNav">
        <p class="text-center text-light fs-5 mt-2">&copy; 2021 Copyright Tech Rhythms</p>
    </div>
    <!--    -->
    <!--    -->
    <!--    -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/webDashboard.js"></script>
</body>

</html>