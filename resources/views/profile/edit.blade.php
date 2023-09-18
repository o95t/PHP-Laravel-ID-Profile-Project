@extends('main.app')
@section('content')
	<br><br><br>
	<div class="w3-container w3-display-container" style="width:80%;">
		<form class="w3-container" role="form" method="POST" action="{{url('id')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<h2>Basic Information</h2>
			<div class="w3-row-padding">
			  <div class="w3-half">
			    <label>Name</label>
			    <input class="w3-input w3-border" type="text" name='name' value='{{$user->name}}'>
			  </div>
			  <div class="w3-half">
			    <label>Username</label>
			    <input class="w3-input w3-border" type="text" name='username' value='{{$user->info->username}}'>
			  </div>
			</div>
			<br>

			<div class="w3-row-padding">
			  <div class="w3-half">
			    <label>Birth Day</label>
				<input class="w3-input w3-border" type="date" name='birth' value='{{$user->info->birth}}'>
			  </div>
			</div>
			<br>

			<div class="w3-row-padding">
			  <div class="w3-half">
			    <label>Country</label>
				<input class="w3-input w3-border" type="text" name='country' value='{{$user->info->country}}'>
			  </div>
			</div>
			<br>

			<div class="w3-row-padding">
			  <div class="w3-half">
			    <label>Phone Number</label>
			    <input class="w3-input w3-border" type="text" name='phone' value='{{$user->info->phone}}'>
			  </div>
			  <div class="w3-half">
			    <label>Career Title</label>
			    <input class="w3-input w3-border" type="text" name='career' value='{{$user->info->title}}'>
			  </div>
			</div>
			<br>

			<div class="w3-row-padding">
			  <div class="w3-twothird">
			    <label>Summary of you</label>
			    <textarea class="w3-input w3-border" name='about'>{{$user->info->about}}</textarea>
			  </div>
			</div>
			<br>

			<hr>
			<br>
			<h2>Your Files</h2>
			<div class="w3-row-padding">
				<p class='w3-text-red'>&nbsp;&nbsp;Keep files empty if you don't want to change them.</p>
			  <div class="w3-half">
			    <label>Profile Image <small class='w3-small'>(500x333)</small></label>
			    <input class="w3-input w3-border" type="file" name='image'>
			  </div>
			  <div class="w3-half">
			    <label>Resume</label>
			    <input class="w3-input w3-border" type="file" name='pdf'>
			  </div>
			</div>
			<br>

			<hr><br>
			<h2>Career</h2>
			<div class="w3-row-padding">
				<div class="w3-third">
				  <label>Job title</label>
				  <input class="w3-input w3-border" type="text" name='jtitle' value='{{$user->info->exper->title or ''}}'>
				</div>

				<div class="w3-third">
				  <label>Company</label>
				  <input class="w3-input w3-border" type="text" name='jcompany' value='{{$user->info->exper->name or ''}}'>
				</div>

				<div class="w3-third">
				  <label>Start At</label>
				  <input class="w3-input w3-border" type="date" name='jstart' value='{{$user->info->exper->start or ''}}'>
				</div>

				<div class="w3-twothird">
				  <label>About job</label>
				  <textarea name='jabout' class="w3-input w3-border">{{$user->info->exper->what or ''}}</textarea>
				</div>
			</div>
			<br>

			<hr><br>
			<h2>Education</h2>
			<div class="w3-row-padding">
				<div class="w3-third">
				  <label>University</label>
				  <input class="w3-input w3-border" type="text" name='euni' value='{{$user->info->edu->uni or ''}}'>
				</div>

				<div class="w3-third">
				  <label>Degree</label>
				  <input class="w3-input w3-border" type="text" name='etype' value='{{$user->info->edu->type or ''}}'>
				</div>

				<div class="w3-third">
				  <label>Title</label>
				  <input class="w3-input w3-border" type="text" name='etitle' value='{{$user->info->edu->study or ''}}'>
				</div>
			</div>
			<br>

			<hr><br>
			<h2>Skills</h2>
			<div id='skill'>
			@foreach($user->info->skill as $skill)
			<div class="w3-row-padding">
				<div class="w3-third">
				  <label>Skill</label>
				  <input class="w3-input w3-border" type="text" name='skill[]' value='{{$skill->skill}}'>
				</div>
				  <i class="fa fa-close" onclick='removeItem(this);'></i>
			</div>
			@endforeach
			</div>
			<div class="w3-row-padding"><button class='w3-button' onclick='addSkill();' type='button'>Add More</button>
			</div>
			<br>

			<hr><br>
			<h2>Interest</h2>
			<div id='hobby'>
			@foreach($user->info->hobby as $inter)
			<div class="w3-row-padding">
				<div class="w3-third">
				  <label>Interest</label>
				  <input class="w3-input w3-border" type="text" name='hobby[]' value='{{$inter->name}}'>
				</div>
				  <i class="fa fa-close" onclick='removeItem(this);'></i>
			</div>
			@endforeach
			</div>
			<div class="w3-row-padding"><button class='w3-button' onclick='addHobb();' type='button'>Add More</button>
			</div>
			<br>

			<hr><br>
			<h2>Social Media</h2>
			<div id='social'>
			@foreach($user->info->social as $social)
			<div class="w3-row-padding">
				<div class="w3-third">
				  <label>Website name</label>
				  <input class="w3-input w3-border" type="text" name='wname[]' value='{{$social->site}}'>
				</div>
				<div class="w3-third">
				  <label>url</label>
				  <input class="w3-input w3-border" type="text" name='wurl[]' value='{{$social->url}}'>
				</div>
				<i class="fa fa-close" onclick='removeItem(this);'></i>
			</div>
			@endforeach
			</div>
			<div class="w3-row-padding"><button class='w3-button' onclick='addSocial();' type='button'>Add More</button>
			</div>
			<br>


			<div class="w3-row-padding">
			  <div class="w3-half">
			  		<button class='w3-button w3-red' type='submit'>save</button>
			  </div>
			</div>
		</form>
	</div>
<br><br>
@endsection