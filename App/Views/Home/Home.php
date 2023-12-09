<?php require_once "c:/xampp/htdocs/Myproject/App/Views/Header.php"?>

<div class ="homebody">
    <div class="homecontent1"></div><br>    
    <div class="homecontent2"></div>
    <br>
    <?php 
    if(isset($_SESSION)) {  
        echo $_SESSION["email"];
    }else{
        echo "somthing is wrong : " ; 
    }
    
    ?>
</div>







<script  src="/Myproject/Assets/JS/myScript.js"></script>
</body>
</html>