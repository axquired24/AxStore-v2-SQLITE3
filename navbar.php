<?php
    session_start();    
    if(isset($_SESSION['ContactName'])){
        $nama = $_SESSION['ContactName'];
        $link = "?page=inc_profileCustomer&CustomerID=".$_SESSION[CustomerID];
        $add = "<li><a href='logout.php'><span class='glyphicon glyphicon-off'></span> Logout </a></li>";
    }
    else{
        $nama = "Login Customer";
        $link = "?page=inc_login";
        $add = "";
    }
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sbd-nav-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><span class="glyphicon glyphicon-phone"></span> AxStore</a>      
        </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="sbd-nav-collapse">
            <ul class="nav navbar-nav">
                <li><a href="./"><span class="glyphicon glyphicon-shopping-cart"></span> Browse Product</a></li>
                <li><a href="<?php echo $link; ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $nama; ?></a></li>
                <?php echo $add; ?>
            </ul>
            <form action="#" class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-inverse"><span class="glyphicon glyphicon-search"></span></button>
            </form>            
        </div>
    </div>    
</nav>