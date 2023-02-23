<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function create()
    {
        return view('admin.slider.create-slider');
    }

    protected function productBasicInfoValidate($request)
    {
        $this->validate($request, [
            'productFile' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->productBasicInfoValidate($request);
        $productFile = $request->file('productFile');
        $fileName = $productFile->getClientOriginalName();
        $uploadPath = 'sliderFile/';
        $productFile->move($uploadPath, $fileName);
        $fileUrl = $uploadPath . $fileName;
        $this->saveProductInfo($request, $fileUrl);
        return redirect()->route('/sliderAdd')->with('message', 'Product info saved successfully');
    }

    protected function saveProductInfo($request, $fileUrl)
    {
        $product = new Slider();
        $product->productFile = $fileUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function show()
    {
        $products = DB::table('sliders')
            ->select('sliders.*')
            ->get();
        return view('admin.slider.manage-slider', ['products' => $products,]);
    }

    public function edit($id)
    {
       
        $product = Slider::find($id);
       // dd($product->all());
        return view('admin.slider.edit-slider', [
            'product' => $product,
        ]);

       
    }

    protected function saveProductBasicInfo($request, $fileUrl)
    {
        $product = Slider::find($request->id);
        $product->productFile = $fileUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function update(Request $request)
    {

       // dd( $request->all());
        $product = Slider::find($request->id);

        $productFile = $request->file('productFile');
        if ($productFile) {
            unlink($product->productFile);
            $fileName = $productFile->getClientOriginalName();
            $uploadPath = 'sliderFile/';
            $productFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
            $product->productFile= $fileUrl;
        }
        
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
        return redirect()->route('/sliderManage')->with('message', 'Product info updated successfully');
    }

    protected function fileExistStatus($request)
    {
        $productById = Slider::where('id', $request->id)->first();
        $productFile = $request->file('productFile');
        if ($productFile) {
            unlink($productById->productFile);
            $fileName = $productFile->getClientOriginalName();
            $uploadPath = 'sliderFile/';
            $productFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
        }
        return $fileUrl;
    }

    public function destroy($id)
    {
        $product = Slider::find($id);
        $product->delete();
        return redirect()->route('/sliderManage')->with('message', 'Producted info deleted successfully');
    }
}

