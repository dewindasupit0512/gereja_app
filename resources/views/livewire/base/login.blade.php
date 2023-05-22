<div class="page login-page">
    <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <!-- <div class="col-lg-8"> -->
            <div class="form-inner">
                <div class="logo text-uppercase"><span></span><strong class="text-primary">AREA LOGIN ADMIN</strong></div>
                <form wire:submit.prevent='login'>
                    <div class="form-group-material">
                        <input wire:model='email' id="login-username" type="text" name="txtusername" required data-msg="Please enter your username" class="input-material">
                        <label for="login-username" class="label-material">Email</label>
                    </div>
                    <div class="form-group-material">
                        <input wire:model='password' id="login-password" type="password" name="txtpassword" required data-msg="Please enter your password" class="input-material">
                        <label for="login-password" class="label-material">Password</label>
                    </div>
                        <button type="submit" name="btnlogin" class="btn btn-primary">LOGIN</button>
                        {{-- <h5> <a href="../index.php">Back</a></h5> --}}
                    </div>
                </form>
            <div class="copyrights text-center">
            </div>
        </div>
    </div>
</div>