<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $cate_query = "INSERT INTO categories 
    (name, slug, description, status, popular, image, meta_title, meta_description, meta_keywords) 
    VALUES ('$name', '$slug', '$description', '$status', '$popular', '$filename', '$meta_title','$meta_description', '$meta_keywords')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redriect("addCategory.php", "Category Added Successfully !");
    } else {
        redriect("addCategory.php", "Something went wrong");
    }
}

if (isset($_POST['update_category_btn'])) {
    $cat_id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image == "") {
        $update_filename = $old_image;
    } else {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    }
    $path = "../uploads";
    $update_query = "UPDATE categories SET 
                        name='$name', 
                        slug='$slug', 
                        description='$description', 
                        status='$status', 
                        popular='$popular', 
                        image='$update_filename', 
                        meta_title='$meta_title', 
                        meta_description='$meta_description', 
                        meta_keywords='$meta_keywords' 
                    WHERE id='$cat_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redriect("edit-category.php?id=$cat_id", "Category Updated Successfully!");
    } else {
        redriect("edit-category.php?id=$cat_id", "Something went wrong");
    }
}
