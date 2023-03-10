<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Season;
use App\Models\TvSeries;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SeasonController extends Controller
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
        $subCategories = SubCategory::where('publicationStatus', 1)->where('type', 'tv_series')->get();
        $tvSeries = TvSeries::where('publicationStatus', 1)->get();

        return view('admin.season.createSeason', compact('subCategories', 'tvSeries'));
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'SubCategoryId' => 'required',
            'tvSeriesId' => 'required',
            'seasonTitle' => 'required|unique:seasons,seasonTitle',
            'seasonFile' => '',
            'season_api_id' => 'numeric',
            'publicationStatus' => 'required',
        ]);

        $season = new Season();

        $season->tvSeriesId = $request->tvSeriesId;
        $season->seasonTitle = $request->seasonTitle;


        if ($request->hasFile('seasonFile')) {

            $seasonFile = $request->file('seasonFile');
            $fileName = $seasonFile->getClientOriginalName();
            $uploadPath = 'seasonFile/';
            $seasonFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
            $season->seasonFile =   $fileUrl;
        } else {

            $season->seasonFile = $request->imageUrl;
            $season->season_api_id = $request->season_api_id;
        }

        $season->publicationStatus = $request->publicationStatus;

        $season->save();
        return redirect()->route('/seasonAdd')->with('message', 'Season info saved successfully');
    }


    public function show()
    {
        $season = DB::table('seasons')
            ->join('tv_series', 'seasons.tvSeriesId', '=', 'tv_series.id')
            ->select('seasons.*', 'tv_series.tvSeriesTitle')
            ->get();
        return view('admin.season.manageSeason', ['season' => $season]);
        //        return view('admin.category.table');
    }

    public function edit($id)
    {
        $season = Season::find($id);
        $tvSeries = TvSeries::where('publicationStatus', 1)->get();
        return view('admin.season.editSeason', [
            'season' => $season,
            'tvSeries' => $tvSeries,
        ]);
    }

    //    public function unPublishedCategoryInfo($id, $a){
    //        return $a;
    //    }

    public function unPublishedseasonInfo($id)
    {
        $season = Season::find($id);
        //return $category;
        $season->publicationStatus = 0;
        $season->save();
        return redirect()->route('/seasonManage')->with('message', 'Season info unPublished successfully');
        // return $id;
    }
    public function publishedseasonInfo($id)
    {
        $season = Season::find($id);
        $season->publicationStatus = 1;
        $season->save();
        return redirect()->route('/seasonManage')->with('message', 'Season info Published successfully');
    }

    public function update(Request $request)
    {
        // dd( $request->all() );
        $season = Season::find($request->id);
        $season->tvSeriesId = $request->tvSeriesId;
        $season->seasonTitle = $request->seasonTitle;
        $season->publicationStatus = $request->publicationStatus;
        $season->save();
        return redirect()->route('/seasonManage')->with('message', 'season info updated successfully');
    }

    public function destroy($id)
    {
        $season = Season::find($id);
        $season->delete();
        return redirect()->route('/seasonManage')->with('message', 'season info deleted successfully');
    }
}
