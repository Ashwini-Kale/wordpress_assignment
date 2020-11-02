<?php

function product_insert()
{
    ?>
    <style >
    .error {color: #FF0000;}
    .success{color: green}
.product_insert td{font-size: 16px;
    font-weight: 500;
        padding-bottom: 20px;
        padding-right: 35px;
 }
 .product_insert input,.product_insert textarea{box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
font-weight: initial;padding: 5px 20px;width: 100%;}

.product_insert input[type="submit"]{transition: none;
    background: #f1f1f1;
    border: 1px solid #016087;
    color: #016087;
    padding: 10px;width: 100%;cursor: pointer;}
    </style>

<div>
    <h1>Add New Product</h1>
</div>
<table class="product_insert">
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" method="post" action="#" >
    <tr>
        <td>Product Name:</td>
        <td><input type="text" name="product_name" id="product_name" required>
            </td>
    </tr>
    <tr>
        <td>Product Type:</td>
        <td><input type="text" name="product_type" id="product_type" required></td>
    </tr>
    <tr>
        <td>Price:</td>
        <td><input type="number" min="0" name="price" id="price" required></td>
    </tr>
    <tr>
        <td>Product Description:</td>
        <td><textarea  name="product_description" id="product_description" required></textarea></td>
    </tr>
    <tr>
        <td>Created Date:</td>
        <td><input type="date" name="created_date" id="created_date" required></td>
    </tr>
    <tr>
        <td>Updated Date:</td>
        <td><input type="date" name="updated_date" id="updated_date" required></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins" ></td>
    </tr>
    </form>
    </tbody>
</table>
<?php

// insert data
    if(isset($_POST['ins'])){
        global $wpdb;
        $product_name=$_POST['product_name'];
        $product_type=$_POST['product_type'];
        $price=$_POST['price'];
        $product_description=$_POST['product_description'];
        $created_date=$_POST['created_date'];
        $updated_date=$_POST['updated_date'];
        $table_name = $wpdb->prefix . 'products';
        $wpdb->insert(
            $table_name,
            array(
                'product_name' => $product_name,
                'product_type' => $product_type,
                'price' => $price,
                'product_description'=>$product_description,
                'created_date'=>$created_date,
                'updated_date'=>$updated_date
            )
        );
        echo "<h3 class='success'>Product Successfully Inserted</h3>";
        ?>
        <meta http-equiv="refresh" content="1; url= <?php echo admin_url('admin.php?page=Product_Listing'); ?> " />
        <?php
        exit;
    }
}
?>