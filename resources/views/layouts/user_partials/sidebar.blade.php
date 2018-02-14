<div class="col-md-3 color_bg">
	<div class="dashboard_name"><img src="{{asset('/dashboard/images/name.png')}}" class="img-responsive"></div>
	<h3 class="name_person">
		KING_LAMAR
	</h3>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<a href="{{route('user_index')}}">
				<div class="side_img"><img src="{{asset('/dashboard/images/side_two.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					OVERVIEW
				</p>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<a href="{{route('user_setting')}}">
				<div class="side_img"><img src="{{asset('/dashboard/images/side_five.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					SETTINGS
				</p>
			</div>
		</div>	
	</div>
	
	
	<div class="row">
		<div class="col-md-12">
			<div class="last_border">
				<a href="{{route('logout_user')}}">
				<p class="side_para">
					LOGOUT
				</p>
				</a>
			</div>
		</div>
	</div>
	
</div>