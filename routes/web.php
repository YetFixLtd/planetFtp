<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;

Route::get('/', 'WelcomeController@index');
Route::get('/subCatmovie/{id}', [
    'uses' => 'WelcomeController@subCatProductView',
    'as' => '/subCatProductRoute'
]);
Route::get('/sub-category-year/{sub_cat_id}/{year}', [
    'uses' => 'WelcomeController@subCategoryYear',
    'as' => '/subCategoryYear'
]);

Route::get('/subCatOthers/{id}', [
    'uses' => 'WelcomeController@subCatOthersView',
    'as' => '/subCatOthersRoute'
]);
Route::get('/subCatTv/{id}', [
    'uses' => 'WelcomeController@subCatTvView',
    'as' => '/subCatTvSeries'
]);

Route::get('/subCatTvSeason/{id}', [
    'uses' => 'WelcomeController@subCatTvSeason',
    'as' => '/subCatTvSeason'
]);
Route::get('/subCatTvEpisode/{id}', [
    'uses' => 'WelcomeController@subCatTvEpisode',
    'as' => '/subCatTvEpisode'
]);
Route::get('/episode/{id}', [
    'uses' => 'WelcomeController@episode_details',
    'as' => 'episode'
]);
Route::get('/movie/{id}', [
    'uses' => 'WelcomeController@product_details',
    'as' => 'movie'
]);

/* Sub Category Info api*/
Route::get('/fetch-tv-series-by-sub-category-id/{sub_category_id}', 'ApiController@fetchTvSeries');
Route::get('/fetch-season-by-tv-series-id/{tv_series_id}', 'ApiController@fetchSeason');

Route::get('/fetch-sub-category-by-category-id/{category_id}', 'ApiController@fetchSubCategory');
//Route::get('/fetch-movies-by-subcategory-id/{movies_id}', 'ApiController@fetchSeason');

Route::get('/movie-episode/{id}/{type}', 'WelcomeController@movieEpisode');
Route::get('/others/{id}', 'WelcomeController@others_details');
Route::get('/search-results', 'WelcomeController@searchResult');


// Route::get('/product-details/{id}', 'WelcomeController@product_details');

// Route::post('/message', [
//     'uses' => 'ContactController@storeMessage',
//     'as'=>'/insert-message'

// ]);

// Route::get('/all-movie', 'WelcomeController@menu1');

// Route::get('/tvSeries', 'WelcomeController@menu3');
// Route::get('/games', 'WelcomeController@menu4');
// Route::get('/software', 'WelcomeController@menu5');
// Route::get('/tutorials', 'WelcomeController@menu2');

//Route::get('/subCatProduct/{id}', 'WelcomeController@subCatProductView');
//php artisan db:seed --class=CreateAdminUserSeeder
//php artisan db:seed --class=PermissionTableSeeder
// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');

// Route::get('/subCatProduct/{id}', [
//     'uses' => 'WelcomeController@subCatProductView',
//     'as' => '/subCatProductRoute'
// ]);

Route::get('/dashboard', 'DashboardController@index')->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {
    /*Role Info*/
    Route::get('/role-items2', [
        'uses' => 'RoleController@index',
        'as' => '/roleManage'
    ]);
    Route::get('/role-items', [
        'uses' => 'RoleController@create',
        'as' => '/roleAdd'
    ]);
    Route::post('/role-insert', [
        'uses' => 'RoleController@store',
        'as' => '/roleSave'
    ]);
    Route::get('/role-items2/{id}', [
        'uses' => 'RoleController@show',
        'as' => '/roleShow'
    ]);
    Route::get('/role-items4/{id}', [
        'uses' => 'RoleController@edit',
        'as' => '/roleEdit'
    ]);
    Route::post('/role-items5/{id}', [
        'uses' => 'RoleController@update',
        'as' => '/roleUpdate'
    ]);
    Route::get('/role-items6/{id}', [
        'uses' => 'RoleController@destroy',
        'as' => '/roleDelete'
    ]);
    /* User Info*/
    Route::get('/user-items2', [
        'uses' => 'UserController@index',
        'as' => '/userManage'
    ]);
    Route::get('/user-items', [
        'uses' => 'UserController@create',
        'as' => '/userAdd'
    ]);
    Route::post('/user-insert', [
        'uses' => 'UserController@store',
        'as' => '/userSave'
    ]);
    Route::get('/user-items2/{id}', [
        'uses' => 'UserController@show',
        'as' => '/userShow'
    ]);
    Route::get('/user-items4/{id}', [
        'uses' => 'UserController@edit',
        'as' => '/userEdit'
    ]);
    Route::post('/user-items5/{id}', [
        'uses' => 'UserController@update',
        'as' => '/userUpdate'
    ]);
    Route::get('/user-items6/{id}', [
        'uses' => 'UserController@destroy',
        'as' => '/userDelete'
    ]);

    /* Category Info */
    Route::get('/catagory-items', [
        'uses' => 'CategoryController@create',
        'as' => '/catAdd'
    ]);
    Route::post('/catagory-insert', [
        'uses' => 'CategoryController@store',
        'as' => '/catSave'
    ]);
    Route::get('/catagory-items2', [
        'uses' => 'CategoryController@show',
        'as' => '/catManage'
    ]);
    Route::get('/catagory-items4/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => '/catEdit'
    ]);
    Route::get('/catagory/unPublished/{id}', [
        'uses' => 'CategoryController@unPublishedCategoryInfo',
        'as' => '/unpublished-category'
    ]);
    Route::get('/catagory/published/{id}', [
        'uses' => 'CategoryController@publishedCategoryInfo',
        'as' => '/published-category'
    ]);
    Route::post('/catagory-items5', [
        'uses' => 'CategoryController@update',
        'as' => '/catUpdate'
    ]);
    Route::get('/catagory-items6/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => '/catDelete'
    ]);


    /* Sub Category Info */
    Route::get('/sub-catagory-add', [
        'uses' => 'SubCategoryController@create',
        'as' => '/subCatAdd'
    ]);
    Route::post('/sub-catagory-insert', [
        'uses' => 'SubCategoryController@store',
        'as' => '/subCatSave'
    ]);
    Route::get('/sub-catagories', [
        'uses' => 'SubCategoryController@show',
        'as' => '/subCatManage'
    ]);
    Route::get('/subcatagory/unPublished/{id}', [
        'uses' => 'SubCategoryController@unPublishedSubCategoryInfo',
        'as' => '/unpublished-SubCategory'
    ]);
    Route::get('/subcatagory/published/{id}', [
        'uses' => 'SubCategoryController@publishedSubCategoryInfo',
        'as' => '/published-SubCategory'
    ]);
    Route::get('/subcatagory-edit/{id}', [
        'uses' => 'SubCategoryController@edit',
        'as' => '/subCatEdit'
    ]);
    Route::post('/subcatagory-update', [
        'uses' => 'SubCategoryController@update',
        'as' => '/SubCatUpdate'
    ]);
    Route::get('/subCatagory-delete/{id}', [
        'uses' => 'SubCategoryController@destroy',
        'as' => '/SubCatDelete'
    ]);

    /*  Product Info*/
    Route::get('/product-items', [
        'uses' => 'ProductController@create',
        'as' => '/productAdd'
    ]);
    Route::post('/product-insert', [
        'uses' => 'ProductController@store',
        'as' => '/productSave'
    ]);
    Route::get('/product-items2', [
        'uses' => 'ProductController@show',
        'as' => '/productManage'
    ]);
    Route::get('/product-items4/{id}', [
        'uses' => 'ProductController@edit',
        'as' => '/productEdit'
    ]);
    Route::get('/product/unPublished/{id}', [
        'uses' => 'ProductController@unpublishedProductInfo',
        'as' => '/unpublished-product'
    ]);
    Route::get('/product/published/{id}', [
        'uses' => 'ProductController@publishedProductInfo',
        'as' => '/published-product'
    ]);
    Route::post('/product-items5', [
        'uses' => 'ProductController@update',
        'as' => '/productUpdate'
    ]);
    Route::get('/product-items6/{id}', [
        'uses' => 'ProductController@destroy',
        'as' => '/productDelete'
    ]);

    /*  Tv Series Info*/
    Route::get('/tvSeries-items', [
        'uses' => 'TvSeriesController@create',
        'as' => '/tvSeriesAdd'
    ]);
    Route::post('/tvSeries-insert', [
        'uses' => 'TvSeriesController@store',
        'as' => '/tvSeriesSave'
    ]);
    Route::get('/tvSeries-items2', [
        'uses' => 'TvSeriesController@show',
        'as' => '/tvSeriesManage'
    ]);
    Route::get('/tvSeries-items4/{id}', [
        'uses' => 'TvSeriesController@edit',
        'as' => '/tvSeriesEdit'
    ]);
    Route::get('/tvSeries/unPublished/{id}', [
        'uses' => 'TvSeriesController@unpublishedTvSeriesInfo',
        'as' => '/unpublished-tvSeries'
    ]);
    Route::get('/tvSeries/published/{id}', [
        'uses' => 'TvSeriesController@publishedTvSeriesInfo',
        'as' => '/published-tvSeries'
    ]);
    Route::post('/tvSeries-items5', [
        'uses' => 'TvSeriesController@update',
        'as' => '/tvSeriesUpdate'
    ]);
    Route::get('/tvSeries-items6/{id}', [
        'uses' => 'TvSeriesController@destroy',
        'as' => '/tvSeriesDelete'
    ]);

    /*  Season Info*/
    Route::get('/season-items', [
        'uses' => 'SeasonController@create',
        'as' => '/seasonAdd'
    ]);
    Route::post('/season-insert', [
        'uses' => 'SeasonController@store',
        'as' => '/seasonSave'
    ]);
    Route::get('/season-items2', [
        'uses' => 'SeasonController@show',
        'as' => '/seasonManage'
    ]);
    Route::get('/season-items4/{id}', [
        'uses' => 'SeasonController@edit',
        'as' => '/seasonEdit'
    ]);
    Route::get('/season/unPublished/{id}', [
        'uses' => 'SeasonController@unpublishedseasonInfo',
        'as' => '/unpublished-season'
    ]);
    Route::get('/season/published/{id}', [
        'uses' => 'SeasonController@publishedseasonInfo',
        'as' => '/published-season'
    ]);
    Route::post('/season-items5', [
        'uses' => 'SeasonController@update',
        'as' => '/seasonUpdate'
    ]);
    Route::get('/season-items6/{id}', [
        'uses' => 'SeasonController@destroy',
        'as' => '/seasonDelete'
    ]);


    /*  Episode Info*/
    Route::get('/episode-items', [
        'uses' => 'EpisodeController@create',
        'as' => '/episodeAdd'
    ]);
    Route::post('/episode-insert', [
        'uses' => 'EpisodeController@store',
        'as' => '/episodeSave'
    ]);
    Route::get('/episode-items2', [
        'uses' => 'EpisodeController@show',
        'as' => '/episodeManage'
    ]);
    Route::get('/episode-items4/{id}', [
        'uses' => 'EpisodeController@edit',
        'as' => '/episodeEdit'
    ]);
    Route::get('/episode/unPublished/{id}', [
        'uses' => 'EpisodeController@unpublishedepisodeInfo',
        'as' => '/unpublished-episode'
    ]);
    Route::get('/episode/published/{id}', [
        'uses' => 'EpisodeController@publishedepisodeInfo',
        'as' => '/published-episode'
    ]);
    Route::post('/episode-items5', [
        'uses' => 'EpisodeController@update',
        'as' => '/episodeUpdate'
    ]);
    Route::get('/episode-items6/{id}', [
        'uses' => 'EpisodeController@destroy',
        'as' => '/episodeDelete'
    ]);

    // Slider

    Route::get('/slider-item', [
        'uses' => 'SliderController@create',
        'as' => '/sliderAdd'
    ]);
    Route::post('/slider-insert', [
        'uses' => 'SliderController@store',
        'as' => '/sliderSave'
    ]);
    Route::get('/slider-items2', [
        'uses' => 'SliderController@show',
        'as' => '/sliderManage'
    ]);
    Route::get('/slider-items4/{id}', [
        'uses' => 'SliderController@edit',
        'as' => '/sliderEdit'
    ]);
    Route::post('/slider-items5', [
        'uses' => 'SliderController@update',
        'as' => '/sliderUpdate'
    ]);
    Route::get('/slider-items6/{id}', [
        'uses' => 'SliderController@destroy',
        'as' => '/sliderDelete'
    ]);
});

Route::get('contact', [ContactController::class, 'index']);
Route::post('send', [ContactController::class, 'send'])->name('email.send');



Route::get('/others-details/{id}', function ($id) {
    $productsData = DB::table('products')->where('products.SubCategoryId', $id)->get();
    //dd($productsData);
    return view('frontEnd.home.SubCategoryProducts', ['productsData' => $productsData]);
});
