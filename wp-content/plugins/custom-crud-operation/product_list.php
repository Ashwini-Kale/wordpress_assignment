<?php
function product_list() {
    ?>
    <style>
        #product_table {
            border-collapse: collapse;
        }
       .widefat thead tr th{padding-top: 12px;
            text-align: center;
    padding-bottom: 12px;
    font-size: 16px;
    background-color: #fff;
    color: #0073aa;
    font-weight: 500;}
    .widefat thead tr td{background: #f9f9f9;}
    .widefat tr td{
            font-size: 14px;
            padding: 20px;
            text-align: center;
        }
        .wp-list-table a {
    transition: none;
    background: #f1f1f1;
    border: 1px solid #016087;
    color: #016087;
    padding: 5px 15px;
}
.add_product{    text-decoration: none;
    background: #f1f1f1;
    border: 1px solid #016087;
    color: #016087;
    padding: 5px 15px;}
       #product_search {width: 30%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('../wp-content/plugins/custom-crud-operation/images/search.png');
    background-position: 20px 20px;
    background-repeat: no-repeat;
    padding: 1% 5%;
    background-size: 20px;
    float: right;
    margin-bottom: 10px;}
    </style>
   <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("product_search");
  filter = input.value.toUpperCase();
  table = document.getElementById("product_table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    <div class="wrap">
      <h1 class="wp-heading-inline">Product</h1>
      <a href="<?php echo admin_url('admin.php?page=Product_Insert'); ?>" class="add_product" >Add Product</a>
      <input type="text" id="product_search" onkeyup="myFunction()" placeholder="Search for Product Names" title="Type in a name">
      <table id="product_table" class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Price</th>
                <th>Product Description</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $i = 1;
            $table_name = $wpdb->prefix . 'custom_products';
            $products = $wpdb->get_results("SELECT id,product_name,product_type,price,product_description,created_date,updated_date from $table_name");
            foreach ($products as $product) {                
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo $product->product_type; ?></td>
                    <td><?php echo $product->price; ?></td>
                    <td><?php echo $product->product_description; ?></td>
                    <td><?php echo $product->created_date; ?></td>
                    <td><?php echo $product->updated_date; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=Product_Update&id=' . $product->id); ?>">Update</a> </td>
                    <td><a href="<?php echo admin_url('admin.php?page=Product_Delete&id=' . $product->id); ?>"> Delete</a></td>
                </tr>
            <?php $i++; }  ?>
            </tbody>
        </table>
    </div>
    <?php
    }
    add_shortcode('short_product_list', 'product_list');
?>