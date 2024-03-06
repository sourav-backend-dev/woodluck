<?php 
include('includes/header.php');
include('./functions/myfunctions.php');
session_start();
if(isset($_SESSION['auth'])){
    redriect("index.php","You are Already Logged in !");
}else{
?>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hay!</strong> <?= $_SESSION['message']; ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['message']); }  ?>

            <div class="card">
                <div class="card-header">
                    <h4>Register Page</h4>
                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="cpassowrd">Confirm-Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Re-Enter Password">
                        </div>
                        <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>


</div>

<?php } include('includes/footer.php') ?>