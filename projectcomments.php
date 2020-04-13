<?php
include_once 'config.php';
include 'header.php';

// here we get the incomming id
$project_id = $_GET['id'];

$query = 'SELECT ideaName FROM project_files WHERE id = ' . $project_id;
$result = mysqli_query($con, $query);


//------- SUBMIT THE COMMENT

//check if form is submitted
if (isset($_POST['submit']))
{
    $comment = $_POST['comment'];
    $id = $_POST['project_id'];
    
    //upload file
    if($comment != '')
    {
    // insert file details into database
            $sql = "INSERT INTO projectcomments(project_id, comment) VALUES('$id', '$comment')";
            mysqli_query($con, $sql);
            header("Location: projectcomments.php?id=$project_id?st=success");
    }
    else {
           header("Location: projectcomments.php?id=$project_id");
    }
}


//$query2 = 'SELECT * FROM projectcomments WHERE project_id = ' . $project_id;
$query2 = 'SELECT * FROM projectcomments';
$result2 = mysqli_query($con, $query2);

?>

<div class="uploadSection2">
    <div class="row">     
        <div class="col-xs-12">
            <table class="table table-striped table-responsive">
            <thead><h1>PROJECT NAME</h1> <br>
                <?php
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th><?php echo $row['ideaName']; ?></th>
                </tr>
                <?php } ?>
            </thead>
            <tbody>
                <?php
                while($row2 = mysqli_fetch_array($result2)) { ?>
                <tr>
                    <td><?php echo $row['comment']; ?></td>
                </tr>

            </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>

<div class="uploadSection">
            <div class="row">
                <div class="col-xs-12">
<!--                <form action="projectcomments.php?id=<php echo $row['project_id']; ?>" method="post" enctype="multipart/form-data"><php } ?>-->
                <form action="projectcomments.php" method="post" enctype="multipart/form-data">
                    <legend>Comment</legend><br>
                    <textarea name="comment" required></textarea><br><br>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Add Comment" class="btn btn-info"/>
                    </div>
                    <?php if(isset($_GET['st'])) { ?>
                        <div class="alert alert-danger text-center">
                        <?php if ($_GET['st'] == 'success') {
                                echo "Comment Added Successfully!";
                            }
                            else
                            {
                                echo 'Error Adding Comment';
                            } ?>
                        </div>
                    <?php } ?>
                </form>
                </div>
            </div>
    </div>