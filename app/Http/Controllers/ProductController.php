<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function create()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        $subCategories = SubCategory::where('publicationStatus', 1)->get();
        return view('admin.product.create-product', ['categories' => $categories, 'subCategories' => $subCategories]);
    }

    protected function productBasicInfoValidate($request)
    {
        $this->validate($request, [
            'categoryId' => 'required',
            'SubCategoryId' => 'required',
            'productTitle' => 'required',
            'productDescription' => 'required',
            'productFile' => '',
            'productUrl' => 'required',
            'rating' => 'required',
            'year' => 'required',
            'publicationStatus' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->productBasicInfoValidate($request);


        if ($request->hasFile('productFile')) {
            $productFile = $request->file('productFile');
            $fileName = $productFile->getClientOriginalName();
            $uploadPath = 'productFile/';
            $productFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
            $this->saveProductInfo($request, $fileUrl);
            return redirect()->route('/productAdd')->with('message', 'Item info saved successfully');
        } else {
            $fileUrl = $request->imageUrl;
            $this->saveProductInfo($request, $fileUrl);
            return redirect()->route('/productAdd')->with('message', 'Item info saved successfully');
        }
    }

    protected function saveProductInfo($request, $fileUrl)
    {
        $product = new Product();
        $product->categoryId = $request->categoryId;
        $product->SubCategoryId = $request->SubCategoryId;
        $product->productTitle = ucfirst($request->productTitle);
        $product->productDescription = $request->productDescription;
        $product->productFile = $fileUrl;
        $product->productUrl = $request->productUrl;
        $product->rating = $request->rating;
        $product->year = $request->year;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function show()
    {
        $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->orderBy('id', 'Desc')
            ->get();
        return view('admin.product.manage-product', ['products' => $products,]);
    }

    public function unpublishedProductInfo($id)
    {
        $product = Product::find($id);
        $product->publicationStatus = 0;
        $product->save();
        return redirect()->back()->with('message', 'Product unpublished successfully');
    }

    public function publishedProductInfo($id)
    {
        $product = Product::find($id);
        $product->publicationStatus = 1;
        $product->save();
        return redirect()->back()->with('message', 'Product published successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('publicationStatus', 1)->get();
        $subCategories = SubCategory::where('publicationStatus', 1)->get();
        return view('admin.product.edit-product', [
            'product' => $product,
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }

    protected function saveProductBasicInfo($request, $fileUrl)
    {
        $product = Product::find($request->id);
        $product->categoryId = $request->categoryId;
        $product->SubCategoryId = $request->SubCategoryId;
        $product->productTitle = $request->productTitle;
        $product->productDescription = $request->productDescription;
        $product->productFile = $fileUrl;
        $product->productUrl = $request->productUrl;
        $product->rating = $request->rating;
        $product->year = $request->year;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function update(Request $request)
    {
        $fileUrl = $this->fileExistStatus($request);
        $this->saveProductBasicInfo($request, $fileUrl);
        return redirect()->route('/productManage')->with('message', 'Product info updated successfully');
    }

    protected function fileExistStatus($request)
    {
        $productById = Product::where('id', $request->id)->first();
        $productFile = $request->file('productFile');
        if ($productFile) {
            // unlink($productById->productFile);
            $fileName = $productFile->getClientOriginalName();
            $uploadPath = 'productFile/';
            $productFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
        } else {
            $fileUrl = $productById->productFile;
        }
        return $fileUrl;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('/productManage')->with('message', 'Producted info deleted successfully');
    }
}
