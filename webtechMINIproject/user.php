<?php include($_SERVER['DOCUMENT_ROOT'].'/change_miniProject/includes/header.php') ?>  
<?php include($_SERVER['DOCUMENT_ROOT'].'/change_miniProject/includes/nav.php') ?>  
<style>

 #mainWrap, img{
        height: auto;
        
    }

</style>

<?php 
    


if($_SESSION["Name"]){
    echo "<div class='userPanel'><h1>Welcome {$_SESSION["Name"]}</h1>";
}



?>


