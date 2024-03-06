
<?php 
session_start();
include('includes/header.php');

?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hay <?php if(isset($_SESSION['auth'])){echo $_SESSION['auth_user']['name'];} ?>!</strong> <?= $_SESSION['message']; ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['message']);
            }  ?>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>