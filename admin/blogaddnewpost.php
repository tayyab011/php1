<?php 
include_once("./header.php");

$cats = $conn->query("SELECT * FROM catagories");


if (isset($_POST['addpost'])) {
  $title = safuda($_POST['title']);
  $catid = safuda($_POST['catid']);
  $post  = safuda($_POST['post']);
  $fname = $_FILES['img']['name'];
  $tmpname = $_FILES['img']['tmp_name'];


if (getimagesize($tmpname)) {

   $newfilename = uniqid() . "." . pathinfo($fname, PATHINFO_EXTENSION);
   $move = move_uploaded_file($tmpname,"../img/$newfilename"); 
   $id= $_SESSION['user']['id'];
   if ($move) {
     /* echo "<script>alert('hahaha');</script>"; */
    $insert = $conn->query("INSERT INTO `blogs` (`title`, `images`, `cat_id`, `post`, `user_id`) VALUES ('$title','$newfilename',$cat_id,'$post',$id)");
    if ($insert) {
       echo "<script>alert('update successfully')</script>";
    }else{
        echo "<script>alert('sorry')</script>";
    }
  } 

}


}

?>
<link rel="stylesheet" href="./plugins/Trumbowyg-main/dist/ui/trumbowyg.min.css">



<body id="page-top">

    <div id="wrapper">

 <?php include_once("./sidebar.php");  ?>

       
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

<?php include_once("./navbar.php");  ?>
          

                
                <div class="container-fluid">

                 
                    
                    <div class="container-fluid">
                        <div class="mb-4">
                            <h1 class="h3 mb-0 text-gray-800 mb-3">Add Catagories</h1>
                            <div class="col-md-6">
                                
                        <form action='' method='post' enctype="multipart/form-data"> 

                           <input type="text" placeholder='Catagory Title' name='title'  class='form-control' required/>
                        </div>
                        <div class="col-md-6  mb-3  mt-2" >
                            <select name="catid" class='form-control' required>
                             <option selected>Selected An Option </option>
                          <?php 
                          while ($cat=$cats->fetch_object()) {
                           ?>
                       <option value=''><?= $cat->name  ?></option>
                           <?php }?>

                            </select>
                        </div>
                       <textarea  class="mt-4 ml-4"  name='post' id='te' cols='30' rows='10' required></textarea>
                       <div class="col-md-6 custom-file mt-3">
              
              
                       <input type="file" class="custom-file-input"  name='img' required                       accept='image/*'>
                        <label class="custom-file-label bg-gray-500 text-gray-100"                       for="customFile">Upload image</label>
                        <input type='submit' class='btn btn-danger ml-4 mt-3' name='addpost'/>
                        </div>
   
                        
</form>
</div>
                    
 </div>
                
               
                
                
</div>
</div>
       




<script src="./plugins/Trumbowyg-main/dist/trumbowyg.min.js"></script>

<script>
    $(document).ready(function(){

        $('#te').trumbowyg();
    });
</script>


<?php include_once("./footer.php");  ?>