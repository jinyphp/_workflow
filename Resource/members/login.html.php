<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">WorkBoard Login</h1>
    <p class="lead">자유로운 업무형 웹보드 구축 시스템.</p>
    </div>
</div>

<div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <!-- 소셜로그인-->  
                <div class="mb-3">
                    <style>
                        #login-google {
                            background-color:#EA4335;
                            padding:10px;
                            width:100%; height:50px;
                            border-radius: 3px;
                            color:#ffffff;
                            text-align:center;
                            line-height:30px;
                            cursor:pointer;
                        }
                    </style>
                    <div id="login-google">Google 아이디로 로그인</div>
                    <script>
                        let google = document.querySelector("#login-google");
                        google.addEventListener('click', function (e) {
                            e.preventDefault();
                            location.href = "<?php \jiny\members\login\buttonGoogleHref(); ?>";
                        });                    
                    </script>
                </div>
                <div class="mb-3">
                    <style>
                        #login-facebook {
                            background-color:#3b5998;
                            padding:10px;
                            width:100%; height:50px;
                            border-radius: 3px;
                            color:#ffffff;
                            text-align:center;
                            line-height:30px;
                            cursor:pointer;
                        }
                    </style>
                    <div id="login-facebook">페이스북 아이디로 로그인</div>
                </div>
                <div class="mb-3">
                    <style>
                        #login-twitter {
                            background-color:#08a0e9;
                            padding:10px;
                            width:100%; height:50px;
                            border-radius: 3px;
                            color:#ffffff;
                            text-align:center;
                            line-height:30px;
                            cursor:pointer;
                        }
                    </style>
                    <div id="login-twitter">Twitter 아이디로 로그인</div>
                </div>
                <div class="mb-3">
                    <style>
                        #login-naver {
                            background-color:#1EC800;
                            padding:10px;
                            width:100%; height:50px;
                            border-radius: 3px;
                            color:#ffffff;
                            text-align:center;
                            line-height:30px;
                            cursor:pointer;
                        }
                    </style>
                    <div id="login-naver">네이버 아이디로 로그인</div>
                    <script>
                        let naver = document.querySelector("#login-naver");
                        naver.addEventListener('click', function (e) {
                            e.preventDefault();
                            location.href = "<?php \jiny\members\login\buttonNaverHref(); ?>";
                        });                    
                    </script>
                </div>
                <div class="mb-3">
                    <style>
                        #login-kakao {
                            background-color:#ffe812;
                            padding:10px;
                            width:100%; height:50px;
                            border-radius: 3px;
                            color:#0000000;
                            text-align:center;
                            line-height:30px;
                            cursor:pointer;
                        }
                    </style>
                    <div id="login-kakao">카카오 아이디로 로그인</div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- 사용자로그인 -->
                <?= \jiny\html\bootstrap\isAlertDanger($error_message); ?>

                <form action="/login" method="POST">   
                    <div class="form-group">
                        <label class="mb-1" for="inputEmailAddress">이메일</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email" name="data[email]" value="<?= $email ?>"  placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="inputPassword">패스워드</label>
                        <input class="form-control py-4" id="inputPassword" type="password" name="data[password]" placeholder="Enter password" />   
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                        
                        <a href="/regist">신규 회원가입</a> | <a href="/login/password">비밀번호 찾기</a> 
                        
                        <?= \jiny\html\bootstrap()->submitButtonPrimary("로그인"); ?>
                        
                    </div>
                </form>


            </div>
         
        </div>
    </div>




