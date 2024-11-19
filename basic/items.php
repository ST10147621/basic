

<div  style="width: 100%;display:flex;height:auto;background-color:white;flex-wrap:wrap">

<?php 
//inclde the conn script
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

<p>Stock available: <?php echo $row['total_added'];?></p>
<p>Price: R<?php echo number_format($row['price'],2);?></p>


   
    <a href="edit.php?dd=<?php echo $row['id'];?>">Edit</a>
    <a href="action.php?dd=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>

</div>

<?php

}
?>

</div>