<?php
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $category = getAll("categories");
                                if(mysqli_num_rows($category)>0){
                                    foreach($category as $item){
                                    ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td><?= $item['status'] == '1' ? 'Visible':'Not Visible'; ?></td>
                                            <td>
                                                <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">EDIT</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }else{
                                    echo "No Record Found!";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>