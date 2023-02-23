@extends('front.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<!-- main FWD player --><br>
			<div style="margin-top:77px;">

				<link rel="stylesheet" href="{{asset('assets/fluidplayer/fluidplayer.min.css')}}" type="text/css" />
				<script src="{{asset('assets/fluidplayer/fluidplayer.min.js')}}"></script>
				{{-- @foreach($episode as $episode) --}}
				<video id="video-id">
					<source src="{{$episode->episodeUrl}}" type='video/mp4'>
					<source src="{{$episode->episodeUrl}}" type='video/webm'>
				</video>
				{{-- @endforeach --}}
				<script>
					var myFP = fluidPlayer(
        'video-id',
        {
            layoutControls: {
		fillToContainer: true,
		primaryColor: "#00acc1",
		posterImage: '',
		autoPlay: false,
		playButtonShowing: true,
		playPauseAnimation: true,
		mute: false,
		logo: {
			imageUrl: 'logo.png',
			position: 'top left',
			clickUrl: null,
			opacity: 0.4,
			mouseOverImageUrl: null,
			imageMargin: '2px',
			hideWithControls: false,
			showOverAds: false
		},
		htmlOnPauseBlock: {
			html: null,
			height: null,
			width: null
		},
		allowDownload: true,
		allowTheatre: true,
		playbackRateEnabled: true,
		controlBar: {
			autoHide: true,
			autoHideTimeout: 3,
			animated: true
		},
            },
            vastOptions: {
               
            }
        }
    );
				</script>
			</div>
			<!--/ main FWD player -->
		</div>
	</div>
</div>


<div id="page_header" class="page-subheader site-subheader-cst maskcontainer--mask4">



	<div class="bgback">
	</div>


	<div class="th-sparkles"></div>
	<!--/ Animated Sparkles -->

	<!-- Background source -->
	<div class="kl-bg-source">
		<!-- Video container -->
		<div class="kl-video-container kl-bg-source__video">
			<!-- Video wrapper with grid overlay -->
			<div class="kl-video-wrapper video-grid-overlay">
				<!-- Self Hosted Video Source -->
				<div class="kl-video valign halign" style="width: 100%; height: 100%;" data-setup='{ 
							"position": "absolute", 
							"loop": true, 
							"autoplay": true, 
							"youtube": true, 
							"muted": true, 
							"youtube": "wTxqDOuQq9o", 
							"video_ratio": "1.7778" }'>
				</div>
				<!--/ Self Hosted Video Source -->

				<!-- Video controls bottom right positioned -->
				<ul class="kl-video--controls" data-position="bottom-right">
					<li><a href="#" class="btn-toggleplay"><i
								class="kl-icon glyphicon glyphicon-play circled-icon"></i></a></li>
					<li><a href="#" class="btn-audio"><i
								class="kl-icon glyphicon glyphicon-volume-up circled-icon ci-xsmall mute"></i></a></li>
				</ul>
				<!--/ Video controls bottom right positioned -->
			</div>
			<!--/ Video wrapper with grid overlay -->

			<!-- Color overlay -->
			<div class="kl-bg-source__overlay" style="background-color:rgba(53,53,53,0.65)">
			</div>
		</div>
		<!--/ Video container -->
	</div>
	<!--/ Background source -->

	<!-- Sub-Header content wrapper -->
	<div class="ph-content-wrap">
		<div class="ph-content-v-center">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<div class="poster_images">
							<a href="#" class="kl-store-main-image zoom" title="The Monkey's Uncle">
								<img style="margin-bottom: 50px;width:100%;" src="{{asset($episode->episodeFile)}}"
									class="attachment-shop_single wp-post-image" alt="The Monkey's Uncle"
									title="The Monkey's Uncle"
									onerror="this.src='http://image.tmdb.org/t/p/w500/nFI8dsFNhI8HugiBrq88qEidh5S.jpg" /></a>
							<span class="MovieRatings" style="right:35px;">{{$episode->rating}}</span>
							<span class="MovieQuality">1080 WEB-DL</span>
						</div>
					</div>

					<div class="col-md-5">
						<!-- Sub-header titles -->
						<div class="subheader-titles" style="text-align: left;">


							<h2 class="subheader-maintitle">{{$episode->episodeTitle}}</h2>

							<h4 class="subheader-subtitle"><span class="fourty-space"> <a
										href="">Family</a>
									|
									<a
										href="">Comedy</a>
									|
									<a
										href="">Science
										Fiction</a> |
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
								<p>{{$episode->episodeDescription}}
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
							onclick="my_button('tt0059462')" href="{{$episode->episodeUrl}}" title="Download Movie"
							style="margin:0 0 20px 0;">
							<span>DOWNLOAD</span>
						</a>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>Category</td>
									<td>{{$episode->subCategoryTitle}} </td>
								</tr>
								<tr>
									<td>Imdb Rating</td>
									<td>{{$episode->rating}} / 10</td>
								</tr>
								<tr>
									<td>Video Quality</td>
									<td>1080 WEB-DL </td>
								</tr>
								<tr>
									<td>File Type</td>
									<td>mp4 </td>
								</tr>
								<tr>
									<td>Release Date</td>
									<td>{{$episode->year}} </td>
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

					<div class="col-md-12 col-sm-12">
						<div class="tabbable tabs_style2">
							<!-- Navigation menu -->
							<ul class="nav fixclear">
								<!-- Tab #1 -->
								<li class="active"><a href="#" data-toggle="tab">Details</a></li>
								<!--/ Tab #1 -->
								<!-- Tab #1 -->
								<li class=""><a href="#" data-toggle="tab">Cast</a></li>
								<!--/ Tab #1 -->
								<!-- Tab #2 -->
								<li class=""><a href="#" data-toggle="tab">Crew</a></li>
								<!--/ Tab #2 -->
								<!-- Tab #3 -->
								<li class=""><a href="#" data-toggle="tab">Trailers</a></li>
								<!--/ Tab #3 -->
								<!-- Tab #4 -->
								<li class=""><a href="#" data-toggle="tab">Comments</a></li>
								<li class=""><a href="#" data-toggle="tab">screenshots</a></li>
								<!--/ Tab #4 -->
							</ul>
							<!--/ Navigation menu -->

							<!-- Tabs content -->
							<div class="tab-content">
								<!-- Tab #1 -->
								<div class="tab-pane active" id="Details">
									<h3>Details</h3>
									<p>{{$episode->episodeDescription}}</p>
								</div>
							</div>
							<!--/ Tabs content -->
						</div>
					</div>
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
						<li class="active"><a href="#tabs_i2-pane1" data-toggle="tab">Related Episodes</a></li>
						<!--/ Tab #1 -->
					</ul>
					<!--/ Navigation menu -->

					<!-- Tabs content -->
					<div class="tab-content">
						<!-- Tab #1 -->
						<div class="tab-pane active" id="tabs_i2-pane1">

							@foreach ($relatedEpisode as $episode)


							<div class="col-lg-3 col-md-4 col-sm-6 col-xs1-8 col-xs-12">
								<a href="{{url('/episode/'.$episode->id)}}"
									class="thumb hoverBorder plus boxHov1"
									onmouseover="document.getElementById('{{$episode->id}}').style.display = 'block';"
									onMouseOut="document.getElementById('{{$episode->id}}').style.display = 'none';"
									style="margin-bottom:0px;">

									<span class="hoverBorderWrapper">

										<img src="{{asset($episode->episodeFile)}}"
											onerror="this.src="
											class="img-responsive offer-banners-img" alt="" title=""
											style="height:200px;width:160px;">

										<span class="MovieQuality">1080p WEB-RIP</span><span
											class="theHoverBorder"></span>
									</span>

								</a>
								<div class="post-details" style="line-height:1.2em;margin-bottom:15px;">
									<p class="MovieTitle">
										<a href="{{url('/movie/'.$episode->id)}}"
											title="Wrong Turn">{{$episode->episodeTitle}}</a>
										<a href="{{url('/movie/'.$episode->id)}}" title="Wrong Turn"
											style="padding: 1px 4px;font-size: 11px;margin-right: 6%;float:right;">
											<span>{{$episode->year}}</span>
											<span class="MovieRatings">{{$episode->rating}}</span>

									</p>
								</div>

								<div class="displayHover1 BoxCss" id="{{$episode->id}}" style=""
									onmouseover="document.getElementById('{{$episode->id}}').style.display = 'block';"
									onMouseOut="document.getElementById('{{$episode->id}}').style.display = 'none';">
									<div class="arrow_box"></div>
									<div class="headBox">
										<ul>
											<li style="margin-left: -17px;">
												<font style="font-size:16px;color:#fff;">{{$episode->rating}}</font>
												<br><img src="{{asset('assets/images/imdb_logo.jpg')}}"
													style="width:28px;margin-top:-15px;" />
											</li>
											<li style="margin-left: 19px;">
												<font style="font-size:16px;color:#fff;">{{$episode->year}}</font> <br>
												<div style="margin-top: -7px;color: #fff;">YEAR</div>
											</li>
											<li style="margin-left: 19px;">
												<font style="font-size:14px;color:#fff;margin-left:0px;">1080p WEB-RIP
												</font> <br>
												<div style="margin-top: -7px;color: #fff;">Quality</div>
											</li>
											<li style="margin-left: 20px;margin-top: 6px;"><a href="#" class="flove"
													title="add to favourite list"><span
														class="grid-ibx__icon glyphicon glyphicon-heart-empty"></span></a>
											</li>
										</ul>
									</div>
									<div class="col-md-9" style="clear:left;background:-color:#fff;">
										<div style="font-size: 21px;margin-top: 10px;margin-bottom: -27px;">
											{{$episode->subCategoryTitle}}
										</div><br>
										<div style="font-size: 10px;"><a
												href="">Horror</a>
											,<a
												href="">Thriller</a>,
										</div>
									</div>
								
									<div class="col-md-12"
										style="font-size: 16px;font-weight: bold;margin-top: 8px;line-height: 15px;">
										{{$episode->episodeTitle}}</div>
									<div class="col-md-12" style="line-height: 13px;margin-top: 10px;">
										{{$episode->episodeDescription}}<a
											href="">More</a>. <br>
										<a class="btn-element btn btn-fullcolor btn-sm "
											href="" data-lightbox="iframe"
											title="Watch Trailer" style="margin:5px 5px 5px 0;"><span><i
													class="grid-ibx__icon glyphicon glyphicon-play"
													style="font-size:11px;"></i> Trailer</span></a>

										<a class="btn-element btn btn-lined lined-dark btn-sm "
											href="" title="Play Now"
											style="margin: 5px 0px 4px -4px;"><span><i
													class="grid-ibx__icon glyphicon glyphicon-play"
													style="font-size:11px;"></i> Watch Now</span></a>

										<a class="btn-element btn btn-success lined-dark btn-sm " href="#"
											title="Add to Playlist" style="margin: 1px 0px 0px 1px;"><span><i
													class="grid-ibx__icon glyphicon glyphicon-plus"
													style="font-size:11px;"></i></span></a>
									</div>

								</div>
							</div>
							@endforeach
							{{-- {{ $episodes->links() }} --}}
							<!--/ container -->
</section>



@endsection