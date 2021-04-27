<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="html.css">

	<title>Upload </title>
</head>
<body>
	
	<h4>Note : Please name the file/assignment as your name </h4>
<nav>
        <ul>
            <li><a href="index.html">Home</a></li>
        </ul>
    </nav>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">

			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span>browse</span> to begin the upload
				</p>
			</label>
			<button name="submit" class="btn">Upload</button>
		</form>
	</div>
	<tr>
           <td>
              <?php
			  $conn = mysqli_connect('localhost','root','','upload-system');
               $query2 = "SELECT * FROM filedownload ";
               $run2 = mysqli_query($conn,$query2);
               
               while($rows = mysqli_fetch_assoc($run2)){
                   ?>
               <a href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br>
               <?php
               }
               ?>
           </td>
       </tr>
</body>
</html>

<?php
    $conn = mysqli_connect('localhost','root','','upload-system');
    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "uploads/".$fileName;
        
        $query = "INSERT INTO filedownload(filename) VALUES ('$fileName')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "<script>alert('Thanks for the submission!')</script>";
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
	
	?>

