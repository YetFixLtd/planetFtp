<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use App\Models\TvSeries;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TvSeriesController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:tvSeries-list|tvSeries-create|tvSeries-edit|tvSeries-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:tvSeries-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:tvSeries-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:tvSeries-delete', ['only' => ['destroy']]);
    // }



    public function index()
    {
        //        $products = Category::latest()->paginate(500);
        //        return view('admin.category.index',compact('products'))
        //          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        $subCategories = SubCategory::where('publicationStatus', 1)->where('type', 'tv_series')->get();
        return view('admin.tvSeries.createTvseries', ['categories' => $categories, 'subCategories' => $subCategories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'SubCategoryId' => 'required',
            'tvSeriesTitle' => 'required',
            'tvSeriesFile' => '',
            'publicationStatus' => 'required',
            // 'tv_series_id' => 'numeric'
        ]);


        if ($request->hasFile('tvSeriesFile')) {
            $tvSeries = new TvSeries();
            $tvSeries->SubCategoryId = $request->SubCategoryId;
            $tvSeries->tvSeriesTitle = ucfirst($request->tvSeriesTitle);

            $tvSeriesFile = $request->file('tvSeriesFile');
            $fileName = $tvSeriesFile->getClientOriginalName();
            $uploadPath = 'tvSeriesFile/';
            $tvSeriesFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;

            $tvSeries->tvSeriesFile =  $fileUrl;
            $tvSeries->publicationStatus = $request->publicationStatus;

            $tvSeries->save();
        } else {
            $tvSeries = new TvSeries();
            $tvSeries->SubCategoryId = $request->SubCategoryId;
            $tvSeries->tvSeriesTitle = ucfirst($request->tvSeriesTitle);
            $tvSeries->tv_series_api_id = $request->tv_series_id;
            $tvSeries->tvSeriesFile =  $request->imageUrl;
            $tvSeries->publicationStatus = $request->publicationStatus;
            $tvSeries->save();
        }

        return redirect()->route('/tvSeriesAdd')->with('message', 'TV Series info saved successfully');
    }

    public function show()
    {
        $tvSeriess = DB::table('tv_series')
            ->join('sub_categories', 'tv_series.SubCategoryId', '=', 'sub_categories.id')
            ->select('tv_series.*', 'sub_categories.subCategoryTitle')
            ->get();
        return view('admin.tvSeries.manageTvseries', ['tvSeriess' => $tvSeriess]);
        //        return view('admin.category.table');
    }

    public function edit($id)
    {
        $tvSeries = TvSeries::find($id);
        $subCategories = SubCategory::where('publicationStatus', 1)->get();
        return view('admin.tvSeries.editTvseries', [
            'tvSeries' => $tvSeries,
            'subCategories' => $subCategories,
        ]);
    }

    //    public function unPublishedCategoryInfo($id, $a){
    //        return $a;
    //    }

    public function unPublishedTvSeriesInfo($id)
    {
        $tvSeries = TvSeries::find($id);
        //return $category;
        $tvSeries->publicationStatus = 0;
        $tvSeries->save();
        return redirect()->route('/tvSeriesManage')->with('message', 'tvSeries info unPublished successfully');
        // return $id;
    }
    public function publishedTvSeriesInfo($id)
    {
        $tvSeries = TvSeries::find($id);
        $tvSeries->publicationStatus = 1;
        $tvSeries->save();
        return redirect()->route('/tvSeriesManage')->with('message', 'tvSeries info Published successfully');
    }

    protected function saveTvSeriesBasicInfo($request, $fileUrl)
    {
        $tvSeries = TvSeries::find($request->id);
        $tvSeries->SubCategoryId = $request->SubCategoryId;
        $tvSeries->tvSeriesTitle = ucfirst($request->tvSeriesTitle);

        $tvSeries->tvSeriesFile = $fileUrl;

        $tvSeries->publicationStatus = $request->publicationStatus;
        $tvSeries->save();
    }
    public function update(Request $request)
    {
        // dd( $request->all() );
        $fileUrl = $this->fileExistStatus($request);
        $this->saveTvSeriesBasicInfo($request, $fileUrl);
        return redirect()->route('/tvSeriesManage')->with('message', 'tvSeries info updated successfully');
    }

    protected function fileExistStatus($request)
    {
        $tvSeries = TvSeries::where('id', $request->id)->first();
        $tvSeriesFile = $request->file('tvSeriesFile');
        if ($tvSeriesFile) {
            unlink($tvSeries->tvSeriesFile);
            $fileName = $tvSeriesFile->getClientOriginalName();
            $uploadPath = 'tvSeriesFile/';
            $tvSeriesFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
        } else {
            $fileUrl = $tvSeries->tvSeriesFile;
        }
        return $fileUrl;
    }

    public function destroy($id)
    {
        $tvSeries = TvSeries::find($id);
        $tvSeries->delete();
        return redirect()->route('/tvSeriesManage')->with('message', 'tvSeries info deleted successfully');
    }
}
