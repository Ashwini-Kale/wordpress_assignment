<?php
//echo "update page";
function product_update(){
 ?>
 <style>

 .product_upadte td{font-size: 16px;
    font-weight: 500;
        padding-bottom: 20px;
        padding-right: 35px;
 }
 .product_upadte input , .product_upadte textarea{box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
font-weight: initial;padding: 5px 20px;width: 100%;}

.product_upadte input[type="submit" i]{transition: none;
    background: #f1f1f1;
    border: 1px solid #016087;
    color: #016087;
    padding: 10px;width: 100%;cursor: pointer;}

 </style>
    <?php
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'products';
    $product = $wpdb->get_results("SELECT id,product_name,product_type,price,product_description,created_date,updated_date from $table_name where id=$i");
     $product[0]->id;
    ?>

     <h1 class="wp-heading-inline">Update Product</h1>
    <table class="product_upadte">
   
        <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $product[0]->id; ?>">
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="product_name" value="<?php echo $product[0]->product_name; ?>"></td>
            </tr>
            <tr>
                <td>Product Type</td>
                <td><input type="text" name="product_type" value="<?php echo $product[0]->product_type; ?>"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" value="<?php echo $product[0]->price; ?>"></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td><textarea name="product_description" value="<?php echo $product[0]->product_description;?>"><?php echo $product[0]->product_description;?></textarea>
                </td>
            </tr>
            <tr>
                <td>Created Date</td>
                <td><input type="date" name="created_date" value="<?php echo $product[0]->created_date; ?>"></td>
            </tr>
            <tr>
                <td>Updated Date</td>
                <td><input type="date" name="updated_date" value="<?php echo $product[0]->updated_date; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'products';
    $id=$_POST['id'];
     $product_name=$_POST['product_name'];
        $product_type=$_POST['product_type'];
        $price=$_POST['price'];
        $product_description=$_POST['product_description'];
        $created_date=$_POST['created_date'];
        $updated_date=$_POST['updated_date'];
        $wpdb->update(
         $table_name,
            array(
                'product_name' => $product_name,
                'product_type' => $product_type,
                'price' => $price,
                'product_description'=>$product_description,
                'created_date'=>$created_date,
                'updated_date'=>$updated_date
            ),
        array(
            'id'=>$id
        )

    );
?>
   <meta http-equiv="refresh" content="1; url= <?php echo admin_url('admin.php?page=Product_Listing'); ?> " />
        <?php
        exit;
}

?>
