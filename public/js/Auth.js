// add new post ajax request
$(document).ready(function(){
    $("#login_form").submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
        } else {
            do_login(formData);
        }
    });

    $("#signup_form").submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
        } else {
            do_signup(formData);
        }
    });

    $(".close_btn").click(function(e) {
        e.preventDefault();
        $("#login_form").removeClass('was-validated');
        $("#signup_form").removeClass('was-validated');
    })
});

function do_login(formData) {
    let isSuccess = false;

    $("#login_btn").prop('disabled', true);
    $("#login_btn").text("로그인 중...");
    $.ajax({
        url: '/api/user/login',
        method: 'post',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if(!response.status) {
                if(response.isLoggedIn) {
                    $("#login_btn").text("로그인 성공");
                    $("#login_modal").modal('hide');
                    $("#login_form").removeClass('was-validated');
                }
            } else {
                if($("#login_form").hasClass("was-validated")) {
                    $("#login_form").addClass('was-validated');
                }
                $("#login_btn").prop('disabled', false);
                $("#login_btn").text("로그인");
            }
        },
        error: function(xhr, status, error){
            alert("Error!" + xhr.status);
        },
        complete: function(){
            if(!isSuccess){
                $("#login_btn").prop('disabled', false);
                $("#login_btn").text("로그인");
            }
        },
    });
}

function do_signup(formData) {
    let isSuccess = false;

    $("#signup_btn").prop('disabled', true);
    $("#signup_btn").text("가입 중...");
    $.ajax({
        url: '/api/user/register',
        method: 'post',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if(response.status) {
                $("#signup_btn").text("회원가입 성공");
                $("#signup_form").removeClass('was-validated');
                $("#signup_modal").modal('hide');
                $("#login_modal").modal('show');
                $("#auth_msg").text("회원가입 되었습니다. 로그인해주세요.");
                $("#auth_msg").show();
            } else {
                if($("#signup_form").hasClass("was-validated")) {
                    $("#signup_form").addClass('was-validated');
                }
            }
        },
        error: function(xhr, status, error){
            // alert("Error!" + xhr.status);
        },
        complete: function(){
            if(!isSuccess){
                $("#signup_btn").prop('disabled', false);
                $("#signup_btn").text("가입");
            }
        },
    });
}