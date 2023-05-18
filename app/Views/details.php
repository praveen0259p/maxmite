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
    <a class="navbar-brand mt-2 ms--5 mt-lg-0 " href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
    </a>
 

    <!-- Right elements -->
    <div class="d-flex ">
        <?php
            if($companydata)
            {
                foreach ($companydata as $company) { ?>
                    <div class="row">
                        <div><?= $company['companyname'] ?></div>
                        <div><?= $company['adminname'] ?></div>
                    </div>
                <?php } ?>
           <?php }
            else
            { 
                foreach ($userdata as $user) { ?>
                    <div class="row ">
                        <div  style="margin-left:-50px;"><?= $user['companyname'] ?></div>
                        <div  style="margin-left:-50px;"><?= $user['name'] ?></div>
                    </div>
                <?php } ?>
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
<section class="vh-100 mt-5" >
  <div class="container ">
    <div class="card">
        <div class="card-body table-responsive">
           <?php 
            if($companydata)
            {
                foreach ($companydata as $company) {
                    if($company['role']==='ADMIN') { ?>
                   <div class=" d-flex flex-row-reverse">
                        <a href="<?php echo base_url("adduser"); ?>"> <button type="button" class="btn btn-outline-primary mb-4">Add user</button></a><br><br><br>
                    </div>
                   <?php } 
                 } ?>
            <?php }?>    
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dob</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rights</th>
                      <?php 
                        if($companydata)
                        {
                            foreach ($companydata as $company) {
                                if($company['role']==='ADMIN') { ?>
                              <th scope="col">Edit Privileges</th>
                              <?php } 
                            } ?>
                        <?php }?> 
                    
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if($totalusercompanydata)
                    {
                        foreach ($totalusercompanydata as $totaluser){?>
                           <tr>
                            <th scope="row"><?= $totaluser['name'] ?></th>
                            <td><?= $totaluser['email'] ?></td>
                            <td><?= $totaluser['dob'] ?></td>
                            <td><?= $totaluser['phone'] ?></td>
                            <td><?= $totaluser['address'] ?></td>
                            <td><?= $totaluser['rights'] ?></td>
                            <?php 
                            if($companydata)
                            {
                              foreach ($companydata as $company) {
                                  if($company['role']==='ADMIN') { ?>
      
                                <td><a href="<?php echo site_url("edituser/".$totaluser['email']) ?>"><button type="button" class="btn btn-outline-primary mb-4"><i class="fa-regular fa-pen-to-square"></i>Edit</button></a></td>
                                <?php } 
                              } ?>
                            <?php }?> 
                            </tr>
                        <?php } ?>
                    <?php } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Priviliges</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>