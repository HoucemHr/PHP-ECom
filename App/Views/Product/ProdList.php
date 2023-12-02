

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Designation</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $r){?>
            <tr>
                <?php foreach($r as $c){?>
                    <th><?php echo $c?></th>
                <?php }?>
            </tr>
            <?php }?>

    </tbody>
</table>