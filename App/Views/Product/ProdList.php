<?php require_once "c:/xampp/htdocs/Myproject/App/Views/Header.php"?>

    <div class="prod_container">
        <div class="products">
            <?php foreach($products as $product){?>
                <div class=<?php echo "prod" . $product["ID"] ?>>
                    <img src=<?= $product["Image"]?> alt=""><br>
                    <span><a href="/Myproject/index.php?url=ControllerProduct/show&id=<?= $product["ID"]?>">
                        <?php echo $product["Label"]?></a>
                    </span><br>
                    <span> <?php echo "$" . $product["Price"]?></span>
                </div>
            <?php }?>
        </div>
    
    </div>
    <script  src="/Myproject/Assets/JS/myScript.js"></script>
