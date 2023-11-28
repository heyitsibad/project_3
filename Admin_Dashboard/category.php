<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">CATEGORY PAGE</h1>
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
                               <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#categoryModal">ADD CATEGORY</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>c_name</th>
                                            <th>c_image</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php

                                        // Fetch Data From Table
                                        $FetchAllData = mysqli_query($con,"SELECT * FROM category");

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
                                            <td><?php echo $value['c_name'] ?></td>
                                            <td><img src="images/<?php echo $value['c_image']?>" alt="width=50px" width="100px"></td>
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