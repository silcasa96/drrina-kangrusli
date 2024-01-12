@extends('layouts.app2')
					@section('content')

<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header row">
                <div class="col-lg-6">
            <div class="mb-5">
            <h3 class="mb-0 "> Banner</h3>
        </div>
                </div>
        <div class="col-lg-6">
        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ol>
        </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                            @include('flash-message')
                            <div class="card-header d-md-flex">
                                <div class="col-md-7">
                                    
            <div class="flex-grow-1">
                <a class="btn btn-outline-info mb-2 " 
                    href="<?=url('banner/tambah/-1/')?>"
                > <span class="fa fa-plus-circle"></span> Banner</a>
            </div>    
                                    
                                </div>
                                <div class="col-md-5">
                                    <!--<a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                       data-template="settingOne">
                                        <i data-feather="settings" class="icon-xs"></i>
                                        <div id="settingOne" class="d-none">
                                            <span>Setting</span>
                                        </div>
                                    </a>-->

                                    <form method="POST" id="formimexport_fai_framework" enctype="multipart/form-data" action="<?=url("post_banner/list/-1/");?>">
      
        @csrf
        <div class=" text-right right">
        <button type="submit"  value="pdf" name="Cari" 
        class="btn btn-outline-info mb-2  "
        >PDF </button>
                    <button type="submit"   value="excel" name="Cari" class="btn btn-outline-info mb-2  "><span class="fa fa-download"></span> Excel </button>
        
                                     
                <button 
                type="submit" value="export_empty" name="Cari"
                class="btn btn-outline-info mb-2 " >
                <span class="fa fa-download"></span> Template 
                 </button>
           
                <button onclick="show_import(this)" type="button" 
                class="btn btn-outline-info mb-2 " >
                <span class="fa fa-upload"></span> Import 
                 </button>
                 
            
            </div>
        
        <div id="import_content" style="display:none;width: 64%;float: right;"> 
                    
                    <input type="file" class="form-control" name="excel" >
                    <button type="submit" value="import_excel" name="Cari" style="float: right;"   class="btn btn-outline-info mb-2  ">Submit</button>
                 </div>
        
        </form>
                                </div>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="formlist_fai_framework"  method="get" enctype="multipart/form-data">
                            <div class="row"></div>
                            
                            <div class="row">			<div class="col-12 mt-3 mb-3" ><div class="table-responsive table-card">
<table class="table text-nowrap table-centered mt-0 text-nowrap" id="example1" style="width: 100%">
	<thead class="table-light">
		<tr>
			<th>No</th>
			<th>Banner</th><th>File Tambahan</th><th>Title Banner</th><th>Deskripsi Banner</th><th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
				  $no=0;foreach($banner as $data){?>
			<?php $no++;?>
			<tr>
			<td><?=$no?></td>
						
						<td><?php  $banner = $data->banner;?>
						<a href="<?=url('uploads/'.$data->banner)?>" target="_blank" title="Download"><span class="fa fa-download"></span></a>
						</td>
						
						<td><?php  $file_tambahan = $data->file_tambahan;?>
						<a href="<?=url('uploads/'.$data->file_tambahan)?>" target="_blank" title="Download"><span class="fa fa-download"></span></a>
						</td>
						
						<td><?= $title_banner = $data->title_banner;?></td>
						
						<td><?= $deskripsi_banner = $data->deskripsi_banner;?></td>
				<td>
							<div class="d-flex">
							<?php $row_edit_hapus = true?>
						<a title="view" href="<?=url("banner/view/$data->primary_key/");?>" class="btn btn-success btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
			<path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
			<path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
		</svg>
		
	</a>
	<?php 
									$edit_visible = true;
									 if(!isset($no_edit) and $row_edit_hapus and $edit_visible){?>
	<a title="edit" href="<?=url("banner/edit/$data->primary_key/");?>" class="btn btn-primary btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
			<path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
		</svg>
			</a>
	<?php 
									}
									
									?>


	<?php 
									$delete_visible = true;
									
									if(!isset($no_delete) and $row_edit_hapus and $delete_visible){?>

	<a title="delete" href="<?=url("banner/hapus/$data->primary_key/");?>" onclick="return confirm('Apakah Anda Yakin?');" class="btn-xs btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
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
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>


@endsection<script>
    function show_import(){
        $('#import_content').show();
    }
    function list_from(Cari) {
        	if(Cari=='pdf'){
        		
        		window.location.href="<?=url("/banner/pdf/-1/");?>";
        	}else if(Cari=='excel'){
        		window.location.href="<?=url("/banner/excel/-1/");?>";
        	}else{
        		
        	
            $.ajax({
                type: 'get',
                data: $('#formlist_fai_framework').serialize() 
                	+ '&Cari='+Cari+ '&id='+'-1'
                	+ '&apps='+$('#load_apps').val()
                	+ '&page_view='+$('#load_page_view').val()
                	+ '&type='+Cari
                	+ '&link_route='+$('#load_link_route').val(),
                url: $('#load_link_route').val() ,
                dataType: 'html',
                success: function(data) {
                    $('#contentFaiFramework').html(data);
                },
                error: function(error) {
                    console.log('error; ' + eval(error));
                    //alert(2);
                }
            });
			}
        
    }
    function list_imexport(Cari) {
        	if(Cari=='pdf'){
        		
        		window.location.href="<?=url("/banner/pdf/-1/");?>";
        	}else if(Cari=='excel'){
        		window.location.href="<?=url("/banner/excel/-1/");?>";
        	}else{
        		
        	
            $.ajax({
                type: 'get',
                data: $('#formlist_fai_framework').serialize() 
                	+ '&Cari='+Cari+ '&id='+'-1'
                	+ '&apps='+$('#load_apps').val()
                	+ '&page_view='+$('#load_page_view').val()
                	+ '&type='+Cari
                	+ '&link_route='+$('#load_link_route').val(),
                url: $('#load_link_route').val() ,
                dataType: 'html',
                success: function(data) {
                    $('#contentFaiFramework').html(data);
                },
                error: function(error) {
                    console.log('error; ' + eval(error));
                    //alert(2);
                }
            });
			}
        
    }
</script>	