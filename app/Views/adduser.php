<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand mt-2 mt-lg-0 " href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
    </a>
   <!-- Collapsible wrapper 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       Navbar brand 
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
     
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>
      </ul>
     
    </div> -->
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex ">
        <?php foreach ($data as $company) { ?>
            <div class="row">
                <div><?= $company['companyname'] ?></div>
                <div><?= $company['adminname'] ?></div>
            </div>
        <?php } ?>
    
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-end hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="35"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="<?php echo base_url("logout"); ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<!-- Add user form -->
<section class="vh-100 mt-5" >
<div class="container ">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url("saveuser"); ?>">
            
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-name'))
                {
                echo $validation->getError('user-name');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="user-name" name="user-name" class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example1c">User Name</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-email'))
                {
                echo $validation->getError('user-email');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="email" id="user-email" name="user-email" class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example3c">User Email</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-passcode'))
                {
                echo $validation->getError('user-passcode');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="user-passcode" name="user-passcode"  class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example4c">User Password</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-dob'))
                {
                echo $validation->getError('user-dob');
                }?>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fa-solid fa-calendar-days fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="date" id="user-dob" name="user-dob" class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example1c">Date of birth</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-phone'))
                {
                echo $validation->getError('user-phone');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="number" id="user-phone" name="user-phone" class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example3c">Phone</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-address'))
                {
                echo $validation->getError('user-address');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="user-address" name="user-address"  class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example4c">Address</label>
                </div>
            </div>
            <div class="text-danger ms-5">
                <?php if(isset($validation) && $validation->hasError('user-role'))
                {
                echo $validation->getError('user-role');
                }?>
            </div> 
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fa-solid fa-eye fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="user-role" name="user-role"  class="form-control" autocomplete="off"/>
                    <label class="form-label" for="form3Example4c">Role/Rights</label>
                </div>
            </div>
            <div class=" d-flex flex-row-reverse">
                <a> <button type="submit" class="btn btn-outline-primary ">Save user</button></a><br><br><br>
            </div>
            </form>
        </div>
    </div>
</div>
</section>