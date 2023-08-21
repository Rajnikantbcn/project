<?php
$insert = false;
if(isset($_POST['name'])){  
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "contact"; // Replace with your actual database name
    $con = mysqli_connect($server, $username, $password);

    if(!$con) {
        die("Connection failed due to " . mysqli_connect_error());
    }

    // Select the database
    mysqli_select_db($con, $database);

    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $mobile = $_POST['mobile'];
    $text = $_POST['text'];

    $sql = "INSERT INTO `contact` (`name`, `gmail`, `mobile`, `text`, `time`) VALUES ('$name', '$gmail', '$mobile', '$text', current_timestamp());";

    if($con->query($sql) == true){
        // echo "success fully connection";
        $insert = true;
    }  
    else{
        echo "Error: $sql <br> " . $con->error;
    }

    $con->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                   
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    </div>
    <h1 class="text-center">Contact Us</h1>
    <div class="container mx-4">
        
        <form class="form mx-4 my-4" method="post" action="./contact.php">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name"
                    name="name">
            </div>
            <div class="mb-3">
                <label for="gmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                    name="gmail">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Mobile No.</label>
                <input type="phone" class="form-control" id="desc" placeholder="9999999999" name="mobile">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Write your Quary</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-outline-primary">submit</button>
            </div>
            <?php
            if($insert == true){
                echo " <h3> Form Submitted Success </h3> ";
            }
            ?>
        </form>
    </div>

    <footer class="container py-5">
        <div class="row">
          <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
            <small class="d-block mb-3 text-body-secondary">© 2017–2023</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary text-decoration-none" href="#">Business</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Education</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Government</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Gaming</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary text-decoration-none" href="#">Team</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
              <li><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>