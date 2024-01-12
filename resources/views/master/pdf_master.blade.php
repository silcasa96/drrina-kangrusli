<h1 style="text-align: center">Master</h1>
 <div class="table-responsive table-card">
<table class="table text-nowrap table-centered mt-0 text-nowrap" id="example1" style="width: 100%">
	<thead class="table-light">
		<tr>
			<th>No</th>
			<th>Logo</th><th>Nama Page</th><th>Deskripsi Page(Seo)</th><th>Keyword(Seo)</th><th>Alamat</th><th>No Telpon</th><th>Nama Narahubung</th><th>Email</th><th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
				  $no=0;foreach($master as $data){?>
			<?php $no++;?>
			<tr>
			<td><?=$no?></td>
						
						<td><?php  $logo = $data->logo;?>
						<a href="<?=url('uploads/'.$data->logo)?>" target="_blank" title="Download"><span class="fa fa-download"></span></a>
						</td>
						
						<td><?= $nama_page = $data->nama_page;?></td>
						
						<td><?= $deskripsi_page = $data->deskripsi_page;?></td>
						
						<td><?= $keyword = $data->keyword;?></td>
						
						<td><?= $alamat = $data->alamat;?></td>
						
						<td><?= $no_telepon = $data->no_telepon;?></td>
						
						<td><?= $nama_narahubung = $data->nama_narahubung;?></td>
						
						<td><?= $email = $data->email;?></td>
				<td>
							<div class="d-flex">
							<?php $row_edit_hapus = true?>
						<a title="view" href="<?=url("master/view/$data->primary_key/");?>" class="btn btn-success btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
			<path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
			<path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
		</svg>
		
	</a>
	<?php 
									$edit_visible = true;
									 if(!isset($no_edit) and $row_edit_hapus and $edit_visible){?>
	<a title="edit" href="<?=url("master/edit/$data->primary_key/");?>" class="btn btn-primary btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
			<path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
		</svg>
			</a>
	<?php 
									}
									
									?>


	<?php 
									$delete_visible = true;
									
									if(!isset($no_delete) and $row_edit_hapus and $delete_visible){?>

	<a title="delete" href="<?=url("master/hapus/$data->primary_key/");?>" onclick="return confirm('Apakah Anda Yakin?');" class="btn-xs btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
			<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
		</svg>
			</a>
	<?php 
									}
									?>
</div>
</td>
</tr><?php }?>	</tbody>
</table>
</div><script>
	// alert();
	$("#example1").DataTable({
		fixedColumns: {
			left: 2
		},
		"scrollY": 500,
		"scrollX": true,
		"ordering": true,
		"lengthChange": true,
		"paging": true,
	});
</script>	