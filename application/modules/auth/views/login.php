<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <!-- <link rel="icon" href="<?= base_url(); ?>/assets/images/favicon-32x32.png" type="image/png" /> -->
  <link rel="icon" href="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" type="image/png" />
  <!--plugins-->
  <link href="<?= base_url(); ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- <link href="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" /> -->
  <link href="<?= base_url(); ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="<?= base_url(); ?>/assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?= base_url(); ?>/assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/app.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/icons.css" rel="stylesheet">
  <title>Sign In | GI-PMS</title>
</head>

<body class="bg-login">
  <!--wrapper-->
  <div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
      <div class="container-fluid">
        <div class="row row-cols-1 mx-5 row-cols-lg-2 mx-lg-0 row-cols-xl-3 mx-xl-0">
          <div class="col mx-auto">
            <div class="card rounded-4">
              <div class="card-body">
                <div class="border p-4 rounded-4">
                  <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/images/logo-gi/logo-gi-transparant.png" width="100" alt="" />
                    <h5 class="mt-3 mb-0">GI-PMS</h5>
                    <h5 class="mt-3 mb-0">Production Management System</h5>
                    <p class="mb-4">Please login before enter the page</p>
                  </div>

                  <div class="flash_msg">
                    <?= $this->session->flashdata('msg'); ?>
                  </div>

                  <div class="form-body">
                    <form class="row g-3" action="<?= site_url('auth/sign_in'); ?>" method="POST">
                      <div class="col-sm-12">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                      </div>
                      <div class="col-12">
                        <label for="inputPassword" class="form-label">Password</label>
                        <div class="input-group mb-3" id="inputPassword">
                          <input type="password" class="form-control border-end-0" name="password" placeholder="Password" aria-label="Password" aria-describedby="inputPassword">
                          <span class="input-group-text bg-transparent" style="cursor: pointer;"><i class='bx bx-hide'></i></span>
                        </div>
                        <!-- <input type="password" class="form-control rounded-5" id="inputPassword" name="password" placeholder="Enter Password"> -->
                      </div>
                      <!-- <div class="col-md-6">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                          <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-end">
                        <a href="authentication-forgot-password.html">Forgot Password ?</a>
                      </div> -->
                      <div class="col-sm-12">
                        <div class="row justify-content-center mt-3">
                          <div class="col-lg-6">
                            <div class="d-grid">
                              <button type="submit" id="btn_sign_in" class="btn btn-gradient-info rounded-5"><i class="bx bxs-lock-open"></i>Sign in</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-12">
                        <div class="login-separater text-center"> <span>OR SIGN IN WITH EMAIL</span>
                          <hr />
                        </div>
                      </div> -->
                      <!-- <div class="col-12">
                        <div class="d-grid">
                          <a class="btn mb-4 shadow-sm btn-white rounded-5" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                              <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                              <span>Sign in with Google</span>
                            </span>
                          </a>
                          <a href="javascript:;" class="btn shadow-sm btn-white rounded-5"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
                        </div>
                      </div> -->
                      <!-- <div class="col-12 text-center">
                        <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                      </div> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </div>
  </div>
  <!--end wrapper-->
  <!-- Bootstrap JS -->
  <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <!-- <script src="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> -->
  <!--Password show & hide js -->
  <script>
    $(document).ready(function() {
      $("#inputPassword span").on('click', function(event) {
        event.preventDefault();
        if ($('#inputPassword input').attr("type") == "text") {
          $('#inputPassword input').attr('type', 'password');
          $('#inputPassword i').addClass("bx-hide");
          $('#inputPassword i').removeClass("bx-show");
        } else if ($('#inputPassword input').attr("type") == "password") {
          $('#inputPassword input').attr('type', 'text');
          $('#inputPassword i').removeClass("bx-hide");
          $('#inputPassword i').addClass("bx-show");
        }
      });
    });

    // let timeout = 3000; // in miliseconds (3*1000)
    // $('.flash_msg').delay(timeout).fadeOut(300);

    window.setTimeout(function() {
      $(".flash_msg").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
  <!--app JS-->
  <!-- <script src="<?= base_url(); ?>/assets/js/app.js"></script> -->

  <script>
    $('#inputUsername').focus();

    $('#btn_sign_in').click(function() {

      $('#btn_sign_in').empty();
      $('#btn_sign_in').prop('disabled', true);
      $('#btn_sign_in').append('<span class="spinner-border spinner-border-sm" style="margin-right: 4px;" role="status" aria-hidden="true"></span>Signing in');

      $("form").submit();
    });
  </script>
</body>

</html>