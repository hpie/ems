<!-- Page Header Start -->
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Account</h2>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="ti-home"></i> Home</a></li>
                        <li class="current">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div id="content" class="my-account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                <div class="my-account-form">
                    <ul class="cd-switcher">
                        <li><a class="selected" href="#0">LOGIN</a></li>
                        <li><a href="#0">REGITER</a></li>
                    </ul>

                    <div id="cd-login" class="is-selected">
                        <div class="page-login-form">
                            <form role="form" class="login-form">
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-user"></i>
                                        <input type="text" id="sender-email" class="form-control" name="email" placeholder="Username">
                                    </div>
                                    <span class="material-input"></span></div>
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-lock"></i>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <span class="material-input"></span></div>
                                <button class="btn btn-common log-btn">Login</button>
                                <div class="checkbox-item">
                                    <div class="checkbox">
                                        <label for="rememberme" class="rememberme">
                                            <input name="rememberme" id="rememberme" value="forever" type="checkbox">Remember Me</label>
                                    </div>
                                    <p class="cd-form-bottom-message"><a href="#0">Lost your password?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="cd-signup">
                        <div class="page-login-form register">
                            <form role="form" class="login-form">
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-user"></i>
                                        <input type="text" id="sender-email" class="form-control" name="name" placeholder="Username">
                                    </div>
                                    <span class="material-input"></span></div>
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-email"></i>
                                        <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <span class="material-input"></span></div>
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-lock"></i>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <span class="material-input"></span></div>
                                <div class="form-group is-empty">
                                    <div class="input-icon">
                                        <i class="ti-lock"></i>
                                        <input type="password" class="form-control" placeholder="Repeat Password">
                                    </div>
                                    <span class="material-input"></span></div>
                                <button class="btn btn-common log-btn">Register</button>
                            </form>
                        </div>
                    </div>
                    <div class="page-login-form" id="cd-reset-password"> 
                        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                        <form class="cd-form">
                            <div class="form-group is-empty">
                                <div class="input-icon">
                                    <i class="ti-email"></i>
                                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <span class="material-input"></span></div>
                            <p class="fieldset">
                                <button class="btn btn-common log-btn" type="submit">Reset password</button>
                            </p>
                        </form>
                        <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>