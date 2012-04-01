<!--http://www.totallyphp.co.uk/scripts/password_protect_a_page.htm------------------->
<?php 

// Define your username and password 
$username = "someuser"; 
$password = "somepassword"; 

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 

?> 

<h1>Login</h1> 

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <p><label for="txtUsername">Username:</label> 
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p> 

    <p><label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p> 

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 

<?php 

} 
else { 

?> 

<p>This is the protected page. Your private content goes here.</p> 

<?php 

} 

?>

<!--http://www.developershome.com/wap/wapUpload/wap_upload.asp?page=php5------------------------------------>

<!--file_upload.php-->
<?php header('Content-type: application/vnd.wap.xhtml+xml'); ?>
<?php echo '<?xml version="1.0"?' . '>'; ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>File Upload Example</title>
  </head>

  <body>
    <h1>Data Received at the Server</h1>
    <hr/>
    <p>

<?php
foreach ($_POST as $key => $value){
?>

<b>Name-value Pair Info:</b><br/>
Field name: <?php echo $key; ?><br/>
Field value: <?php echo $value; ?><br/><br/>

<?php
}

$optionalFileName = $_POST['filename'];

if ($_FILES['myFile']['error'] == UPLOAD_ERR_OK){
  $fileName = $_FILES['myFile']['name'];
?>

<b>Uploaded File Info:</b><br/>
Content type: <?php echo $_FILES['myFile']['type']; ?><br/>
Field name: myFile<br/>
File name: <?php echo $fileName; ?><br/>
File size: <?php echo $_FILES['myFile']['size']; ?><br/><br/>

<?php
  /* Save the uploaded file if its size is greater than 0. */
  if ($_FILES['myFile']['size'] > 0){
    if ($optionalFileName == "")
      $fileName = basename($fileName);
    else
      $fileName = $optionalFileName;

    $dirName = '/file_uploads/';

    if (move_uploaded_file($_FILES['myFile']['tmp_name'], $dirName . $fileName)){
?>

<b>The uploaded file has been saved successfully.</b>

<?php
    }
    else{
?>

<b>An error occurred when we tried to save the uploaded file.</b>

<?php
    }
  }
}
?>

    </p>
  </body>
</html>

<!--http://www.webcheatsheet.com/PHP/file_upload.php------------------------------------>

<!--index.php-->
<html> 
<body>
  <form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    Choose a file to upload: <input name="uploaded_file" type="file" />
    <input type="submit" value="Upload" />
  </form> 
</body> 
</html>

<!--upload.php-->
<?php
//Check that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  //Check if the file is JPEG image and it's size is less than 350Kb
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
    ($_FILES["uploaded_file"]["size"] < 350000)) {
    //Determine the path to which we want to save this file
      $newname = dirname(__FILE__).'/upload/'.$filename;
      //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           echo "It's done! The file has been saved as: ".$newname;
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
      }
  } else {
     echo "Error: Only .jpg images under 350Kb are accepted for upload";
  }
} else {
 echo "Error: No file uploaded";
}
?>

<!--http://www.devarticles.com/c/a/PHP/Creating-a-MultiFile-Upload-Script-in-PHP/------------------------------------>

<!--uploadForm1.php-->
<html>
<head>
<title># of Files to Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="uploadForm2.php">
  <p>Enter the amount of boxes you will need below. Max = 9.</p>
  <p>
    <input name="uploadNeed" type="text" id="uploadNeed" maxlength="1">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
</body>
</html>

<!--uploadForm2.php-->
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<form name="form1" enctype="multipart/form-data" method="post" action="processFiles.php">
  <p>
  <?
  // start of dynamic form
  $uploadNeed = $_POST['uploadNeed'];
  for($x=0;$x<$uploadNeed;$x++){
  ?>
    <input name="uploadFile<? echo $x;?>" type="file" id="uploadFile<? echo $x;?>">
  </p>
  <?
  // end of for loop
  }
  ?>
  <p><input name="uploadNeed" type="hidden" value="<? echo $uploadNeed;?>">
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
</body>
</html>

<!--processFiles.php-->
<?php
$uploadNeed = $_POST['uploadNeed'];
// start for loop
for($x=0;$x<$uploadNeed;$x++){
$file_name = $_FILES['uploadFile'. $x]['name'];
// strip file_name of slashes
$file_name = stripslashes($file_name);
$file_name = str_replace("'","",$file_name);
$copy = copy($_FILES['uploadFile'. $x]['tmp_name'],$file_name);
 // check if successfully copied
 if($copy){
 echo "$file_name | uploaded sucessfully!<br>";
 }else{
 echo "$file_name | could not be uploaded!<br>";
 }
} // end of loop
?>

<!---->
