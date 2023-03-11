<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Season;
use App\Models\Episode;
use App\Models\TvSeries;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }

    public function create()
    {
        $subCategories = SubCategory::where('publicationStatus', 1)->where('type', 'tv_series')->get();
        $tvSeries = TvSeries::where('publicationStatus', 1)->get();
        $season = Season::where('publicationStatus', 1)->get();
        return view('admin.episode.createEpisode', ['tvSeries' => $tvSeries, 'season' => $season, 'subCategories' => $subCategories]);
    }

    protected function seasonBasicInfoValidate($request)
    {
        $this->validate($request, [
            'SubCategoryId' => 'required',
            'tvSeriesId' => 'required',
            'seasonId' => 'required',
            'episodeTitle' => 'required',
            'episodeDescription' => 'required',
            'episodeFile' => '',
            'episodeUrl' => 'required',
            'rating' => 'required',
            'year' => 'required',
            'publicationStatus' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->seasonBasicInfoValidate($request);
        if ($request->hasFile('episodeFile')) {
            $episodeFile = $request->file('episodeFile');
            $fileName = $episodeFile->getClientOriginalName();
            $uploadPath = 'episodeFile/';
            $episodeFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
            $this->saveEpisodeInfo($request, $fileUrl);
        } else {
            //dd($request->all());
            $fileUrl = $request->episodeFile;
            $this->saveEpisodeInfo($request, $fileUrl);
        }

        return redirect()->route('/episodeAdd')->with('message', 'Episode info saved successfully');
    }

    protected function saveEpisodeInfo($request, $fileUrl)
    {
        $episode = new Episode();
        $episode->SubCategoryId = $request->SubCategoryId;
        $episode->tvSeriesId = $request->tvSeriesId;
        $episode->seasonId = $request->seasonId;
        $episode->episodeTitle = $request->episodeTitle;
        $episode->episodeDescription = $request->episodeDescription;
        $episode->episodeFile = $fileUrl;
        $episode->episodeUrl = $request->episodeUrl;
        $episode->rating = $request->rating;
        $episode->year = $request->year;
        $episode->publicationStatus = $request->publicationStatus;
        // dd($request->all());
        $episode->save();
    }

    public function show()
    {
        $episodes = DB::table('episodes')
            ->join('tv_series', 'episodes.tvSeriesId', '=', 'tv_series.id')
            ->join('seasons', 'episodes.seasonId', '=', 'seasons.id')
            ->select('episodes.*', 'tv_series.tvSeriesTitle', 'seasons.seasonTitle')
            ->get();
        return view('admin.episode.manageEpisode', ['episodes' => $episodes,]);
    }

    public function unpublishedepisodeInfo($id)
    {
        $episode = Episode::find($id);
        $episode->publicationStatus = 0;
        $episode->save();
        return redirect()->back()->with('message', 'episode unpublished successfully');
    }

    public function publishedepisodeInfo($id)
    {
        $episode = Episode::find($id);
        $episode->publicationStatus = 1;
        $episode->save();
        return redirect()->back()->with('message', 'episode published successfully');
    }

    public function edit($id)
    {
        $episode = Episode::find($id);
        $tvSeries = TvSeries::where('publicationStatus', 1)->get();
        $season = Season::where('publicationStatus', 1)->get();
        return view('admin.episode.editEpisode', [
            'episode' => $episode,
            'tvSeries' => $tvSeries,
            'season' => $season,
        ]);
    }

    protected function saveepisodeBasicInfo($request, $fileUrl)
    {
        $episode = Episode::find($request->id);
        $episode->tvSeriesId = $request->tvSeriesId;
        $episode->seasonId = $request->seasonId;
        $episode->episodeTitle = $request->episodeTitle;
        $episode->episodeDescription = $request->episodeDescription;
        $episode->episodeFile = $fileUrl;
        $episode->episodeUrl = $request->episodeUrl;
        $episode->rating = $request->rating;
        $episode->year = $request->year;
        $episode->publicationStatus = $request->publicationStatus;
        $episode->save();
    }

    public function update(Request $request)
    {
        $fileUrl = $this->fileExistStatus($request);
        $this->saveepisodeBasicInfo($request, $fileUrl);
        return redirect()->route('/episodeManage')->with('message', 'episode info updated successfully');
    }

    protected function fileExistStatus($request)
    {
        $episode = Episode::where('id', $request->id)->first();
        $episodeFile = $request->file('episodeFile');
        if ($episodeFile) {
            // unlink($episode->episodeFile);
            $fileName = $episodeFile->getClientOriginalName();
            $uploadPath = 'episodeFile/';
            $episodeFile->move($uploadPath, $fileName);
            $fileUrl = $uploadPath . $fileName;
        } else {
            $fileUrl = $episode->episodeFile;
        }
        return $fileUrl;
    }

    public function destroy($id)
    {
        $episode = Episode::find($id);
        $episode->delete();
        return redirect()->route('/episodeManage')->with('message', 'episode info deleted successfully');
    }
}
