@extends('layouts.app2')
					@section('content')<div class="py-1 row">
        <div class="col-lg-6 col-md-6 col-6">
        @include('flash-message')
        <!-- Page header -->
        <div class="mb-5">
            <h3 class="mb-0 "> Master</h3>
        </div>
        </div>
        <div class="col-lg-6">
        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="master/list/-1/">Master</a></li>
                            <li class="breadcrumb-item active">view_viewsource</li>
                        </ol>
        </div>
    </div>
    <div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12 col-12">
                <!-- card -->
                <div class="card mb-12">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                        <form method="POST" id="formvte_fai_framework" enctype="multipart/form-data" action="<?=url("post_master/view/$id/");?>">                       @csrf
                        @csrf
                            <!-- input -->
                            <div class="row"><div class="col-md-12"><div class="mb-3"><label class="form-label">Logo</label><input name="logo[]" id="logo0" type="file" disabled class="form-control  logo"  type="text" placeholder="Logo" value="<?=$master->logo;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Nama Page</label><input name="nama_page" id="nama_page0" type="text" disabled class="form-control  nama_page"  type="text" placeholder="Nama Page" value="<?=$master->nama_page;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Deskripsi Page(Seo)</label><input name="deskripsi_page" id="deskripsi_page0" type="text" disabled class="form-control  deskripsi_page"  type="text" placeholder="Deskripsi Page(Seo)" value="<?=$master->deskripsi_page;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Keyword(Seo)</label><input name="keyword" id="keyword0" type="text" disabled class="form-control  keyword"  type="text" placeholder="Keyword(Seo)" value="<?=$master->keyword;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Alamat</label><input name="alamat" id="alamat0" type="text" disabled class="form-control  alamat"  type="text" placeholder="Alamat" value="<?=$master->alamat;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">No Telpon</label><input name="no_telepon" id="no_telepon0" type="text" disabled class="form-control  no_telepon"  type="text" placeholder="No Telpon" value="<?=$master->no_telepon;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Nama Narahubung</label><input name="nama_narahubung" id="nama_narahubung0" type="text" disabled class="form-control  nama_narahubung"  type="text" placeholder="Nama Narahubung" value="<?=$master->nama_narahubung;?>" /></div></div><div class="col-md-12"><div class="mb-3"><label class="form-label">Email</label><input name="email" id="email0" type="text" disabled class="form-control  email"  type="text" placeholder="Email" value="<?=$master->email;?>" /></div></div></div></table></div>

                                <!-- input -->

                                
                                <div class="modal-footer">
                                <div class="">    <a href="'<?=url("/PDFPage/$id/PDFPage/$id/");?>'"  target="_blank" 
                        class="btn btn-outline-info mb-2  ">
                        <span class="fa fa-print"></span> Print </a><?php $row_edit_hapus = true;?><a href="'<?=url("/list/-1/list/-1/");?>'" class="btn btn-outline-info mb-2  ">
            
                <span class='fa fa-times'></span> Batal </a>
        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><script>
    function u3OmVFdtRd4uXovbH93VEgnnVvoZCfgxa38DXdOaEPopYn3(k1c3rd6oNGXpYsShHOqQhilDC4314zDBm5fDb, kPmlKFpnFVaL6UxJHIWG169OOKdOLzimnIa11IWG16uYLnkVni1p, kPmlKFpnFVaL6UxJHIWG169OOKdOLzimVni1pjwYqPuYLnktTX9COLzim9OOKd3PhkLVni1pjwYqPIWG16nIa11, date) {
        $.ajax({
            type: "post",
            data: {
                'first': link_route,
                'link_route': $('#load_link_route').val(),
                'apps': 'Kegiatan',
                'page_view': 'list_kegiatan',
                'type': 'save_lapor_habits',
                'id': $('#load_id').val(),
                'contentfaiframework': 'pages',
                k54Pl3gdvRiNvXwcHaZY61SvdfxvD0u7: k1c3rd6oNGXpYsShHOqQhilDC4314zDBm5fDb,
                kPmlKFpnFVaL6UxJHIWG169OOKdOLzimnIa11IWG16uYLnkVni1p: kPmlKFpnFVaL6UxJHIWG169OOKdOLzimnIa11IWG16uYLnkVni1p,
                kPmlKFpnFVaL6UxJHIWG169OOKdOLzimVni1pjwYqPuYLnktTX9COLzim9OOKd3PhkLVni1pjwYqPIWG16nIa11: kPmlKFpnFVaL6UxJHIWG169OOKdOLzimVni1pjwYqPuYLnktTX9COLzim9OOKd3PhkLVni1pjwYqPIWG16nIa11,
                tgl: date,
                "MainAll": 2
            },
            url: link_route,
            cache: false,
            success: function(res) {

                loadTable()

            },
            error: function(error) {
                console.log(' Error ${error}')
            }
        });
    }

    function u3OmVFdtRd4uXovbH93VEgnnVvoZCfgxa38DXdOaEPopYn3BT9sBdOaEPZCfgx(k1c3rd6oNGXpYsShHOqQhilDC4314zDBm5fDb, date, span) {
        //alert();
        $('#' + k1c3rd6oNGXpYsShHOqQhilDC4314zDBm5fDb + '-' + date).html(span);
    }
</script>

<script>function validation(){
	
var result= 0;

if(result==0)
	return 1;
else
	return 0;


}

</script>

    <script>
        function submit_form(form_type) {
            formData = $('#formvte_fai_framework').serialize() +
                '§ion=viewsource' +
                '&view_layout_number=-1' +
                '&page_database=-1' +
                '&array=-1' +
                '&MainAll=2' +
                '&link_route=' + $('#load_link_route').val() +
                '&apps=' + $('#load_apps').val() +
                '&page_view=' + $('#load_page_view').val() +
                '&type=' + form_type +
                '&id=' + $('#load_id').val() +
                '&menu=' + $('#load_menu').val() +
                '&contentfaiframework=pages';

            // var form = ; // You need to use standard javascript object here
            // var formData = new FormData($('#formvte_fai_framework')[0]);
            // formData.append('contentfaiframework', 'pages');
            // formData.append('link_route', $('#load_link_route').val());
            // formData.append('apps', $('#load_apps').val());
            // formData.append('id', $('#load_id').val());
            // formData.append('page_view', $('#load_page_view').val());
            // formData.append('menu', $('#load_menu').val());
            // formData.append('type', form_type);
            // formData.append('section', 'viewsource');
            // formData.append('view_layout_number', '-1');
            // console.log(formData);

            $.ajax({
                type: 'get',
                data: formData,

                url: '',
                dataType: 'html',

                processData: false,
                contentType: false,
                success: function(data) {
                    reach_page('master', 'list', -1);
                },
                error: function(error) {
                    console.log('error; ' + eval(error));
                    //alert(2);
                }
            });
        }
    </script>



@endsection	