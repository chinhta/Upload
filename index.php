<?php
   
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,JPG,PNG or GIF file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploaded-pic/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
?>
<style type="text/css">
    #display-image{
    max-width: 40%;
    max-height: 40%;
    justify-content: center;
    padding: 5px;
    margin: 15px;
}
</style>

<html>
   <body>
        <form action = "" method = "POST" enctype = "multipart/form-data">
            <input type = "file" name = "image" onchange="form.submit()"/>
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
        </form>
        <img id="display-image" src="./uploaded-pic/<?php echo $_FILES['image']['name']; ?>">
   </body>
   
</html>
