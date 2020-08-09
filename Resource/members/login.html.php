<div id="layoutAuthentication">

    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">

                                <?= \jiny\html\bootstrap\isAlertDanger($error_message); ?>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul>
                                            <li><?php \jiny\members\login\button\google(); ?></li>
                                            <li><?php \jiny\members\login\button\naver(); ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="/login" method="POST">   
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="data[email]" value="<?= $email ?>"  placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="data[password]" placeholder="Enter password" />   
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                              
                                                <?= \jiny\html\bootstrap()->submitButtonPrimary("로그인"); ?>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">
                                    <a href="/regist">신규 회원가입</a> | <a href="/login/password">비밀번호 찾기</a> 
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>


    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Jindalrae 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>