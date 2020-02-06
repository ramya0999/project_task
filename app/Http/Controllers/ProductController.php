<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller
{
    public function file_upload() {

    	return view('file_upload');
    }

    public function save_file(Request $request) {

    	$this->validate($request, [
    		'fileup' => 'required|mimes:csv,txt',
    	]);

    	$upload = $request->file('fileup');
    	$filePath = $upload->getRealPath();
    	$row=0;
    	if(($read_data = fopen($filePath, 'r')) !== FALSE) {
			while( ($records = fgetcsv ($read_data)) !== FALSE) {
				$row++;
				if($row == 1) continue;
    			$product = new Product;
    			$product->lot_title = $records[0];
    			$product->category_name = $records[1];
    			$product->skucode = $records[2];
    			$product->barcode = $records[3];
    			$product->serial_number = $records[4];
    			$product->lot_number = $records[5];
    			$product->lot_location = $records[6];
    			$product->description = $records[7];
    			$product->price = $records[8];
    			$product->lot_condition = $records[9];
    			$product->pre_tax_amount = $records[10];
    			$product->tax_name = $records[11];
    			$product->tax_amount = $records[12];
    			$product->warehouse_name = $records[13];
    			$product->save();
    		}
    		fclose($read_data);
    		return redirect("view_products");
    	}
    }

    public function show_products_data() {
    	$products = DB::table("products")
							->select("category_name",
								DB::raw("(CASE WHEN month(created_at)='1' THEN 'January' WHEN month(created_at)='2' THEN 'February' WHEN month(created_at)='3' THEN 'March' WHEN month(created_at)='4' THEN 'April' WHEN month(created_at)='5' THEN 'May' WHEN month(created_at)='6' THEN 'June' WHEN month(created_at)='7' THEN 'July' WHEN month(created_at)='8' THEN 'August' WHEN month(created_at)='9' THEN 'September' WHEN month(created_at)='10' THEN 'October' WHEN month(created_at)='11' THEN 'November' WHEN month(created_at)='12' THEN 'December' END) as month"),
								DB::raw("year(created_at) as year"),
								DB::raw("sum(price) as price"))
							->groupBy(DB::raw("category_name"))
							->groupBy(DB::raw("month(created_at)"))
							->groupBy(DB::raw("year(created_at)"))
							->paginate(1);
    	return view("product_data")->withProducts($products);

    }
}
