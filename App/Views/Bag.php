

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
        <br><br><br><br>
        <img src="/Myproject/Assets/Images/payments.png" alt="" style="margin-left: 5%;"><br>
        <span style="font-size: small; margin-left: 5%;">We support</span><br>
        <img src="/Myproject/Assets/Images/banks.png" alt="" style="margin-left: 3%;"><br><br>  
        <img src="/Myproject/Assets/Images/delivery.png" alt="" style="margin-left: 5%;"><br>
        <span style="margin-left: 5%; font-size:small">International rapid shipping!</span>
        

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