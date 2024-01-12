<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Helper_function;


use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Fill;
use App\Eloquent\AbsenLog;
use App\Eloquent\Absen;
use DateTime;;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPExcel;
use PHPExcel_IOFactory;
use PDF;

class MasterController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth');
    }public function index(Request $request,$page,$id)
    {
    	return $this->$page($request,$id);
    }public function index_post(Request $request,$page,$id)
    {
    	return $this->$page($request,$id);
    }public function list($request,$id)
    {
    	
    	 
    	
    	
        $sql="SELECT *, website__master. as primary_key, website__master.id as primary_key, website__master.logo as logo_website__master, website__master.nama_page as nama_page_website__master, website__master.deskripsi_page as deskripsi_page_website__master, website__master.keyword as keyword_website__master, website__master.alamat as alamat_website__master, website__master.no_telepon as no_telepon_website__master, website__master.nama_narahubung as nama_narahubung_website__master, website__master.email as email_website__master  FROM website__master  WHERE  1=1 ";
        $master=DB::connection()->select($sql);
		       	if($request->Cari =='pdf'){
			return $this->pdf($master);
		}else if($request->Cari =='excel'){
			return $this->excel($request,$master);
		}else if($request->Cari =='export_empty'){
			return $this->export_empty($request,$master);
		}else if($request->Cari =='import_excel'){
			return $this->import_excel($request,$master);
		}else{
		
        	return view('master.list_master',compact('master'));
		}  
       
    }

    public function tambah()
    {
              
       return view('master.add_master');
    }

    public function save($request){
        DB::beginTransaction();
        try{
            $idUser=Auth::user()->id;
            $help = new Helper_function();
            				if ($request->file('logo')) {
				
					$file = $request->file('logo')[0];
					$destination="uploads/";
					$path='Master-'.date('YmdHis').$file->getClientOriginalName();
					$file->move($destination,$path);
					
					$data['logo'] = $path;
				}
				 $data['nama_page'] = $request->get('nama_page');
             $data['deskripsi_page'] = $request->get('deskripsi_page');
             $data['keyword'] = $request->get('keyword');
             $data['alamat'] = $request->get('alamat');
             $data['no_telepon'] = $request->get('no_telepon');
             $data['nama_narahubung'] = $request->get('nama_narahubung');
             $data['email'] = $request->get('email');
                        $data["created_at"]=date('Y-m-d H:i:s');
			$data["created_by"]=$idUser;
									
             DB::connection()->table("website__master")
                ->insert($data);
			$last_value=DB::connection()->select("select * from seq_website__master");
			$data["id"]=$last_value[0]->last_value;
               
                
               
                
            DB::commit();
            return redirect()->route('master',['list','-1'])->with('success','Master Berhasil di input!');
        }
        catch(\Exeception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e);
        }

    }

    public function edit($request,$id)
    {
    	    	$sql="SELECT *, website__master. as primary_key, website__master.id as primary_key, website__master.logo as logo_website__master, website__master.nama_page as nama_page_website__master, website__master.deskripsi_page as deskripsi_page_website__master, website__master.keyword as keyword_website__master, website__master.alamat as alamat_website__master, website__master.no_telepon as no_telepon_website__master, website__master.nama_narahubung as nama_narahubung_website__master, website__master.email as email_website__master  FROM website__master  WHERE  website__master.id=$id ";
        
        
        $master=DB::connection()->select($sql);
        $master = count($master)?$master[0]:array();
                
        return view('master.edit_master', compact('id','master'));
    }
	public function view($request,$id)
    {
    	    	$sql="SELECT *, website__master. as primary_key, website__master.id as primary_key, website__master.logo as logo_website__master, website__master.nama_page as nama_page_website__master, website__master.deskripsi_page as deskripsi_page_website__master, website__master.keyword as keyword_website__master, website__master.alamat as alamat_website__master, website__master.no_telepon as no_telepon_website__master, website__master.nama_narahubung as nama_narahubung_website__master, website__master.email as email_website__master  FROM website__master  WHERE  website__master.id=$id AND  website__master.active=1 ";
        
        
        $master=DB::connection()->select($sql);
        $master = count($master)?$master[0]:array();
                
        return view('master.view_master', compact('id','master'));
    }

    public function update($request, $id){
        DB::beginTransaction();
        try{
			$help =new Helper_function();
            $idUser=Auth::user()->id;
            $data['logo'] = $request->get('logo');
            $data['nama_page'] = $request->get('nama_page');
            $data['deskripsi_page'] = $request->get('deskripsi_page');
            $data['keyword'] = $request->get('keyword');
            $data['alamat'] = $request->get('alamat');
            $data['no_telepon'] = $request->get('no_telepon');
            $data['nama_narahubung'] = $request->get('nama_narahubung');
            $data['email'] = $request->get('email');
            $data["updated_at"]=date('Y-m-d H:i:s');
			$data["updated_by"]=$idUser;
			
            DB::connection()->table("website__master")
                ->where("id",$id)
                ->update($data);
                
                
                
                     
              
            DB::commit();
            return redirect()->route('master',['list','-1'])->with('success','Master Berhasil di Ubah!');
        }
        catch(\Exeception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e);
        }
    }
    public function hapus($request,$id)
    {
        DB::beginTransaction();
        try{
            $idUser=Auth::user()->id;
            DB::connection()->table("website__master")
                ->where("id",$id)
                ->update([
                	"active"=>0, 
                	"deleted_by"=>$idUser,
                    "deleted_at" => date("Y-m-d H:i:s")
                ]
                );
            DB::commit();
            return redirect()->route('master',['list','-1'])->with('success','Master Berhasil di Hapus!');
        }
        catch(\Exeception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e);
        }
    }
    public function pdf($master)
    {
		
		    

		$pdf = PDF::loadView('master.pdf_master', compact('master'))->setPaper('a4', 'landscape');
           
        return $pdf->download('master - All.pdf');
	}
	public function PDFPage($request,$id)
    {
		
		    	$sql="SELECT *, website__master. as primary_key, website__master.id as primary_key, website__master.logo as logo_website__master, website__master.nama_page as nama_page_website__master, website__master.deskripsi_page as deskripsi_page_website__master, website__master.keyword as keyword_website__master, website__master.alamat as alamat_website__master, website__master.no_telepon as no_telepon_website__master, website__master.nama_narahubung as nama_narahubung_website__master, website__master.email as email_website__master  FROM website__master  WHERE  website__master.id=$id AND  website__master.active=1 ";
        
        
        $master=DB::connection()->select($sql);
        $data = count($master)?$master[0]:array();
		$master = $data;
		


		$pdf = PDF::loadView('master.PDFPage_master', compact('id','master','data'))->setPaper('a4', 'portait');
           
        return $pdf->download('Master - Page.pdf');
	}
	    public function excel($request,$row){
						
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();
            $y = 0;
            $help = new Helper_function();
                        	
            $sheet->setCellValue($help->toAlpha($y) . '1', 'No');
            $y++;
            					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Logo');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Page');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Page(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Keyword(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Alamat');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'No Telpon');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Narahubung');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Email');
				                $y++;
				
           

            $rows = 1;
						if(!empty($row)){
                $no = 0;
                foreach ($row as $data) {
                    $rows++;

                    
                    $no++;
                    $y = 0;
                   	                    $sheet->setCellValue($help->toAlpha($y) . $rows, $no);
	                    $y++;
					                            $sheet->setCellValue($help->toAlpha($y) . $rows, $data->logo);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->nama_page);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->deskripsi_page);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->keyword);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->alamat);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->no_telepon);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->nama_narahubung);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->email);
                            $y++;
                       }
            }
            
            $type = 'xlsx';
            $fileName = "Master ." . $type;
            if ($type == 'xlsx') {
                $writer = new Xlsx($spreadsheet);
            } else if ($type == 'xls') {
                $writer = new Xls($spreadsheet);
            }
            $writer->save("export/" . $fileName);
            header("Content-Type: application/vnd.ms-excel");
            return redirect(url('/') . "/export/" . $fileName);
        
	
	}
		    public function export_existing($request,$row){
						
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();
            $y = 0;
            $help = new Helper_function();
            					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Logo');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Page');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Page(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Keyword(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Alamat');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'No Telpon');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Narahubung');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Email');
				                $y++;
				
           

            $rows = 1;
						if(!empty($row)){
                $no = 0;
                foreach ($row as $data) {
                    $rows++;

                    
                    $no++;
                    $y = 0;
                                               $sheet->setCellValue($help->toAlpha($y) . $rows, $data->logo);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->nama_page);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->deskripsi_page);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->keyword);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->alamat);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->no_telepon);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->nama_narahubung);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->email);
                            $y++;
                       }
            }
            
            $type = 'xlsx';
            $fileName = "Master ." . $type;
            if ($type == 'xlsx') {
                $writer = new Xlsx($spreadsheet);
            } else if ($type == 'xls') {
                $writer = new Xls($spreadsheet);
            }
            $writer->save("export/" . $fileName);
            header("Content-Type: application/vnd.ms-excel");
            return redirect(url('/') . "/export/" . $fileName);
        
	
	}
	
	    public function export_empty($request,$row){
						$help = new Helper_function();
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();
            $y = 0;
            $help = new Helper_function();
            					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Logo');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Page');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Page(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Keyword(Seo)');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Alamat');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'No Telpon');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Nama Narahubung');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Email');
				                $y++;
				
           

            $rows = 1;
							
				for($j=0;$j<=0;$j++){
					 $y = 0;
					 $rows++;
					                             $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                                                    $sheet->setCellValue($help->toAlpha($y) . $rows, "");
                            $y++;
                        				}
            $type = 'xlsx';
            $fileName = "Master ." . $type;
            if ($type == 'xlsx') {
                $writer = new Xlsx($spreadsheet);
            } else if ($type == 'xls') {
                $writer = new Xls($spreadsheet);
            }
            $writer->save("export/" . $fileName);
            header("Content-Type: application/vnd.ms-excel");
            return redirect(url('/') . "/export/" . $fileName);
        
	
	}
		public function import_excel($request,$id)
    {
    	$help = new Helper_function();
		$idUser=Auth::user()->id;
    	    		$file = $request->file('excel');
		    $tujuan_upload = 'export';

	        $name = 'import-excel-'.'Master'.date('YmdHis').'-'. $file->getClientOriginalName();
	        $file->move($tujuan_upload, $name);
	       
	        $uploadFilePath = $tujuan_upload.'/'. $name;
	        $inputFileType = ucfirst(pathinfo($uploadFilePath, PATHINFO_EXTENSION));;
			//    $inputFileType = 'Xlsx';
			//    $inputFileType = 'Xml';
			//    $inputFileType = 'Ods';
			//    $inputFileType = 'Slk';
			//    $inputFileType = 'Gnumeric';
			//    $inputFileType = 'Csv';

			/**  Create a new Reader of the type defined in $inputFileType  **/
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
			/**  Load $inputFileName to a Spreadsheet Object  **/
			$spreadsheet = $reader->load($uploadFilePath);
			//die;
			
			$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			for($j=2;$j<=count($sheetData);$j++){
									if(!empty($sheetData[$j][$help->toAlpha(0)])){
											
						$sqli['logo'] = $sheetData[$j][$help->toAlpha(0)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(1)])){
											
						$sqli['nama_page'] = $sheetData[$j][$help->toAlpha(1)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(2)])){
											
						$sqli['deskripsi_page'] = $sheetData[$j][$help->toAlpha(2)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(3)])){
											
						$sqli['keyword'] = $sheetData[$j][$help->toAlpha(3)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(4)])){
											
						$sqli['alamat'] = $sheetData[$j][$help->toAlpha(4)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(5)])){
											
						$sqli['no_telepon'] = $sheetData[$j][$help->toAlpha(5)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(6)])){
											
						$sqli['nama_narahubung'] = $sheetData[$j][$help->toAlpha(6)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(7)])){
											
						$sqli['email'] = $sheetData[$j][$help->toAlpha(7)];
					}
								
				$sqli["created_at"]=date('Y-m-d H:i:s');
				$sqli["created_by"]=$idUser;
								DB::connection()->table("website__master")
                			->insert($sqli);
                				
				
			}
	}
					
			
	
		
}	
