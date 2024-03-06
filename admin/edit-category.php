<?php
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getById("categories", $id);

                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name = "id" value="<?= $data['id']; ?>">
                                        <label for="Name">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter Category Name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Slug">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description">Description</label>
                                        <textarea rows="3" name="description" placeholder="Enter Description" class="form-control"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image">Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="image">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                                        <img src="../uploads/<?= $data['image'];?>" height="100px" width="100px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter Meta Title" class="form-control">
                                    </div>
                                    <div class="col-md-12"><label for="meta_description">Meta Description</label>
                                        <textarea rows="3" name="meta_description" placeholder="Enter Meta Description" class="form-control"><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12"><label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="<?= $data['meta_keywords']; ?>" placeholder="Enter Meta Keywords" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="popular">Popular</label>
                                        <input type="checkbox" name="popular" <?= $data['popular'] ? "checked" : "" ?>>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="update_category_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php

                } else {
                    echo "Category Not Found !";
                }
            } else {
                echo "id missing from url!";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>