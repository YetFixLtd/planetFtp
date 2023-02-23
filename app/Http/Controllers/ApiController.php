<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\TvSeries;
use Illuminate\Http\Request;

use App\Models\SubCategory;

class ApiController extends Controller
{
    public function fetchTvSeries($id)
   
    {
        $subCategory = TvSeries::where('SubCategoryId',$id)->get();
       
        return $subCategory;
    }
    public function fetchSeason($id)
   
    {
        $TvSeries = Season::where('tvSeriesId',$id)->get();
       
        return $TvSeries;
    }




    public function fetchSubCategory($id)
   
    {
        $subCategory =SubCategory ::where('categoryId',$id)->get();
       
        return $subCategory;
    }
   

}
