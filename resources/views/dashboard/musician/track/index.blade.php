@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
	<h3 class="heading_dashboard">
		ARTIST DASHBOARD
	</h3>
	<div class="border_red">
		<h3 class="album">
			MY TRACKS
		</h3>
	</div>
	<div class="row">
		<div class="col-md-12 color_bottom">
			<h3 class="all_album">
				VIEWING ALL TRACKS
			</h3>
			<a href="{{route('create_track')}}">
				<h3 class="add_album">
					ADD TRACK
				</h3>
			</a>
		</div>
	</div>
	<hr class="line">
	<div class="row">
		@foreach($tracks as $track)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="box">  
				<div class="dashboard_album"><img src="{{asset('/dashboard/musician/tracks/images/'.$track->image)}}" class="img-responsive custom-image-dashboard">
				<span class="caption fade-caption"> 
					<div class="star"><span class="glyphicon glyphicon-star"></span></div>
					<h3 class="hover_heading">MAKESONGFEATURED</h3>
					<div class="trophy"><i class="fa fa-trophy" style="font-size:24px"></i></div>
					<h3 class="hover_heading">ADDSONGTOCONTEST</h3> 
				</span> 
				</div> 
			</div>

			<a href="{{route('edit_track',['id' => $track->id])}}">
				<h3 class="album_person_name">
					{{$track->name}}
				</h3>
			</a>
		</div>
		@endforeach	
	</div>
	<div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
</div>
@endsection