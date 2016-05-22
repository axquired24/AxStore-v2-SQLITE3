<div class="container">
  <h2 class="page-header">Login to Your Account</h2>
  <form name="loginCustomer" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">CustomerID</label>
      <div class="col-sm-10">
        <input name="customerID" type="text" class="form-control" id="inputEmail3" placeholder="CustomerID">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input name="postalCode" type="password" class="form-control" id="inputPassword3" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Remember me
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button name="submit" type="submit" class="btn btn-default">Log in</button>
      </div>
    </div>
  </form>
</div>

<div style="display: none">
<?php
//Login Process
  $postLogin = array($_POST[customerID],$_POST[postalCode]);
  if(isset($_POST[customerID])){
    echo $postLogin[0].$postLogin[1];
    $validasi = "SELECT COUNT(*) AS 'Jumlah', * FROM Customers WHERE CustomerID='$postLogin[0]' AND PostalCode='$postLogin[1]'";
    $exeValidasi = $db->query($validasi);
    $rowArray = $exeValidasi->fetchArray(SQLITE3_ASSOC);
    $jumlah = $rowArray[Jumlah];
    if($jumlah == 0){
      echo "<script type='text/javascript'>alert('Your CustomerID & Password Combination are invalid!')</script>"; 
    }
    else{
      $CustomerID=$rowArray[CustomerID];
      $ContactName=$rowArray[ContactName];
      session_start();
      $_SESSION['CustomerID']=$rowArray[CustomerID];
      $_SESSION['ContactName']=$rowArray[ContactName];
      echo "<meta http-equiv=refresh content='0; url=./' />"; //Redirect ke halaman awal
    }
  }

?>
</div>