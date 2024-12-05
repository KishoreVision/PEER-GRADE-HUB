<?php
session_start();
if(isset($_SESSION['tid']))
{
  if(isset($_POST['create']))
  {
    $assn=$_POST['asname'];
    $ye=$_POST['year'];
    $sub=$_POST['sub'];

    echo $assn."<br>".$ye."<br>".$sub;
    require_once 'conn.php';
    $conn=new mysqli($hm,$un,$pw,$db);
    if ($conn->connect_error) 
    {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO assi (assignment,subject,year,record) VALUES ('$assn', '$sub', '$ye','')";
    if ($conn->query($sql) === TRUE) 
    {
      echo "<script>alert('Assignment Created Sucesfully')</script>";
      header('location:t_dashboard.php');   
    }
    else
    {
      echo "<script>alert('Error: $sql <br> $conn->error')</script>";   
    }
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <title>Teacher Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand">
        Assignment

      </h1>
      <span class="navbar-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square"
          viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path
            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
        </svg>
        <?php echo "  ".$_SESSION['tname']." "?><br><br><a href="logout.php" class="btn btn-danger"
          style="color:white">Logout</a>
      </span>
    </div>
  </nav>
  <br>
  <div class="container">
    <nav class="navbar navbar-light border" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
      <ul class="nav nav-pills ">
        <li class="nav-item p-2">
          <a class="nav-link " aria-current="page" href="t_dashboard.php">Assignment</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link active" href="create_assignment.php">New Assignment</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="allstud.php">All Student</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="addstud.php">Add Student</a>
        </li>
      </ul>
    </nav>
    <br>
    <hr>
    <div class="row justify-content-md-center">
      <div class="card" style="width: 40rem;">
        <div class="card-body">
          <div class="alert alert-primary">
            <h5 class="card-title"><h1>New Assignments</h1></h5>
            <h5 class="card-title">Create Assignment</h5>
          </div>
          <hr>
          <form method="POST">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Assignment <sup
                  style='color:red'>*</sup></label>
              <div class="input-group">
                <input type="input" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                  name='asname' aria-label="Upload" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-4 col-form-label" for="inputGroupSelect01">Year</label>
                <div class="input-group">
                  <select class="form-select" id="inputGroupSelect01" name='year' require>
                    <option selected disabled>Choose...</option>
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Fourth</option>
                  </select>
                </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail4" class="col-sm-4 col-form-label">Subject <sup
                  style='color:red'>*</sup></label>
              <div class="input-group">
                <input type="input" class="form-control" id="inputEmail4" aria-describedby="inputGroupFileAddon04" name='sub' aria-label="Upload" required>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" name="create">Post Assignment</button>
            </div>
          </form>

          <br><br>
        </div>
      </div>
    </div>

    <div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ"
        crossorigin="anonymous"></script>
    </div>
</body>

</html>
<?php }
else
{
  header('location:index.html');
}
?>