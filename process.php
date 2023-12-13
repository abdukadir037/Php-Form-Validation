
<?php 

if(isset($_POST['submit'])){
    
    // personal information
    if (!preg_match('/^[\p{L} ]+$/u', $_POST['personalName'])){
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span> Name must contain letters and spaces only!</h2>";                    
        exit();
      }

    if (empty($_POST['pob']) || $_POST['pob'] == 'Place Of Birth') {
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span> Place of Birth is required</h2>";                    
        exit();
    }
    
    // academic information
    if (empty($_POST['faculty']) || $_POST['faculty'] == 'Select Faculty') {
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span> Faculty is required</h2>";                    
        exit();
    }
    if (empty($_POST['department']) || $_POST['department'] == 'Select Department') {
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span> Department is required</h2>";                    
        exit();
    }
    if (empty($_POST['class']) || $_POST['class'] == 'Select Class') {
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span> Class is required</h2>";                    
        exit();
    }


    // image
    if(!empty($_FILES['img']))

    // image upload
    if(!empty($_FILES['img'])){
    $targetDir = "assets/";
    $targetFile = explode(".", $_FILES['img']['name']);
    // allowed extensions
    $extensions = ["jpg", "png", "jpeg", "gif"];
    $ext = strtoLower(end($targetFile));
    if(!in_array($ext,$extensions)){
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span>Invalid file format. Only image files are allowed.</h2>";                    
        exit();
    }
    // if file exists
    if(file_exists($targetDir.$_FILES['img']['name'])){
        echo "<h2 style = 'text-align: center; padding: 200px'><span style = ' color: red;'>Error:</span>".$_FILES['img']['name']." already exists. </h2>";                    
        exit();
    }
    $targetFile = end($targetFile);
    if(move_uploaded_file($_FILES['img']['tmp_name'],$targetDir.$_FILES['img']['name'])){
        // successfully
        $img = $targetDir.$_FILES['img']['name'];
    }
    else {
        echo 'Error uploading file.';
      }
    }




    // personal information
    $personalName = $_POST['personalName'];
    $personalEmail = $_POST['personalEmail'];
    $personalPhone = $_POST['personalPhone'];
    $personalAddress = $_POST['personalAddress'];
    $pob = $_POST['pob'];
    $dob = $_POST['dob'];
    $personalSex = $_POST['personalSex'];

    // parent information
    $parentName = $_POST['parentName'];
    $parentPhone = $_POST['parentPhone'];
    $relationship = $_POST['relationship'];

    // academic information
    $id = $_POST['id'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $class = $_POST['class'];
    $dor = $_POST['dor'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
        .wow{
            width: 120px;
            height: 120px;
            background: url('<?php echo $img ?>') no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="my-3">
    <!-- <h2 class = "display-3 px-4">Student Form</h2> -->
    <table class = "table caption-top table-condensed table-bordered table-info">
        <caption>Personal Information</caption>
        <!-- img -->
        <div class="container-fluid wow rounded-circle text-center">
        </div>
     
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Place Of Birth</th>
            <th>Date Of Birth</th>
            <th>Sex</th>
            
        </tr>
 
        <tr>
            <td><?php echo $personalName ?></td>
            <td><?php echo $personalEmail ?></td>
            <td><?php echo $personalPhone ?></td>
            <td><?php echo $personalAddress ?></td>
            <td><?php echo $pob ?></td>
            <td><?php echo $dob ?></td>
            <td><?php echo $personalSex ?></td>
           
        </tr>

    </table>

    <table class = "table caption-top table-striped table-bordered table-info">
        <caption>Parent Information</caption>
    
        <tr>
            <th>Name</th>     
            <th>Phone</th>     
            <th>Relationship</th>     
            
        </tr>
        <tr>
            <td><?php echo $parentName ?></td>
            <td><?php echo $parentPhone ?></td>
            <td><?php echo $relationship ?></td>      
        </tr>
    </table>

    <table class = "table caption-top table-stripedo table-bordered table-info">
        <caption>Academic Information</caption>
    
        <tr>
            <th>ID</th>     
            <th>Faculty</th>     
            <th>Department</th>     
            <th>Class</th>     
            <th>Date of Registeration</th>     
            
        </tr>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $faculty ?></td>
            <td><?php echo $department ?></td>
            <td><?php echo $class ?></td>      
            <td><?php echo $dor ?></td>      
        </tr>
    </table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>