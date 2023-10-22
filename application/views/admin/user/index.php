<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          	<?php
          	if(!empty($this->session->flashdata('success')))
          	{
          		echo "<div class='alert alert-success'>".$this->session->flashdata("success")."</div>";
          	}

          	if(!empty($this->session->flashdata('error')))
          	{
          		echo "<div class='alert alert-danger'>".$this->session->flashdata("error")."</div>";
          	}

          	?>

          	<div class="card">
          		<div class="card-header">
          			<div class="row">
          				<a href="<?php echo base_url().'admin/user/create' ?>" class="btn btn-sm btn-info text-capitalize rounded-0" data-toggle="tooltip" data-placement="top" title="Add User">Add</a>
          			</div>
          		</div>
          		<div class="card-body">
          			<div class="table-responsive">
          				<table class="table table-bordered table-hover m-0 table-sm">
          					<thead class="bg-dark">
          						<tr class="text-center">
          							<th width="10">SN</th>
          							<th>Name</th>
          							<th>Email</th>
          							<th width="100">Status</th>
          							<th width="150">Action</th>
          						</tr>
          					</thead>
          					<tbody>
          						<?php foreach($user as $key => $data){ ?>
          						<tr class="text-center">
          							<td><?php echo $key + 1 ?></td>
          							<td><?php echo $data['name'] ?></td>
          							<td><?php echo $data['email'] ?></td>
          							<td>
          								<span class="badge badge-success">Status</span>
          							</td>
          							<td>
          								<a href="<?php echo base_url().'admin/user/edit/'.$data['id'] ?>" class="btn btn-primary btn-sm">
          									<i class="far fa-edit"></i>
          								</a>
          								<a href="<?php echo base_url().'admin/user/delete/'.$data['id'] ?>" class="btn btn-danger btn-sm">
          								<i class="far fa-trash-alt"></i>
          								</a>
          							</td>
          						</tr>
          					<?php } ?>
          					</tbody>
          				</table>
          			</div>
          		</div>
          	</div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </div>
 <?php $this->load->view('admin/footer'); ?> 