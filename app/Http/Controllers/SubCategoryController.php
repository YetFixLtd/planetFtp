<?php

namespace App\Http\Controllers;

use App\Models\Category;


use App\Models\SubCategory;
use App\Models\TvSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:subCategoty-list|subCategoty-create|subCategoty-edit|subCategoty-delete', ['only' => ['index','show']]);
        $this->middleware('permission:subCategoty-create', ['only' => ['create','store']]);
        $this->middleware('permission:subCategoty-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subCategoty-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

    }

    public function create()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        return view('admin.subCategory.create-subCategory', ['categories' => $categories]);
    }

    protected function BasicInfoValidate($request)
    {

        $this->validate($request, [
            'categoryId' => 'required',
            'subCategoryTitle' => 'required',
            'publicationStatus' => 'required'
        ]);
    }

    public function store(Request $request)
    {
        $this->BasicInfoValidate($request);
        $this->saveInfo($request);
        return redirect()->route('/subCatAdd')->with('message', 'Sub Category info saved successfully');
    }

    protected function saveInfo(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->categoryId = $request->categoryId;
        $subCategory->type = $request->type ??'';
        $subCategory->subCategoryTitle = $request->subCategoryTitle;
        $subCategory->publicationStatus = $request->publicationStatus;
        $subCategory->save();
    }

    public function unPublishedSubCategoryInfo($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->publicationStatus = 0;
        $subCategory->save();
        return redirect()->route('/subCatManage')->with('message', 'Sub Category info unPublished successfully');
    }
    public function publishedSubCategoryInfo($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->publicationStatus = 1;
        $subCategory->save();
        return redirect()->route('/subCatManage')->with('message', 'Sub Category info Published successfully');
    }

    public function show()
    {
        $subCategories = DB::table('sub_categories')
            ->join('categories', 'sub_categories.categoryId', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.categoryTitle')
            ->get(); 
        return view('admin.subCategory.manage-subCategory', ['subCategories' => $subCategories]);
       
    }

    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::where('publicationStatus', 1)->get();
        return view('admin.subCategory.edit-subCategory', [
            'subCategory' => $subCategory,
            'categories' => $categories
        ]);
    }


    public function update(Request $request)
    {
        $subCategory = SubCategory::find($request->id);
        // $subCategory = new SubCategory();
        $subCategory->categoryId = $request->categoryId;
        $subCategory->subCategoryTitle = $request->subCategoryTitle;
        $subCategory->publicationStatus = $request->publicationStatus;
        $subCategory->save();
        // $this->saveInfo($request);
        return redirect()->route('/subCatManage')->with('message', 'Sub Category info updated successfully');
    }


    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('/subCatManage')->with('message', 'Sub Category info deleted successfully');
    }
}
