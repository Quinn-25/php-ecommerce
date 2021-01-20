<?php
    $db = mysqli_connect('localhost', 'root', 'root', 'greenwich', 3306);
    //get value from
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'=>$_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="../users/index.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'=>$_GET["id"],
            'item_name'=>$_POST["hidden_name"],
            'item_price'=>$_POST["hidden_price"],
            'item_quantity'=>$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="../users/index.php"</script>';
            }
        }
    }
}
?>
<style>
    button.toggle {
        float: right;
        width: 17%;
        font-family: 'Chilanka', cursive;
        padding: 10px;
        font-size: 15px;
        color: white;
        background: var(--theme-color);
        border: none;
        border-radius: 6px 6px 0 0;
    }
    .tbUpdate {
        width: 100%;
        text-align: center;
    }
</style>
<!--for shopping cart-->
<?php if (isset($_SESSION['username'])) {?>
    <div class="col-12 col-s-12">
        <button class="toggle" onclick="Toggle()">Shopping Cart</button>
        <div id="myDIV">
            <table class="tbUpdate">
                <tr>
                    <th width="30%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    <th width="20%" colspan="2">Action</th>
                </tr>
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>$ <?php echo $values["item_price"]; ?></td>
                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                            <td colspan="2"><a href="../users/index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td>$ <?php echo number_format($total, 2); ?></td>
                        <td><a href="#buy" onclick="alert('Products bought successfully! Thank you for using our service');">Buy Now</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <!--For categories & products-->
    <section>
        <div class="col-2 col-s-12">
            <div class="col-s-12">
                <h3 align="left">CATEGORY</h3><br>
                <?php       $query = "SELECT * FROM categories ORDER BY category_id";
                $run = mysqli_query($db, $query);
                if(mysqli_num_rows($run) > 0) { ?>
                    <br><a href="../users/index.php?ShowAll">Show All</a><br>
                    <?php           while($row = mysqli_fetch_array($run)) { ?>
                        <br><a href="../users/index.php?CategoryID=<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a><br>
                    <?php }
                }?>
            </div>
        </div>
        <div class="col-9 col-s-12">
            <?php
            if (isset($_GET['CategoryID']) && $_GET['CategoryID'] !== '') {
                $CategoryID = $_GET['CategoryID'];
                $sql1 = "SELECT * FROM products WHERE product_category = '$CategoryID'";
                $rst1 = mysqli_query($db, $sql1);
                $sql2 = "SELECT category_name FROM categories WHERE category_id = '$CategoryID'";
                $rst2 = mysqli_query($db, $sql2);
                $cln = mysqli_fetch_array($rst2);
                $class_name = $cln[0];
                while ($std = mysqli_fetch_array($rst1)) { ?>
                    <div class="col-s-3">
                        <form method="post" action="../users/index.php?action=add&id=<?php echo $row["product_id"]; ?>">
                            <div class="productBackground">
                                <img src="../assets/images/<?php echo $std["product_image"]; ?>" ><br>
                                <h4><?php echo $std["product_name"]; ?></h4>
                                <h4>$ <?php echo $std["product_price"]; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $std["product_name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $std["product_price"]; ?>"><br><br>
                                <input type="submit" name="add_to_cart" class="buyNow" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php }
            }
            ?>
        </div>
    </section>
    <!--User must login to buy-->
<?php } else { ?>
    <div class="col-12 col-s-12">
        <button class="toggle" onclick="Toggle()">Shopping Cart</button>
        <div id="myDIV">
            <table class="tbUpdate">
                <tr>
                    <th width="30%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    <th width="20%" colspan="2">Action</th>
                </tr>
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>$ <?php echo $values["item_price"]; ?></td>
                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                            <td colspan="2"><a href="../index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td>$ <?php echo number_format($total, 2); ?></td>
                        <td><a href="../registration/login.php">Please login to place order</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <!--For categories & products-->
    <section>
        <div class="col-2 col-s-12">
            <div class="col-s-12">
                <h3 align="left">CATEGORY</h3><br>
                <?php       $query = "SELECT * FROM categories ORDER BY category_id";
                $run = mysqli_query($db, $query);
                if(mysqli_num_rows($run) > 0) { ?>
                    <br><a href="../index.php?ShowAll">Show All</a><br>
                    <?php           while($row = mysqli_fetch_array($run)) { ?>
                        <br><a href="../index.php?CategoryID=<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a><br>
                    <?php }
                }?>
            </div>
        </div>
        <div class="col-9 col-s-12">
            <?php
            if (isset($_GET['CategoryID']) && $_GET['CategoryID'] !== '') {
                $CategoryID = $_GET['CategoryID'];
                $sql1 = "SELECT * FROM products WHERE product_category = '$CategoryID'";
                $rst1 = mysqli_query($db, $sql1);
                $sql2 = "SELECT category_name FROM categories WHERE category_id = '$CategoryID'";
                $rst2 = mysqli_query($db, $sql2);
                $cln = mysqli_fetch_array($rst2);
                $class_name = $cln[0];
                while ($std = mysqli_fetch_array($rst1)) { ?>
                    <div class="col-s-3">
                        <form method="post" action="../index.php?action=add&id=<?php echo $row["product_id"]; ?>">
                            <div class="productBackground">
                                <img src="../assets/images/<?php echo $std["product_image"]; ?>" ><br>
                                <h4><?php echo $std["product_name"]; ?></h4>
                                <h4>$ <?php echo $std["product_price"]; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $std["product_name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $std["product_price"]; ?>"><br><br>
                                <input type="submit" name="add_to_cart" class="buyNow" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php }
            } else {
                $query = "SELECT * FROM products ORDER BY product_id";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    { ?>
                        <div class="col-s-3">
                            <form method="post" action="../index.php?action=add&id=<?php echo $row["product_id"]; ?>">
                                <div class="productBackground">
                                    <img src="../assets/images/<?php echo $row["product_image"]; ?>" ><br>
                                    <h4><?php echo $row["product_name"]; ?></h4>
                                    <h4>$ <?php echo $row["product_price"]; ?></h4>
                                    <input type="text" name="quantity" class="form-control" value="1">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>"><br><br>
                                    <input type="submit" name="add_to_cart" class="buyNow" value="Add to Cart">
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
            }?>
        </div>
    </section>
<?php } ?>
<script>
    function Toggle() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>