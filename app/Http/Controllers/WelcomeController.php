<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Episode;
use App\Models\Link;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{

    public function index()
    {
        $tv = Link::where('type', 'LiveTv')->first();
        $index = Link::where('type', 'Index')->first();
        $partner = Link::where('type', 'FTP-Partner')->first();

        return view('frontEnd.home.home', [
            'tv' => $tv,
            'index' => $index,
            'partner' => $partner
        ]);
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

                <li  class="list-group-item shadow" style=" background:#fecaca; opacity:0.95; ">
                   <a href="' . url('movie-episode/' . $product['id'] . '/' . $product['type']) . '" >
                      <img src="' . url($product['image']) . '" style="height: 200px; width: 100%;" class="rounded">
                      <p style="font-size:20px; letter-spacing:1.2px; font-weight:bold;"> ' . $product['text'] . '</p>
                   </a>

                </li>

                 ';
        }
        echo  $output;
    }

    public function movieEpisode($id, $type)
    {

        if ($type === 'tv') {
            return redirect()->route('/subCatTvSeason', ['id' => $id]);
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
        dd($relatedProduct);

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
            ->where('products.SubCategoryId', '=', $id)->paginate(54);
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
        $TvSeroesCategory = DB::table('sub_categories')
            ->where('sub_categories.id', '=', $id)
            ->select('sub_categories.subCategoryTitle')->first();

        $children = DB::table('tv_series')
            ->select('tv_series.*')
            ->where('tv_series.SubCategoryId', '=', $id)->orderBy('created_at', 'desc')->paginate(50);

        //dd($children);
        //dd($children2);
        return view('frontEnd.home.TvSeriesCollection', ['children' => $children, 'TvSeroesCategory' => $TvSeroesCategory]);
    }

    public function subCatTvSeason($id)
    {

        $poster = DB::table('tv_series')
            ->select('tv_series.tvSeriesFile')
            ->where('tv_series.id', '=', $id)
            //->where('products.categoryId', 1)
            ->first();

        //dd($poster);

        $title = DB::table('tv_series')
            ->select('tv_series.tvSeriesTitle')
            ->where('tv_series.id', '=', $id)
            //->where('products.categoryId', 1)
            ->first();

        $sesons = DB::table('seasons')
            ->select('seasons.*')
            ->where('seasons.tvSeriesId', '=', $id)
            ->get();

        $episodes = DB::table('episodes')
            ->select('episodes.*')
            ->where('episodes.tvSeriesId', '=', $id)
            ->get();
        //dd($episodes);

        return view('frontEnd.home.SeasonCollection', ['poster' => $poster, 'sesons' => $sesons, 'episodes' => $episodes, 'title' => $title]);
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

    /* subcategory products views*/
    public function subCatProductViewsUniversal($id)
    {
        $children = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
            ->select('products.*', 'categories.categoryTitle', 'sub_categories.subCategoryTitle')
            ->where('products.SubCategoryId', '=', $id)
            ->get();
        //dd($children);
        return view('FrontEnd.home.SubcategoryProducts', ['children' => $children]);
    }
}
