<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:categoty-list|categoty-create|categoty-edit|categoty-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:categoty-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:categoty-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:categoty-delete', ['only' => ['destroy']]);
    }



    public function index()
    {
        //        $products = Category::latest()->paginate(500);
        //        return view('admin.category.index',compact('products'))
        //          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.category.createCategory');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryTitle' => 'required',
            'publicationStatus' => 'required'
        ]);

        $category = new Category();
        $category->categoryTitle = $request->categoryTitle;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect()->route('/catAdd')->with('message', 'Category info saved successfully');
    }

    public function show()
    {
        $categories = Category::all();
        return view('admin.category.manageCategory', ['categories' => $categories]);
        //        return view('admin.category.table');
    }

    public function edit($id)
    {
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.editCategory', ['categoryById' => $categoryById]);
    }

    //    public function unPublishedCategoryInfo($id, $a){
    //        return $a;
    //    }

    public function unPublishedCategoryInfo($id)
    {
        $category = Category::find($id);
        //return $category;
        $category->publicationStatus = 0;
        $category->save();
        return redirect()->route('/catManage')->with('message', 'Category info unPublished successfully');
        // return $id;
    }
    public function publishedCategoryInfo($id)
    {
        $category = Category::find($id);
        $category->publicationStatus = 1;
        $category->save();
        return redirect()->route('/catManage')->with('message', 'Category info Published successfully');
    }

    public function update(Request $request)
    {
        // dd( $request->all() );
        $category = Category::find($request->id);
        $category->categoryTitle = $request->categoryTitle;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect()->route('/catManage')->with('message', 'Category info updated successfully');
    }

    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();
        // return redirect()->route('/catManage')->with('message', 'Category info deleted successfully');
    }
}
