

<?php require_once "c:/xampp/htdocs/Myproject/App/Views/Header.php"?>
   
<div class = "prodbody">
    <div class="leftside">
        <div class="prdImg">
            <img src="/Myproject/Assets/Images/<?= $row["IMG"]?>" alt="">
        </div>
    </div>
    <div class = "rightside">
        <?php if(!isset($_SESSION)){?>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up/In</button>
        <?php }else{ ?>
            <span style="font-size: 20px;font-weight:500;margin-left:20px;"><?= $row["Label"]?></span><br>
            <span style="font-size: 20px;font-weight:500;margin-left:20px;"><?= "$" . $row["Price"]?></span><br>
            
            <form action="/Myproject/index.php?url=ControllerBag/addToBag" method="post">
                <br><input type="submit" value="Add To Bag" class = "addToBagBtn">
                <br><br><br><br>
                <input type="radio" name="size" id="size-1" class="radio" value="S" checked><label class="size size-1" for="size-1">S</label>
                <input type="radio" name="size" id="size-2" class="radio" value="M">        <label class="size size-2" for="size-2">M</label>
                <input type="radio" name="size" id="size-3" class="radio" value="L">        <label class="size size-3" for="size-3">L</label>
                <input type="radio" name="size" id="size-4" class="radio" value="XL">       <label class="size size-4" for="size-4">XL</label>
                <br></br><br>
                <input type="radio" name="color" id="color-1" class="radio" value="black" checked><label class="color color-1" for="color-1"></label>
                <input type="radio" name="color" id="color-2" class="radio" value="white">        <label class="color color-2" for="color-2"></label>
                <input type="radio" name="color" id="color-3" class="radio" value="gray">        <label class="color color-3" for="color-3"></label>
                <input type="radio" name="color" id="color-4" class="radio" value="green">       <label class="color color-4" for="color-4"></label>
                <br><br><br>
                <label style ="margin-right: 30px; font-weight:bold; font-size:large;" for="quantity">Quantiy : </label>
                <input type="number" name="quantity" id="quantity" value="1">
                <input type="hidden" name="PID" value="<?= $_GET["id"]?>">

            
            </form>
        <?php }?>
        
        
        

    </div>

</div>









</body>
</html>


