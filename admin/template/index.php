<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Igor Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
  <?php
    // Include the database connection file
    include 'conexiune.php';

    // Fetch products from the database
    $sql = "SELECT `id`, name, `img`, `rating`, `price` FROM `products`";
    $result = $conexiune->query($sql);
  ?>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html">IgorPanel</a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Paginile site-ului</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/igor/ro/index.php"> Home Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="/igor/ro/Products.php"> Produse </a></li>
                <li class="nav-item"> <a class="nav-link" href="/igor/index.php"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="/igor/ro/contacts.php"> Contacte </a></li>
                <li class="nav-item"> <a class="nav-link" href="/igor/ro/cart.php"> Cosul De Cumparaturi </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="add" style='display:flex;align-items:center; height:40px; margin:0 0 0 20px;'>
              <a href="products_crud/add_product.php" style='display:flex;align-items:center; text-decoration:none; color:gray; height:24px;'> <!-- Fix the link here -->
                <div class="icon"  style='height:24px; margin:-3px 0 0 0 '>
                  <span class="material-symbols-outlined">add</span>
                </div>
                <div class="text" style='height:24px;'>
                  <p  style='height:24px;'>Add Product</p>
                </div>
              </a>
            </div>
          <div class="content-wrapper">
          <?php
            // Include the database connection file
            include 'conexiune.php';

            // Fetch products from the database
            $sql = "SELECT `id`, name, `img`, `rating`, `price` FROM `products`";
            $result = $conexiune->query($sql);
          ?>

          <div class="row">
              <div class="col-12 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Products</h4>
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Product Name</th>
                                          <th>Image</th>
                                          <th>Rating</th>
                                          <th>Price</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      // Check if there are products in the database
                                      if ($result->num_rows > 0) {
                                          // Output data of each row
                                          while ($row = $result->fetch_assoc()) {
                                      ?>
                                              <tr>                                              
                                                  <td><?php echo $row['name']; ?></td>
                                                  <td>
                                                      <img src="<?php echo $row['img']; ?>" alt="Product Image" style='width:150px; height:150px; object-fit:cover;'/>
                                                  </td>
                                                  <td><?php echo $row['rating']; ?></td>
                                                  <td><?php echo $row['price']; ?></td>
                                                  <td>
                                                      <a href="products_crud/delete_product.php?id=<?php echo $row['id']; ?>" title="Delete">
                                                        <span class="material-symbols-outlined">delete</span>
                                                      </a>
                                                      <a href="products_crud/edit_product.php?id=<?php echo $row['id']; ?>" title="Update">
                                                        <span class="material-symbols-outlined">update</span>
                                                      </a>
                                                    </td>
                                                  </tr>
                                              <?php
                                                }
                                              } else {
                                                echo "<tr><td colspan='6'>No products found</td></tr>";
                                              }
                                              $conexiune->close();
                                              ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Chitaica Igor 2023</span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>