
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
        <form method="POST" action="<?php echo base_url("userauth");?>">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>
          <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning">
          <?= session()->getFlashdata('msg') ?>
        </div>
        <?php endif;?>
          <div class="text-danger">
            <?php if(isset($validation) && $validation->hasError('email'))
            {
              echo $validation->getError('email');
            }?>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>
          <div class="text-danger">
            <?php if(isset($validation) && $validation->hasError('password'))
            {
              echo $validation->getError('password');
            }?>
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo base_url("signup");?>"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

