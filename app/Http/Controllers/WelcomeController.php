<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Episode;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{

    public function index()
    {

        return view('frontEnd.home.home');
    }
    public function searchResult(Request $request)
    {
        $text = $request->input('text');
        // $products = DB::table('products')
        // ->fullJoin()
        //     ->Where('productTitle', 'like', '%' . $text . '%')

        $movies = DB::table('products')
            ->Where('productTitle', 'like', '%' . $text . '%')
            ->get();

        //  dd($movies);

        $list = array();
        $i = 1;
        foreach ($movies as $m) {
            $list[$i]['type'] = 'movies';
            $list[$i]['id'] = $m->id;
            // $list[$i]['id'] = $m->id;
            $list[$i]['text'] = $m->productTitle;
            $list[$i]['image'] = $m->productFile;
            $i++;
        }
        $tv  = DB::table('tv_series')
            ->Where('tvSeriesTitle', 'like', '%' . $text . '%')
            ->get();
        $lists = array();
        $i = 1;
        foreach ($tv as $m) {
            $lists[$i]['type'] = 'tv';
            $lists[$i]['id'] = $m->id;
            $lists[$i]['text'] = $m->tvSeriesTitle;
            $lists[$i]['image'] = $m->tvSeriesFile;
            $i++;
        }
        $products = array_merge($list, $lists);

        //dd($products);
        // return the results

        // $output = '';
        // foreach ($products as  $product) {
        //     $output .= '
        //          <ul>
        //          <li style="padding:10px">
        //          <a href="' . url('movie/' . $product->id) . '">' . $product->productTitle . '</a>
        //          </li>
        //          </ul>
        //          ';
        // }
        // echo  $output;
        // <img src="' . url($product['image']) . '" style="height: 116px; width: 113px;">
        // <a href="' . url('movie-episode/' . $product['id'] . '/' . $product['type']) . '"> ' . $product['text'] . '</a>
        //  dd($products);
        $output = '';
        foreach ($products as  $product) {

            $output .= '
                 <ul>
                 <a href="' . url('movie-episode/' . $product['id'] . '/' . $product['type']) . '">
                  <img src="' . url($product['image']) . '" style="height: 116px; width: 113px;">
                  ' . $product['text'] . '</a>
                 </ul>
                 ';
        }
        echo  $output;
    }

    public function movieEpisode($id, $type)
    {

        if ($type === 'tv') {
            return redirect()->route('episode', ['id' => $id]);
        } else if ($type === 'movies') {
            return redirect()->route('movie', ['id' => $id]);
        }
    }
    public function product_details($id)
    {
        //   $productById = Product::where('id', $id)->first();
        // $productById = Product::where('id', $id)->get();

        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.id', '=', $id)
            //->where('products.categoryId', 1)
            ->first();


        $relatedProduct = Product::where('SubCategoryId', $children->SubCategoryId)->limit(10)->get();
        //dd($relatedProduct);
        // dd($children);
        return view('frontEnd.home.movieDetails', compact('children', 'relatedProduct'));
    }
    public function episode_details($id)
    {

        // $productById = Product::where('id', $id)->get();

        $episode = DB::table('episodes')
            ->join('sub_categories', 'episodes.SubCategoryId', '=', 'sub_categories.id')
            ->select('episodes.*', 'sub_categories.subCategoryTitle')
            ->where('episodes.id', '=', $id)
            ->first();
        //  dd($episode);

        $relatedEpisode = Episode::where('seasonId', $episode->seasonId)->limit(10)->get();


        return view('front.episodeDetails', compact('episode', 'relatedEpisode'));
    }


    public function others_details($id)
    {
        //   $productById = Product::where('id', $id)->first();
        // $productById = Product::where('id', $id)->get();

        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.id', '=', $id)
            //->where('products.categoryId', 1)
            ->first();


        $relatedProduct = Product::where('SubCategoryId', $children->SubCategoryId)->limit(10)->get();
        // dd($relatedProduct);

        return view('front.includes.otherDetails', compact('children', 'relatedProduct'));
    }



    public function subCatOthersView($id)
    {
        //   $productById = Product::where('id', $id)->first();
        // $productById = Product::where('id', $id)->get();


        $children2 = DB::table('sub_categories')
            ->where('sub_categories.id', '=', $id)
            ->select('sub_categories.*')
            ->get();

        // $hover = DB::table('products')
        // ->where('products.SubCategoryId', '=', $id)
        // ->select('sub_categories.*')
        // ->get();


        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.SubCategoryId', '=', $id)
            //->where('products.categoryId', 1)
            ->get();
        return view('front.includes.others', ['children' => $children, 'children2' => $children2]);
    }










    public function menu1()
    {
        return view('frontEnd.menudetail.menu1');
    }
    public function menu2()
    {
        return view('frontEnd.menudetail.menu2');
    }
    public function menu3()
    {
        return view('frontEnd.menudetail.menu3');
    }
    public function menu4()
    {
        return view('frontEnd.menudetail.menu4');
    }
    public function menu5()
    {
        return view('frontEnd.menudetail.menu5');
    }
    // public function menu6()
    // {
    //     return view('frontEnd.menudetail.menu6');
    // }
    // public function menu7()
    // {
    //     return view('frontEnd.menudetail.menu7');
    // }
    // public function menu8()
    // {
    //     return view('frontEnd.menudetail.menu8');
    // }
    public function subCatProductView($id)
    {

        $sub_category = DB::table('sub_categories')->where('id', $id)->first();
        $all_sub_categories = DB::table('sub_categories')->where('categoryId', $sub_category->categoryId)->get();


        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.SubCategoryId', '=', $id)->paginate(100);
        // ->get();

        return view('frontEnd.menuPage.page', compact('children', 'sub_category', 'all_sub_categories'));
    }
    public function subCategoryYear($id, $year)
    {

        $sub_category = DB::table('sub_categories')->where('id', $id)->first();
        $all_sub_categories = DB::table('sub_categories')->where('categoryId', $sub_category->categoryId)->get();


        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.SubCategoryId', '=', $id)
            ->where('products.year', '=', $year)
            ->get();

        return view('front.subcat_movies_by_year', compact('children', 'sub_category', 'all_sub_categories'));
    }

    public function subCatTvView($id)
    {
        // dd($id);
        $children2 = DB::table('sub_categories')
            ->where('sub_categories.id', '=', $id)
            ->select('sub_categories.*')
            ->get();
        $children = DB::table('tv_series')
            ->select('tv_series.*')
            ->where('tv_series.SubCategoryId', '=', $id)
            //->where('products.categoryId', 1)
            ->get();
        //dd($children);
        //dd($children2);
        return view('frontEnd.home.TvSeriesCollection', ['children' => $children, 'children2' => $children2]);
    }

    public function subCatTvSeason($id)
    {

        $poster = DB::table('tv_series')
            ->select('tv_series.tvSeriesFile')
            ->where('tv_series.id', '=', $id)
            //->where('products.categoryId', 1)
            ->get();

        $sesons = DB::table('seasons')
            ->select('seasons.*')
            ->where('seasons.tvSeriesId', '=', $id)
            ->get();

        $episodes = DB::table('episodes')
            ->select('episodes.*')
            ->where('episodes.seasonId', '=', $id)
            ->get();

        return view('frontEnd.home.SeasonCollection', ['poster' => $poster, 'sesons' => $sesons, 'episodes' => $episodes]);
    }

    public function subCatTvEpisode($id)
    {
        // dd($id);
        $children = DB::table('episodes')
            ->select('episodes.*')
            ->where('episodes.seasonId', '=', $id)
            ->get();


        return view('front.tvEpisode', ['children' => $children]);
    }
}
