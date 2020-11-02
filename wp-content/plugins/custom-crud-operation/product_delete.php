<style type="text/css">
 .success{color: green}
</style>
<?php

function product_delete(){
   // echo "Product delete";
  // echo  $i=$_GET['id'];
   
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'products';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "<h3 class='success'>Product Successfully Deleted</h3>";
        ?>
        <meta http-equiv="refresh" content="1; url= <?php echo admin_url('admin.php?page=Product_Listing'); ?> " />
        <?php
        exit;
    }
    

}
?>