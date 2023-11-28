<main>
                    <div class="container-fluid px-4">
                        
                        <p class="breadcrumb mb-4">
                        <?php 
                            // Session Set Or Not Set
                            if(isset($_SESSION['error'])){
                                echo "<div class='alert alert-danger' role='alert'>$_SESSION[error]</div>";
                                unset($_SESSION['error']);
                            }

                            if(isset($_SESSION['success'])){
                                echo "<div class='alert alert-success' role='alert'>$_SESSION[success]</div>";
                                unset($_SESSION['success']);
                            }
                        ?>
                        </p>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                               <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#productModal">ADD PRODUCT</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>p_name</th>
                                            <th>p_desc</th>
                                            <th>p_price</th>
                                            <th>p_qty</th>
                                            <th>p_status</th>
                                            <th>p_category</th>
                                            <th>p_image</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <?php

                                // Fetch Data From Table
                                $FetchAllData = mysqli_query($con,"SELECT * FROM product");

                                // var_dump($FetchAllData);
                                // print_r($FetchAllData);

                                // CHeck That Data Avialble Or Not
                                if($isDataExists = mysqli_num_rows($FetchAllData) > 0){
                                    // Convert Object Into Array
                                    $sno = 1;

                                    while($value = mysqli_fetch_array($FetchAllData)){
                                        ?>
                                        <tr>
                                            <td><?php echo $sno; $sno++;?></td>
                                            <td><?php echo $value['p_name']?></td>
                                            <td><?php echo $value['p_desc']?></td>
                                            <td><?php echo $value['p_price']?></td>
                                            <td><?php echo $value['p_status']?></td>
                                            <td><?php echo $value['p_category']?></td>
                                            <td><?php echo $value['p_qty']?></td>
                                            <td><img src="images/<?php echo $value['p_image']?>" alt=""width="50px"></td>
                                            <td><?php echo $value['date']?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>