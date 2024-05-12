<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laptop - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="assets/img/1200x1200.png" alt="" style="width:460px; height:610px;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" 
                            action="http://localhost/laptop_shop/register/register"
                            onsubmit="return btnregister()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="first_name"
                                            id="exampleFirstName" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="last_name"
                                         id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="repeat_password" id="exampleRepeatPassword"
                                            placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="button" name="register"
                                    onclick="btnregister()">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="http://localhost/laptop_shop/login">Already have an account?
                                    Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/check.js"></script>
<script>
function btnregister() {
    var firstNameInput = $('input[name=first_name]');
    var lastNameInput = $('input[name=last_name]');
    var emailInput = $('input[name=email]');
    var passwordInput = $('input[name=password]');
    var repeatPasswordInput = $('input[name=repeat_password]');

    data = {
        'first_name': firstNameInput.val(),
        'last_name': lastNameInput.val(),
        'email': emailInput.val(),
        'password': passwordInput.val(),
        'repeat_password': repeatPasswordInput.val()
    };
    if(checkEmptyAndHighlight(firstNameInput) && checkEmptyAndHighlight(lastNameInput) && checkEmptyAndHighlight(emailInput) && checkEmptyAndHighlight(passwordInput) && checkEmptyAndHighlight(repeatPasswordInput)){
        swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
    }else{
        if(!validateEmail(data.email)){
            swal("Error", "Email không đúng định dạng", "error");
        }else{
            if(data.password != data.repeat_password){
                swal("Error", "Mật khẩu không trùng khớp", "error");
            }else{
                if(!validatePassword(data.password)){
                    swal("Error", "Mật khẩu phải có độ dài từ 8-16 kí tự", "error");
                }else{
                    $.ajax({
                    url: "http://localhost/laptop_shop/register/register",
                    type: "POST",
                    data: data,
                    success: function(data) {
                            var data2 = JSON.parse(data);
                            if(data2.check == 'success'){
                                swal("Success", "Đăng ký thành công", "success")
                                .then((value) => {
                                    window.location.href = "http://localhost/laptop_shop/login";
                                });
                                    
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }
        }
    }
    
}
</script>