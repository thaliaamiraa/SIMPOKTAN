<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <center>
                  <img src="<?= base_url() ?>assets/images/simpoktan.png">
                </center>
              </div>
              <center>

                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
              </center>

              <form action="<?= site_url('C_login/proses_login') ?>" class="pt-3" method="post">
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 
</body>

</html>
