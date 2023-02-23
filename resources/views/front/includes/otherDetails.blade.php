@extends('front.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<!-- main FWD player --><br>
            <div style="margin-top:77px;">
            <a href="#" class="kl-store-main-image zoom" title="The Monkey's Uncle">
								<img style="margin-bottom: 50px;width:100%; height: 500px;" src="{{asset($children->productFile)}}"
									class="attachment-shop_single wp-post-image" alt="The Monkey's Uncle"
									title="The Monkey's Uncle"
									onerror="this.src='http://image.tmdb.org/t/p/w500/nFI8dsFNhI8HugiBrq88qEidh5S.jpg" /></a>
			<!--/ main FWD player -->
            </div>
		</div>
	</div>
</div>


<div id="page_header" class="page-subheader site-subheader-cst maskcontainer--mask4">



	<div class="bgback">
	</div>


	<div class="th-sparkles"></div>
	<!--/ Animated Sparkles -->

	<!-- Background source -->
	

	<!-- Sub-Header content wrapper -->
	<div class="ph-content-wrap">
		<div class="ph-content-v-center">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<div class="poster_images">
							<a href="#" class="kl-store-main-image zoom" title="The Monkey's Uncle">
								<img style="margin-bottom: 50px;width:100%;" src="{{asset($children->productFile)}}"
									class="attachment-shop_single wp-post-image" alt="The Monkey's Uncle"
									title="The Monkey's Uncle"
									onerror="this.src='http://image.tmdb.org/t/p/w500/nFI8dsFNhI8HugiBrq88qEidh5S.jpg" /></a>
							<span class="MovieRatings" style="right:35px;">{{$children->rating}}</span>
							
						</div>
					</div>

					<div class="col-md-5">
						<!-- Sub-header titles -->
						<div class="subheader-titles" style="text-align: left;">


							<h2 class="subheader-maintitle">{{$children->productTitle}}</h2>

							<h4 class="subheader-subtitle"><span class="fourty-space"> <a
										href="allmovies67bf.html?page=1&amp;entries=24&amp;Category=Hollywood&amp;Genre=Family&amp;sort=DESC&amp;w=grid">Games</a>
									|
									<a
										href="allmovies64e2.html?page=1&amp;entries=24&amp;Category=Hollywood&amp;Genre=Comedy&amp;sort=DESC&amp;w=grid">Software</a>
									|
									<a
										href="allmovies4d5a.html?page=1&amp;entries=24&amp;Category=Hollywood&amp;Genre=Science%20Fiction&amp;sort=DESC&amp;w=grid">Others
										</a> |
								</span></h4>
						</div>
						<!--/ Sub-header titles -->

						<div style="margin-top:5px;">
							<p class="price" style="margin-left:0px;">
								<del><span class="amount"><a href="#login_panel" class="popup-with-form"
											title="Add to favourite list!"><span
												class="kl-iconbox__icon glyphicon glyphicon-heart"></span></a></span></del>

								<del><span class="amount"><a href="#login_panel" class="popup-with-form"
											title="Add to watch list!"><span
												class="kl-iconbox__icon glyphicon glyphicon-plus"></span></a></span></del>

								<del><span class="amount"><a href="#" data-toggle="tooltip" title="Coming soon!"><span
												class="kl-iconbox__icon glyphicon glyphicon-star"></span></a></span></del>

							
							</p>
						</div>

						<!-- Description -->
						<div class="portfolio-item-desc">
							<!-- Description wrapper -->
							<div class="portfolio-item-desc-inner">
								<p>{{$children->productDescription}}
								</p>
							</div>
							<!--/ Description wrapper -->

							<!-- Toggle show more button -->
							<a href="#" class="portfolio-item-more-toggle js-toggle-class"
								data-target=".portfolio-item-desc" data-target-class="is-opened"
								data-more-text="see more" data-less-text="show less" style="color: #cacaca;">
								<span class="glyphicon glyphicon-menu-down"></span>
							</a>
						</div>
						<!--/ Description -->

						<!-- AddToAny BEGIN -->
						<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
							<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
							<a class="a2a_button_facebook"></a>
							<a class="a2a_button_twitter"></a>
							<a class="a2a_button_google_plus"></a>
							<a class="a2a_button_pinterest"></a>
							<a class="a2a_button_email"></a>
						</div>
						{{-- <script async src="{{asset('assets/static.addtoany.com/menu/page.js')}}"></script> --}}
						<!-- AddToAny END -->

						<h5 id="likes"></h5>

					</div>
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-3">
						<!-- Sub-header titles -->
						{{-- <script src="{{asset('assets/ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}">
						</script>
						<script type="text/javascript" src="{{asset('assets/js/fbreaction.js')}}"></script> --}}
						<a class="btn-element btn btn-fullcolor btn-block btn-fullwidth"
							onclick="my_button('tt0059462')" href="{{$children->productUrl}}" title="Download Movie"
							style="margin:0 0 20px 0;">
							<span>DOWNLOAD</span>
						</a>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>Category</td>
									<td>{{$children->subCategoryTitle}} </td>
								</tr>
								<tr>
									<td>Rating</td>
									<td>{{$children->rating}} N/A</td>
								</tr>
								<tr>
									<td>File Size </td>
									<td> N/A </td>
								</tr>
								<tr>
									<td>File Type</td>
									<td>Games | Software | Others </td>
								</tr>
								<tr>
									<td>Uploaded Date</td>
									<td>{{$children->year}}  </td>
								</tr>
                                <tr>
									<td>Release Date</td>
									<td>{{$children->year}} N/A </td>
								</tr>
							</tbody>
						</table>
						<!--/ Sub-header titles -->
					</div>
					<!--/ Posts -->

					<!--/ col-sm-6 -->
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</div>
		<!--/ .ph-content-v-center -->
	</div>
	<!--/ Sub-Header content wrapper -->

	<!-- Bottom mask style 4 -->
	<div class="kl-bottommask kl-bottommask--mask4">
		<svg width="5000px" height="27px" class="svgmask " viewBox="0 0 5000 27" version="1.1"
			xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
				<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask4">
					<feOffset dx="0" dy="2" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
					<feGaussianBlur stdDeviation="1.5" in="shadowOffsetInner1" result="shadowBlurInner1">
					</feGaussianBlur>
					<feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1"
						result="shadowInnerInner1"></feComposite>
					<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.35 0" in="shadowInnerInner1"
						type="matrix" result="shadowMatrixInner1"></feColorMatrix>
					<feMerge>
						<feMergeNode in="SourceGraphic"></feMergeNode>
						<feMergeNode in="shadowMatrixInner1"></feMergeNode>
					</feMerge>
				</filter>
			</defs>
			<path
				d="M3.63975516e-12,-0.007 L2418,-0.007 L2434,-0.007 C2434,-0.007 2441.89,0.742 2448,2.976 C2454.11,5.21 2479,15 2479,15 L2492,21 C2492,21 2495.121,23.038 2500,23 C2505.267,23.03 2508,21 2508,21 L2521,15 C2521,15 2545.89,5.21 2552,2.976 C2558.11,0.742 2566,-0.007 2566,-0.007 L2582,-0.007 L5000,-0.007 L5000,27 L2500,27 L3.63975516e-12,27 L3.63975516e-12,-0.007 Z"
				class="bmask-bgfill" filter="url(#filter-mask4)" fill="#000000"></path>
		</svg>
	</div>
	<!--/ Bottom mask style 4 -->
</div>
<!--/ Page sub-header + Bottom mask style 4 -->

<!-- Content section -->
<section class="hg_section" style="background-color:#000000">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12">
				<div class="row">

					<!--/ col-md-12 col-sm-12 -->

		
					<!--/ col-md-6 col-sm-6 -->
				</div>
				<!--/ row -->
			</div>
			<!--/ col-md-8 col-sm-8 -->

			<!--/ col-md-4 col-sm-4 -->
		</div>
		<!--/ row -->
	</div>
	<!--/ container -->
</section>
<!--/ Content	 section -->


<section class="hg_section ptop-0 pbottom-0" style="background-color: #000000">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">

				<div class="tabbable tabs_style5">
					<!-- Navigation menu -->
					<ul class="nav fixclear">
						<!-- Tab #1 -->
						<li class="active"><a href="#tabs_i2-pane1" data-toggle="tab">Related Games</a></li>
						<!--/ Tab #1 -->
					</ul>
					<!--/ Navigation menu -->

					<!-- Tabs content -->
					<div class="tab-content">
						<!-- Tab #1 -->
						<div class="tab-pane active" id="tabs_i2-pane1">

							@foreach ($relatedProduct as $product)


							<div class="col-lg-3 col-md-4 col-sm-6 col-xs1-8 col-xs-12">
								<a href="{{url('/movie/'.$product->id)}}"
									class="thumb hoverBorder plus boxHov1"
									onmouseover="document.getElementById('{{$product->id}}').style.display = 'block';"
									onMouseOut="document.getElementById('{{$product->id}}').style.display = 'none';"
									style="margin-bottom:0px;">

									<span class="hoverBorderWrapper">

										<img src="{{asset($product->productFile)}}"
											onerror="this.src="
											class="img-responsive offer-banners-img" alt="" title=""
											style="height:auto;width:100%">

										<span
											class="theHoverBorder"></span>
									</span>

								</a>
								<div class="post-details" style="line-height:1.2em;margin-bottom:15px;">
									<p class="MovieTitle">
										<a href="{{url('/movie/'.$product->id)}}"
											title="Wrong Turn">{{$product->productTitle}}</a>
										<a href="{{url('/movie/'.$product->id)}}" title="Wrong Turn"
											style="padding: 1px 4px;font-size: 11px;margin-right: 6%;float:right;">
											<span>{{$product->year}}</span>
											<span class="MovieRatings">{{$product->rating}}</span>

									</p>
								</div>

							
							</div>
							@endforeach
							{{-- {{ $products->links() }} --}}
							<!--/ container -->
</section>



@endsection