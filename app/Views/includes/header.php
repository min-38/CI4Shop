<!-- login modal start -->
<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">로그인</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data" id="login_form" novalidate>
                <div class="modal-body p-3">
                    <div class="mb-3">
                        <label>아이디</label>
                        <input type="text" name="userID" class="form-control" placeholder="아이디를 입력해주세요." required>
                        <div class="invalid-feedback">아이디를 입력해주세요 (5~20자)</div>
                    </div>
                    <div class="mb-3">
                        <label>비밀번호</label>
                        <input type="password" name="password" class="form-control" placeholder="비밀번호를 입력해주세요." required>
                        <div class="invalid-feedback">비밀번호를 입력해주세요 (영문, 숫자, 특수문자 조합)</div>
                    </div>
                    <div id="auth_msg" class="invalid-feedback"></div>
                    
                    <div class="">
                        계정이 없으신가요?
                        <a href="#" data-bs-toggle="modal" data-bs-target="#signup_modal">회원가입</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="login_btn">로그인</button>
                    <button type="button" class="btn btn-secondary close_btn" data-bs-dismiss="modal">닫기</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login modal end -->

<!-- sign up modal start -->
<div class="modal fade" id="signup_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">회원가입</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data" id="signup_form" novalidate>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>아이디</label>
                        <input type="text" name="userID" class="form-control" placeholder="아이디를 입력해주세요." required>
                        <div class="invalid-feedback">아이디를 입력해주세요 (5~20자)</div>
                    </div>

                    <div class="mb-3">
                        <label>닉네임</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="닉네임을 입력해주세요" required>
                        <div class="invalid-feedback">닉네임을 입력해주세요 (3~20자)</div>
                    </div>

                    <div class="mb-3">
                        <label>비밀번호</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="비밀번호를 입력해주세요" required>
                        <div class="invalid-feedback">비밀번호를 입력해주세요 (영문, 숫자, 특수문자 조합)</div>
                    </div>

                    <div class="mb-3">
                        <label>비밀번호 확인</label>
                        <input type="password" name="chk_password" id="chk_password" class="form-control" placeholder="비밀번호 확인" required>
                        <div class="invalid-feedback">비밀번호를 입력해주세요 (영문, 숫자, 특수문자 조합)</div>
                    </div>

                    <div class="mb-3">
                        <label>이메일</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="아이디를 입력해주세요." required>
                        <div class="invalid-feedback">이메일을 입력해주세요</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="signup_btn">가입</button>
                    <button type="button" class="btn btn-secondary close_btn" data-bs-dismiss="modal">닫기</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- sign up modal end -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="text-secondary fw-bold fs-3">CI4Shop</div>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#login_modal">로그인</button>
                </div>
                <!-- <div class="card-body">
                    <div class="row" id="show_posts">
                        <h1 class="text-center text-secondary my-5">Posts Loading..</h1>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<script>
    
</script>