<?php 
include_once("./header.php");
$select =  $conn->query("SELECT * FROM `blogs`");

?>

<body id="page-top">

    <div id="wrapper">

 <?php include_once("./sidebar.php");  ?>

       
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

<?php include_once("./navbar.php");  ?>
          

                
                <div class="container-fluid">

                
                     


   <table id="myTable" class="display table" data-page-length='5'>
    <thead>
        <tr>
            <th>Sn</th>
            <th>Title</th>
            <th>IMAGE</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php   
          if ($select->num_rows > 0) {
                    $sn= 1;
                    while($data = $select->fetch_object()){
                    ?>
                    <tr>
                    <td><?= $sn; ?></td>
                    <td><?= $data->title ?></td>
                    <td><img src='../img/<?= $data->images ?>' /></td>
                   
                    <td>
                    <button  class='btn btn-sm btn-warning editcat'
                    data-name="<?= $data->name ?>" data-id="<?= $data->id ?>"><i class="fas fa-edit"></i></button> 

                    <button class='btn btn-sm btn-danger dalcatbtn' data-id = "<?= $data->id ?>"
                    ><i class="fas fa-trash"></i></button>
                    </td>
                    </tr>
                    <?php $sn++;
                 }
          } 
         ?>


    </tbody>
</table>







                </div>
               
                
                
</div>
          
<?php include_once("./footer.php");  ?>