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

class BannerController extends Controller
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
    	
    	 
    	
    	
        $sql="SELECT *, website__banner. as primary_key, website__banner.id as primary_key, website__banner.banner as banner_website__banner, website__banner.file_tambahan as file_tambahan_website__banner, website__banner.title_banner as title_banner_website__banner, website__banner.deskripsi_banner as deskripsi_banner_website__banner  FROM website__banner  WHERE  1=1 ";
        $banner=DB::connection()->select($sql);
		       	if($request->Cari =='pdf'){
			return $this->pdf($banner);
		}else if($request->Cari =='excel'){
			return $this->excel($request,$banner);
		}else if($request->Cari =='export_empty'){
			return $this->export_empty($request,$banner);
		}else if($request->Cari =='import_excel'){
			return $this->import_excel($request,$banner);
		}else{
		
        	return view('banner.list_banner',compact('banner'));
		}  
       
    }

    public function tambah()
    {
              
       return view('banner.add_banner');
    }

    public function save($request){
        DB::beginTransaction();
        try{
            $idUser=Auth::user()->id;
            $help = new Helper_function();
            				if ($request->file('banner')) {
				
					$file = $request->file('banner')[0];
					$destination="uploads/";
					$path='Banner-'.date('YmdHis').$file->getClientOriginalName();
					$file->move($destination,$path);
					
					$data['banner'] = $path;
				}
								if ($request->file('file_tambahan')) {
				
					$file = $request->file('file_tambahan')[0];
					$destination="uploads/";
					$path='Banner-'.date('YmdHis').$file->getClientOriginalName();
					$file->move($destination,$path);
					
					$data['file_tambahan'] = $path;
				}
				 $data['title_banner'] = $request->get('title_banner');
             $data['deskripsi_banner'] = $request->get('deskripsi_banner');
                        $data["created_at"]=date('Y-m-d H:i:s');
			$data["created_by"]=$idUser;
									
             DB::connection()->table("website__banner")
                ->insert($data);
			$last_value=DB::connection()->select("select * from seq_website__banner");
			$data["id"]=$last_value[0]->last_value;
               
                
               
                
            DB::commit();
            return redirect()->route('banner',['list','-1'])->with('success','Banner Berhasil di input!');
        }
        catch(\Exeception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e);
        }

    }

    public function edit($request,$id)
    {
    	    	$sql="SELECT *, website__banner. as primary_key, website__banner.id as primary_key, website__banner.banner as banner_website__banner, website__banner.file_tambahan as file_tambahan_website__banner, website__banner.title_banner as title_banner_website__banner, website__banner.deskripsi_banner as deskripsi_banner_website__banner  FROM website__banner  WHERE  website__banner.id=$id ";
        
        
        $banner=DB::connection()->select($sql);
        $banner = count($banner)?$banner[0]:array();
                
        return view('banner.edit_banner', compact('id','banner'));
    }
	public function view($request,$id)
    {
    	    	$sql="SELECT *, website__banner. as primary_key, website__banner.id as primary_key, website__banner.banner as banner_website__banner, website__banner.file_tambahan as file_tambahan_website__banner, website__banner.title_banner as title_banner_website__banner, website__banner.deskripsi_banner as deskripsi_banner_website__banner  FROM website__banner  WHERE  website__banner.id=$id AND  website__banner.active=1 ";
        
        
        $banner=DB::connection()->select($sql);
        $banner = count($banner)?$banner[0]:array();
                
        return view('banner.view_banner', compact('id','banner'));
    }

    public function update($request, $id){
        DB::beginTransaction();
        try{
			$help =new Helper_function();
            $idUser=Auth::user()->id;
            $data['banner'] = $request->get('banner');
            $data['file_tambahan'] = $request->get('file_tambahan');
            $data['title_banner'] = $request->get('title_banner');
            $data['deskripsi_banner'] = $request->get('deskripsi_banner');
            $data["updated_at"]=date('Y-m-d H:i:s');
			$data["updated_by"]=$idUser;
			
            DB::connection()->table("website__banner")
                ->where("id",$id)
                ->update($data);
                
                
                
                     
              
            DB::commit();
            return redirect()->route('banner',['list','-1'])->with('success','Banner Berhasil di Ubah!');
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
            DB::connection()->table("website__banner")
                ->where("id",$id)
                ->update([
                	"active"=>0, 
                	"deleted_by"=>$idUser,
                    "deleted_at" => date("Y-m-d H:i:s")
                ]
                );
            DB::commit();
            return redirect()->route('banner',['list','-1'])->with('success','Banner Berhasil di Hapus!');
        }
        catch(\Exeception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e);
        }
    }
    public function pdf($banner)
    {
		
		    

		$pdf = PDF::loadView('banner.pdf_banner', compact('banner'))->setPaper('a4', 'landscape');
           
        return $pdf->download('banner - All.pdf');
	}
	public function PDFPage($request,$id)
    {
		
		    	$sql="SELECT *, website__banner. as primary_key, website__banner.id as primary_key, website__banner.banner as banner_website__banner, website__banner.file_tambahan as file_tambahan_website__banner, website__banner.title_banner as title_banner_website__banner, website__banner.deskripsi_banner as deskripsi_banner_website__banner  FROM website__banner  WHERE  website__banner.id=$id AND  website__banner.active=1 ";
        
        
        $banner=DB::connection()->select($sql);
        $data = count($banner)?$banner[0]:array();
		$banner = $data;
		


		$pdf = PDF::loadView('banner.PDFPage_banner', compact('id','banner','data'))->setPaper('a4', 'portait');
           
        return $pdf->download('Banner - Page.pdf');
	}
	    public function excel($request,$row){
						
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();
            $y = 0;
            $help = new Helper_function();
                        	
            $sheet->setCellValue($help->toAlpha($y) . '1', 'No');
            $y++;
            					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'File Tambahan');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Title Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Banner');
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
					                            $sheet->setCellValue($help->toAlpha($y) . $rows, $data->banner);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->file_tambahan);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->title_banner);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->deskripsi_banner);
                            $y++;
                       }
            }
            
            $type = 'xlsx';
            $fileName = "Banner ." . $type;
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
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'File Tambahan');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Title Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Banner');
				                $y++;
				
           

            $rows = 1;
						if(!empty($row)){
                $no = 0;
                foreach ($row as $data) {
                    $rows++;

                    
                    $no++;
                    $y = 0;
                                               $sheet->setCellValue($help->toAlpha($y) . $rows, $data->banner);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->file_tambahan);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->title_banner);
                            $y++;
                                                  $sheet->setCellValue($help->toAlpha($y) . $rows, $data->deskripsi_banner);
                            $y++;
                       }
            }
            
            $type = 'xlsx';
            $fileName = "Banner ." . $type;
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
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'File Tambahan');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Title Banner');
				                $y++;
				
           					$sheet->getColumnDimension($help->toAlpha($y))->setAutoSize(true);
                	$sheet->setCellValue($help->toAlpha($y) . '1', 'Deskripsi Banner');
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
                        				}
            $type = 'xlsx';
            $fileName = "Banner ." . $type;
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

	        $name = 'import-excel-'.'Banner'.date('YmdHis').'-'. $file->getClientOriginalName();
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
											
						$sqli['banner'] = $sheetData[$j][$help->toAlpha(0)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(1)])){
											
						$sqli['file_tambahan'] = $sheetData[$j][$help->toAlpha(1)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(2)])){
											
						$sqli['title_banner'] = $sheetData[$j][$help->toAlpha(2)];
					}
										if(!empty($sheetData[$j][$help->toAlpha(3)])){
											
						$sqli['deskripsi_banner'] = $sheetData[$j][$help->toAlpha(3)];
					}
								
				$sqli["created_at"]=date('Y-m-d H:i:s');
				$sqli["created_by"]=$idUser;
								DB::connection()->table("website__banner")
                			->insert($sqli);
                				
				
			}
	}
					
			
	
		
}	
