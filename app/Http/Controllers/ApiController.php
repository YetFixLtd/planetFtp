<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Models\TvSeries;
use Illuminate\Http\Request;

use App\Models\SubCategory;

class ApiController extends Controller
{
    public function fetchTvSeries($id)

    {
        $subCategory = TvSeries::where('SubCategoryId', $id)->get();

        return $subCategory;
    }
    public function fetchSeason($id)

    {
        $TvSeries = Season::where('tvSeriesId', $id)->get();

        return $TvSeries;
    }




    public function fetchSubCategory($id)

    {
        $subCategory = SubCategory::where('categoryId', $id)->get();

        return $subCategory;
    }
    public function recentMoviesAndTvSeries()
    {
        $movies = Product::orderBy('id', 'desc')->where('categoryId', 1)->get();
        $tvSeries = TvSeries::orderBy('id', 'desc')->where('SubCategoryId', 10)->get();
        return response()->json([
            "message" => "success",
            "status" => 200,
            'movies' => $movies,
            'tvSeries' => $tvSeries
        ]);
    }
}
