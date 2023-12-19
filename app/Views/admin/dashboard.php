<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.2-dist\css\bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css\dashboard.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="<?= base_url('bootstrap-5.0.2-dist\js\bootstrap.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <title>Dashboard</title>
</head>
<body>
  

<div class="top">
    <p class="logout"><a href="<?= site_url('main/logout') ?>" class="logout-button">Logout</a></p>
    <h1 class="header">Dashboard</h1>
    <hr>
</div>


  <div class="container d-flex justify-content-end">
  <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#myProductModal">
    Add Product
  </button>
</div>


  <div class="container">
    <table class="table table-bordered" id="ProductTB">
      <tr class="form">
        <th class="text-center d-none">Id</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
      <?php foreach ($product as $product_list) : ?>
        <tr>
          <td class="d-none"><?= esc($product_list['id']) ?></td>
          <td><?= esc($product_list['product_name']) ?></td>
          <td><?= esc($product_list['unit']) ?></td>
          <td><?= esc($product_list['quantity']) ?></td>
          <td><?= esc($product_list['price']) ?></td>
          <td><button type="button" class="btn btn-primary btnUpdateProduct mb-2 " data-bs-toggle="modal" data-bs-target="#updateProductModal">Update</button></td>
          <td><button type="button" class="btn btn-danger btndeleteProduct mb-2" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button></td>
        </tr>
      <?php endforeach ?>
    </table>

    <?= $pager->links() ?>
  </div>

  <!-- ADD -->
  <div class="container">
    <div class="modal fade" id="myProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myProductModal">Add New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/addproduct') ?>" method="post">
              <div class="form-group p-3">
                <label for="formControlInput" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
                <label for="formControlInput" class="form-label">Unit</label>
                <select class="form-select" aria-label="Default select" name="unit">
                  <option value="pcs">pcs</option>
                  <option value="kg">kg</option>
                 
                </select>
                <label for=" formControlInput" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="xx">
                <label for=" formControlInput" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" placeholder="$">
              </div>
              <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Update -->
  <div class="container">
    <div class="modal fade" id="updateProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateProductModal">Update</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/update_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id ">ID:</label>
                  <input type="hidden" class="productId" name="id">
                </div>
                <label for="formControlInput" class="form-label">Product Name</label>
                <input type="text" class="form-control productName" name="product_name" placeholder="">
                <label for="formControlInput" class="form-label">Unit</label>
                <select class="form-select unit" aria-label="Default select" name="unit">
                  <option value="pcs">pcs</option>
                  <option value="kg">kg</option>
                  
                </select>
                <label for=" formControlInput" class="form-label">Product Quantity</label>
                <input type="number" class="form-control quantity" name="quantity" placeholder="">
                <label for=" formControlInput" class="form-label">Price</label>
                <input type="number" class="form-control price" name="price" placeholder="">
              </div>
              <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- DELETE -->
  <div class="container">
    <div class="modal fade" id="deleteProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModal">Delete Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/delete_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id ">ID:</label>
                  <input type="hidden" class="delProductId" name="id">
                </div>
              <p>Are you sure that you want to delete this product <br>
              <strong><span class="delProductName"></span>?</strong></p> 
              <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
    <button type="submit" class="btn btn-danger">Yes</button>
</div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    $("#ProductTB").on('click', '.btnUpdateProduct', function() {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();
      let unit = currentRow.find("td:eq(2)").text();
      let quantity = currentRow.find("td:eq(3)").text();
      let price = currentRow.find("td:eq(4)").text();

      $(".productId").val(productId); // Set the product ID
      $(".productName").val(productName);
      $(".unit").val(unit);
      $(".quantity").val(quantity);
      $(".price").val(price);
    })
    $("#ProductTB").on('click', '.btndeleteProduct', function() {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();

      $(".delProductId").val(productId)
      $(".delProductName").text(productName);
    });
  });
</script>
</html>