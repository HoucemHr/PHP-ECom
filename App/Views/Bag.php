

<?php require_once "c:/xampp/htdocs/Myproject/App/Views/Header.php"?>
   
<div class = "bagbody">
    <div class="leftside">
        <div>
            <?php if(!isset($_SESSION)){?>
                <span style="font-size: 27px; font-weight:500;">
                    Log In To Access This Content!
                </span><br>
                <span style="font-size: small;">The shopping bag is reserved for members</span>
            <?php }?>
        </div>
    </div>
    <div class = "rightside">
        <?php if(!isset($_SESSION)){?>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up/In</button>
        <?php }?>
    </div>

    some tect


</div>









</body>
</html>


<!-- to be added later
<?php if(isset($_SESSION)){?>
        <button>Order</button>
    <?php }else{?>
        <button style="background-color: black; color: white;">Sign Up/In</button>
    <?php }?>
-->