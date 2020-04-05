<?php
include_once 'config.php';
// We need to use sessions, so you should always start sessions using the below code.



// ---------------- SUBMIT THE FORM

//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];
    $ideaname = $_POST['ideaName'];
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO tbl_files(ideaName, filename, created) VALUES('$ideaname', '$filename', '$created')";
            mysqli_query($con, $sql);
            
            header("Location: adminpage.php?st=success");
        }
        else
        {
            header("Location: adminpage.php?st=error");
        }
    }
    else {
           header("Location: adminpage.php");

    }
}




//if(isset($_SESSION['name'])) {
//  echo "Your session is running " . $_SESSION['name'];
//}
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
include 'header.php';


// fetch files
$sql = "select * from project_files";
$result = mysqli_query($con, $sql);


if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM project_files WHERE ideaName LIKE '%$name%'";
}
$result = $con->query($sql);
?>


<div class="container">
   
    <div class="content">
			<h2 style="text-align: center; font-weight: bold;">Administration</h2>
    </div>

    
    <div class="uploadSection" style="background: white;">
        <label>Search Ideas/Projects</label>
        <form action="" method="GET">
        <input type="text" placeholder="Type here..." name="search" style="margin-bottom: 20px;">&nbsp;
        <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
        </form>
    </div>
    
    <div class="uploadSection2">
            <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Project</th>
                  <th>File Name</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $i = 1;
                        while($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['ideaName']; ?></td>
                            <td><?php echo $row['filename']; ?></td>
                            <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            </div>
            </div>
    </div>
</div>
</body>
</html>