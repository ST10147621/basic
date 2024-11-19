    
<!---start session--->
<?php 
//include the link 


?>


<?php 

if($_GET['on'] =="yes"){
    
    include "links.php";

    ?>
<!----put the form in--->
<body style="background-color:white;">
  <div style="width: 100%;background-color:white">
<form style="background-color:white" method="post" class="log-form" action="action.php?add=yes"  enctype='multipart/form-data'>
    
        
        <div class="group log-input">
        <h3 class="book_tags">Item name:</h3>
                 
        
        <input style="width: 100%;height:2rem"  id="names"  class="upload_fields"  type="text" name="name" placeholder="Enter Item name" required/>
        </div>
        
        <div class="group log-input">
                  <h3 class="book_tags">Item price:</h3>
                  <input style="width: 100%;height:2rem"  id="prices" class="upload_fields" type="number" name="price" placeholder="Enter Item price" required/>
        </div>
        <div class="group log-input">
                  <h3 class="book_tags">Item(stock) number:</h3>
                  <input style="width: 100%;height:2rem"  id="prices" class="upload_fields" type="number" name="stock" placeholder="Enter Item price" required/>
        </div>
           <div class="group log-input">
                
                  <h3 class="book_tags">Item image:</h3>
                  <input  style="width: 100%;height:2rem"  onchange="load(event)" name="paths" style="width:50%;margin-left:5%;" type="file"   accept=".jpg,.png" placeholder="choose the Item photo"  value=""/>
                  </div> 
                  
                 
        <?php 

//then check the session after  adding the task
//do research on sessions
if(!empty( $_SESSION['user_found'])){
   
   //clear the session
    $_SESSION['user_found']="";
?>
<div style="color:red;font-size:12px;width:100%"> Item is added</div>
<br><br>
<?php }?> 

        <div class="group">
    <button type="submit" class="btn">     ADD</button>

  
  
  </div>
      </form>
     
    </div>
    <div class="group" style="width: 20%;">



<a href="items.php"> <button type="submit" class="btn"  >    View cloths</button></a>
    </div>
<?php }else{


?>
<br><br>



<div  style="width: 100%;display:flex;height:auto;background-color:white;flex-wrap:wrap">

<?php 
//inclde the connect script
session_start();
include "conn.php";
//count
$count=(int)0;

//your email from the session
$email = $_SESSION['email'];

//then do the query by checking the email
$query = "select * from products;";
$done = mysqli_query($conn,$query);
while($row  = mysqli_fetch_array($done)){

  //counting
  $count++;
?>
<div  style="margin-left:2rem;color:gray;margin-top:2rem">

<img class="log-form"  style="width: 250px;height:350px" src="<?php echo $row['image_url'];?>"/>

<p>Name: <?php echo $row['title'];?></p>


<p>Price: R<?php echo number_format($row['price'],2);?></p>


   
    <a href="edit.php?dds=<?php echo $row['id'];?>">Edit</a>


</div>

<?php

}
?>

</div>
  

<!---end table--->
  


<br><br>
<a href="tables_item.php?on=yes"> <button type="submit" class="btn" style="background-color: black;color:white;height:2rem;border-radius:10px;cursor:pointer" >    Add cloths</button></a>
    </div>
<?php }?>
</body>