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

    public function recentMovie()
    {
        $movies = Product::orderBy('id', 'desc')->where('publicationStatus', 1)->get();

        return response()->json([
            "message" => "success",
            "status" => 200,
            'movies' => $movies,
        ]);
    }
}
