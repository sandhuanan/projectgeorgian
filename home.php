<?php
include_once 'config.php';



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
    
//File Type Validation
if (in_array($ext, $allowed))
{
//set target directory
    $path = 'uploads/';
    $created = @date('Y-m-d H:i:s');
    move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));

// insert file details into database
    $sql = "INSERT INTO project_files(ideaName, filename, created) VALUES('$ideaname', '$filename', '$created')";
    mysqli_query($con, $sql);

    header("Location: home.php?st=success");
}
else
{
    header("Location: home.php?st=error");
}
}
else 
{
    header("Location: home.php");
}
}

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
include 'header.php';


// fetch files
$sql = "select * from project_files";
$result = mysqli_query($con, $sql);
?>

<style>

.alert {
    margin-top: 30px;
    background: orange;
    width: 200px;
    color: white;
}
    
</style>

<div class="container">
<div class="content">
<h2 style="text-align: center; font-weight: bold;">Student Innovation Team</h2>
</div>
    
<div class="uploadSection">
<div class="row">
    <div class="col-xs-12">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <legend>Project About:</legend><br>
            <textarea name="ideaName" required></textarea><br><br>
            <legend>Upload Project Details*</legend><br>
            <div class="form-group">
                <input type="file" name="file1" required/>
            </div><br>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-info" />
            </div>
            <?php if(isset($_GET['st'])) { ?>
            <div class="alert alert-danger text-center">
            <?php if ($_GET['st'] == 'success') {
                 echo "File Uploaded Successfully!";
            }
            else
            {
                 echo 'Invalid File Extension!';
            } ?>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
    
    
<div class="uploadSection2">
<div class="row">
<div class="col-xs-12">
    <table class="table table-striped table-hover">
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