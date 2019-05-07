<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }
    public function index(){
        $data['listProduct'] = $this->productRepository->getAllData();
        return view ('homepage', $data);
    }

    public function deleteById(Request $request){
        $this->productRepository->deleteById ($request->id);
        return redirect('/home');
    }

    public function addNewProduct(Request $request){
        $dataProduct = array(
            'Name' => $request->name,
            'Title' => $request->title,
            'Price' => $request->price
        );
        $this->productRepository->addNewData($dataProduct);
        return redirect('/home');
    }

    public function importFileExcel(Request $request){
        $patchFileSave = $this->uploadFileIntoServer($request);
        try {
            //xac dinh loai file excel
            $inputFileType = \PHPExcel_IOFactory::identify($patchFileSave);
            // render file ra object render
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);

            //load ra file object php excel tu patch luu file
            $objPHPExcel = $objReader->load($patchFileSave);
            
        } catch(Exception $e) {
            $this->deleteFile($patchFileSave);
            dd('Error while processing imported file.');
        }
        //lay du lieu object php excel
        $sheet = $objPHPExcel->getSheet(0);
        //lay so luong hang
        $highestRow = $sheet->getHighestRow();
        // lay so luong cot vd C : 3 cot
        $highestColumn = $sheet->getHighestColumn();
        $range = 'A1:' . $highestColumn . $highestRow;

        //convert excel sang array
        $ArrayProduct	= $sheet->rangeToArray( $range, true, true, true);

        $size =  sizeof($ArrayProduct);
        for($i = 1 ; $i < $size ; $i++){
            $this->addNewProductIntoDatabase($ArrayProduct[$i][0],$ArrayProduct[$i][1],$ArrayProduct[$i][2]);
        }
        return redirect('/home');

        //cach 2 cua chi vanesssa
        //$sheetData = $sheet->rangeToArray( $range, null, true, true, false);
        //$titles = array_filter(array_shift($sheetData)); //loại bỏ phần tử đầu tiên của mảng
        
        
    }
    private function uploadFileIntoServer(Request $request){
        $file = $request->file('import_file');
        $file->move(base_path('upload'),$file->getClientOriginalName());
        $patchFileSave = base_path('upload/'.$file->getClientOriginalName());
        return $patchFileSave;
    }

    private  function addNewProductIntoDatabase($name,$title,$price){
        
        $dataProduct = array(
            'Name' => $name,
            'Title' => $title,
            'Price' => $price
        );

        $rules = array(
            'Name' => 'min:6',
            'Title' => 'min:6'
        );

        $validate = Validator::make($dataProduct, $rules);
        if($validate->fails()){
            Log::info('data validate fail and skip');
            Log::info($validate->errors());
        }else{
            $this->productRepository->addNewData($dataProduct);
            Log::info('data ok and insert');
        }
        
    }
}
