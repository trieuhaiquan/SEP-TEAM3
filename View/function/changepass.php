<div class="row" ng-app="">
    <h3 style="margin-left: 10px; color: #3c8dbc"><i class="fa fa-chevron-right" aria-hidden="true"></i> Change Password</h3>
    <?php $pass = $_SESSION['password'];?>
    <div class="col-lg-12" >
        <div ng-if="pass1 && pass2"> <div ng-if="pass1 != pass2"><div class='alert alert-danger'> <strong>Danger!</strong> Wrong confirm password</div></div> </div>    
        <?php if(isset($_SESSION['errchange'])) echo $_SESSION['errchange']; ?>
        <?php if (isset($_SESSION['$errmk'])) echo $_SESSION['$errmk']; ?>
        <?php if (isset($_SESSION['thanhcong'])) echo $_SESSION['thanhcong']; ?>
        <form method="post" action='<?=BASE_DIR?>index/changepass2'>
            <span style="margin-left: 100px; font-weight: bolder">Old Password: </span><input type="password" name="passcu" id="passcu" style="border-radius: 5px; margin: 0 0 10px 58px;width: 300px;" required ng-model="passcu"><br>
            <span style="margin-left: 100px; font-weight: bolder">New Password: </span><input type="password" name="pass1" id="pass1" style="border-radius: 5px; margin: 0 0 10px 52px; width: 300px;" required ng-model="pass1"><br>
            <span style="margin-left: 100px; font-weight: bolder">Confirm New Password: </span><input type="password" name="pass2" id="pass2" style="border-radius: 5px; margin: 0 0 10px 20px; width: 300px;" required ng-model="pass2"><br>
            <button type="submit" name="submit" id="add" class="btn btn-dropbox" style="display: block;margin-left: auto;margin-right: auto;" >Change</button>
        </form>

    </div>


</div>
