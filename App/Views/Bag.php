

<?php require_once "c:/xampp/htdocs/Myproject/App/Views/Header.php"?>
   
<div class = "bagbody">
    <div class="leftside">
        <div class="bagmessage">
            <?php if(!isset($_SESSION)){?>
                <span style="font-size: 27px; font-weight:500;">
                    Log In To Access This Content!
                </span><br>
                <span style="font-size: small;">The shopping bag is reserved for members</span>
            <?php }else{ ?> 
                <span style="font-size: 27px; font-weight:500;">
                Your Bag is Empty
                </span><br>
                <span style="font-size: small;">another message to be added here</span>
            
        </div>
        <div class="productlisting">
                <?php //if this went well on controller level i should have $bagProducts here
                    foreach($bagProducts as $r){ ?> 
                    <div>
                        <div style="width: 70%; font-size:small; font-weight:bold"><?php echo $r["label"]?></div>
                        <div style="width: 15%; justify-content:center"><?php echo $r["quantity"]?></div>
                        <div style="width: 15%; justify-content:center"><?php echo "$" . $r["price"]?></div>
                    </div> 
                <?php }?>
        </div>
        <?php }?>
    </div>
    <div class = "rightside">
        <?php if(!isset($_SESSION)){?>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up/In</button>
        <?php }else{ ?>
            <form action="/Myproject/index.php?url=ControllerBag/order" method="post">
                <input type="submit" value="Order" id = "orderBtn">
            </form>
        <?php }?>
        <br><br><br><br>
        <img src="/Myproject/Assets/Images/payments.png" alt="" style="margin-left: 5%;"><br>
        <span style="font-size: small; margin-left: 5%;">We support</span><br>
        <img src="/Myproject/Assets/Images/banks.png" alt="" style="margin-left: 3%;"><br><br>  
        <img src="/Myproject/Assets/Images/delivery.png" alt="" style="margin-left: 5%;"><br>
        <span style="margin-left: 5%; font-size:small">International rapid shipping!</span>
        

    </div>

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