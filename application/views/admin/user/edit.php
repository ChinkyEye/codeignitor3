<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Edit user
                </div>
              </div>
              <form role="form" method="POST" action="<?php echo base_url().'admin/user/edit/'.$users['id'] ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : '' ?>" id="name" placeholder="Enter Name" name="name" autocomplete="off" value="<?php echo set_value('name',$users['name']) ?>">
                   <?php echo form_error('name') ?>
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control <?php echo (form_error('email') != "")?'is-invalid' : '' ?>" id="email" placeholder="Enter email" name="email" autocomplete="off" value="<?php echo set_value('email',$users['email']) ?>" >
                    <?php echo form_error('email') ?>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label><br>
                    <input type="file" name="image" id="image" class="<?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>">
                     <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
                     <?php if($users['image'] != "" && file_exists('./public/uploads/user/'.$users['image'])) { ?>
                      <img src="<?php  echo base_url().'public/uploads/user/'. $users['image'] ?>" width="100" height="100">
                      <?php  } else { ?>
                        <img src="<?php  echo base_url().'public/uploads/no-image.jpg' ?>" width="100" height="100">
                      <?php } ?>



                  </div>
                </div>
                <div class="card-footer justify-content-between">
                  <button type="submit" class="btn btn-info text-capitalize">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php $this->load->view('admin/footer'); ?> 