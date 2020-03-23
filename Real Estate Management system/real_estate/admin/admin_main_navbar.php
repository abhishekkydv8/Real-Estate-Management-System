<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dream Home</a>
    <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="./../home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./../buy.php">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./../sell.php">Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./../request.php">Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./../about.php">About Us</a>
            </li>
            <?php
              if(isset($_SESSION['usertype'])){
                if($_SESSION['usertype']=='admin')
                  echo '<li class="nav-item">
                  <a class="nav-link" href="./admin_userdetails.php">Admin Panel</a>
                </li>';
              }
            ?>
    </ul>
    <ul class="navbar-nav">
		    <div class="input-group mr-2 mb-2">
		      	<a href="./../logout.php"><input type="button" class="btn btn-success" value="LOG OUT"></a>
		    </div>
    </ul>
</nav>