    
<!---start session--->
<?php 
//include the link 
include "links.php";


?>
<body style="background-color:white;">
<div class="log-form" style="background-color:white;">
<div style="border-radius: 100%;width:100%;height:15rem;background-color:white;text-align:center" >

<img src="images/logo.jpg" style="margin-top:2.5rem;border-radius: 100%;width:50%;height:10rem;background-color:aliceblue">
<br>
<?php 
echo  $_SESSION['login_'] ;
?>
        </div> 
        <br>
<div class="group" style="background-color:white;">



<a onclick="clicked('home')" > <button type="submit" class="btn">     Income Tracker</button></a>
        </div>  
        <div class="group" style="background-color:white;">



<a onclick="clicked('users')" > <button type="submit" class="btn">     Manage Users</button></a>
        </div>    
        <div class="group">
   <a onclick="clicked('add')" > <button type="submit" class="btn">  Add Clothes   </button></a>
        </div> 
        <div class="group">
   <a onclick="clicked('view')"> <button type="submit" class="btn">  View Clothes   </button></a>
        </div> 
        <div class="group">
   <a onclick="clicked('adds')"> <button type="submit" class="btn">  New Admin   </button></a>
        </div> 


        <div class="group">
   <a onclick="clicked('message')"> <button type="submit" class="btn"> Message     </button></a>
        </div> 

        
        <div class="group">
        <a href="index.php"> <button type="submit" class="btn">  Home Page  </button></a>
        </div>
</div>







<div  style="width: 100%;display:flex;height:auto;background-color:white;flex-wrap:wrap">
<iframe id="src" src="landing_admin.php" style="background-color:white;border:none;width:100%;height:100vh"></iframe>

</div>
</body>

<script>

    function clicked(element){

if(element=="home"){
document.getElementById("src").src="landing_admin.php";
}else if(element=="add"){
    document.getElementById("src").src="tables_item.php?on=yes";
}else if(element=="view"){
    document.getElementById("src").src="items.php?on=no";
}else if(element=="users"){
       document.getElementById("src").src=" admin_manage_users";
}
else if(element=="adds"){
       document.getElementById("src").src=" admins.php";
}
else if(element=="message"){
       document.getElementById("src").src=" message.php";
}
    }
</script>