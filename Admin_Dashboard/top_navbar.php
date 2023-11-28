<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>



        <!-- Models Code -->

<!--Category Modal -->
<form action="../code.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CATEGORY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input class="form-control mb-3" type="text" name="category_name" placeholder="Enter Category Name" autofocus required>

        <input class="form-control mb-3" type="file" name="category_file" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addCategory" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>



<!--Product Modal -->
<form action="../code.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input class="form-control mb-3" type="text" name="p_name" placeholder="Enter Product Name" autofocus required>
        <textarea name="p_desc" id="" cols="30" rows="10" class="form-control mb-3" required placeholder="Enter Product Desc"></textarea>

        <input class="form-control mb-3" type="number" name="p_price" placeholder="Enter Product Price" required>

        <input class="form-control mb-3" type="number" name="p_qty" placeholder="Enter Product QTY" required>

        <select name="p_status" id="" class="form-control mb-3">
          <option value="">Select Status</option>
          <option value="New">New</option>
          <option value="Sale">Sale</option>
        </select>


        <select name="p_category" id="" class="form-control mb-3">
          <option value="">Select Category</option>

          <!-- Fetch Category From Table -->
          <?php
          $fetchCategory = mysqli_query($con,"SELECT * FROM category");
          while($data = mysqli_fetch_assoc($fetchCategory)){
              ?>
                  <option value="<?php echo $data['c_name'] ?>"><?php echo $data['c_name'] ?></option>
              <?php 
          }
          
          ?>
          
        </select>

        <input class="form-control mb-3" type="file" name="product_file" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addProduct" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>