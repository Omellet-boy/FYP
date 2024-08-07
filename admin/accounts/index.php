<style>
    .img-thumb-path{
        width:100px;
        height:80px;
        object-fit:scale-down;
        object-position:center center;
    }
	.btn-flat.btn-default.btn-sm.dropdown-toggle.dropdown-icon {
 	background: linear-gradient(to bottom, #87CEEB 0%, #FFFFFF 100%);
	transition: background 0.3s, color 0.3s, box-shadow 0.3s
  	border: none;
  	border-radius: 5px;
  	color: #333;
	}
	.btn-flat.btn-default.btn-sm.dropdown-toggle.dropdown-icon:hover {
  	background: linear-gradient(to bottom, #87CEEB 0%, #FFFFFF 100%);
  	color: #333;
  	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	}
	.btn-primary.btn-flat.btn-sm {
  	background: linear-gradient(to bottom, #007bff 0%, #003399 100%);
  	border: none;
  	border-radius: 5px;
  	color: #ffffff;
	}
	.btn-flat.btn-primary:hover {
  	background: linear-gradient(to bottom, #003399 0%, #007bff 100%);
  	color: #ffffff;
  	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	}
	.card-body{
    background-color: #fcf9e8; /* very light yellow */
    padding: 30px;
	}
</style>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">List of Journal  </h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="25%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-primary text-light">
						<th>#</th>
						<th>Date Created</th>
						<th>Account</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$qry = $conn->query("SELECT * from `journal_list` where delete_flag = 0 order by `name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_create'])) ?></td>
							<td class=""><?php echo $row['name'] ?></td>
							<td class=""><p class="m-0 truncate-1"><?php echo $row['description'] ?></p></td>
							<td class="text-center">
								<?php 
									switch($row['status']){
										case 0:
											echo '<span class="badge badge-danger bg-gradient-danger px-3 py-2 rounded-pill">Inactive</span>';
											break;
										case 1:
											echo '<span class="badge badge-success bg-gradient-success px-3 py-2 rounded-pill">Active</span>';
											break;
										default:
											echo '<span class="badge badge-default border px-3 rounded-pill">N/A</span>';
												break;
									}
								?>
							</td>
							<td align="center">
								<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
									Action
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu" role="menu">
								<a class="dropdown-item view_data" href="javascript:void(0)" data-id ="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item edit_data" href="javascript:void(0)" data-id ="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $row['name'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
								</div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
        $('#create_new').click(function(){
			uni_modal("Add New Account","accounts/manage_account.php",'mid-large')
		})
        $('.edit_data').click(function(){
			uni_modal("Update Account Details","accounts/manage_account.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.delete_data').click(function(){
			_conf("Are you sure to delete '<b>"+$(this).attr('data-name')+"</b>' from Accounts List permanently?","delete_account",[$(this).attr('data-id')])
		})
		$('.view_data').click(function(){
			uni_modal("Account Details","accounts/view_account.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
	})
	function delete_account($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_account",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>