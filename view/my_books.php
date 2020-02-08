<?php
include_once '../core/autoload.php';
//$books->show_favorites($user_id);
require_once 'header/header.php'; ?>
        <header>
            <div class="text-right">
                <div class="col-12 text-right">
                    <p>User</p>
                    <a href="#" class="" type="submit">LogOut</a>
                </div>
            </div>
        </header>
        <div class="card">
            <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
            <img src="../../assets/images/theStand.jpg" width="200">
            <h2>The Stand</h2>
            <p>1992</p>
            <p>Description</p>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Book</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
<?php require_once 'footer/footer.php';