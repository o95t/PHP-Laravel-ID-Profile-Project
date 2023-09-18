@extends('main.app')
@section('content')
<br><br><br>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          @if(isset($user->info->file->image))
          <img src="../storage/image/{{$user->info->file->image}}" style="width:100%" alt="Avatar">
          @else
          <img src="http://placehold.it/500x333" style="width:100%" alt="Avatar">
          @endif
          <div class="w3-display-bottomleft w3-container w3-text-white w3-dark-grey w3-opacity-min">
            <h2>{{$user->name}} <small class="w3-large w3-text-sand">({{$user->info->username}})</small></h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-black"></i>{{$user->info->title}}</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-black"></i>{{$user->info->country}}</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-black"></i>{{$user->email}}</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-black"></i>{{$user->info->phone}}</p>
          <p><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-black"></i>{{$user->info->birth}}</p>
          <p><i class="fa fa-file-pdf-o fa-fw w3-margin-right w3-large w3-text-black"></i><a href="../storage/pdf/{{$user->info->file->resume or ''}}">Resume</a></p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-black"></i>Skills</b></p>
          @foreach($user->info->skill as $skill)
          <span class="w3-tag w3-padding w3-margin-min w3-round-large w3-center">
          {{$skill->skill}}
          </span>
          @endforeach
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-bicycle fa-fw w3-margin-right w3-text-black"></i>Interests</b></p>
          @foreach($user->info->hobby as $inter)
          <span class="w3-tag w3-padding w3-margin-min w3-round-large w3-center">
          {{$inter->name}}
          </span>
          @endforeach
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-black"></i>Social</b></p>
          @foreach($user->info->social as $net)
          <p>- {{$net->site}} : <a href='{{$net->url}}'> {{$user->name}}</a> </p>
          <hr>
          @endforeach
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-address-card fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Summary</h2>
        <div class="w3-container">
          <p>{{$user->info->about}}</p>
        </div>
      </div>

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Current Job</h2>
        <div class="w3-container">
          @if(isset($user->info->exper))
          <h5 class="w3-opacity"><b><a href='../companies/{{$user->info->exper->name or ''}}'>{{$user->info->exper->name}}</a> / {{$user->info->exper->title}}</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$user->info->exper->start}}</h6>
          <p>{{$user->info->exper->what}}</p>
          @endif
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Highest Education</h2>
        <div class="w3-container">
        @if(isset($user->info->edu))
          <h5 class="w3-opacity"><b>{{$user->info->edu->study or ""}}  / {{$user->info->edu->type or ""}} </b></h5>
          <h6 class="w3-text-dark-grey"><i class="fa fa-university fa-fw w3-margin-right"></i>{{$user->info->edu->uni or ""}}</h6>
          <hr>
        @endif
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-thumbs-up fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Support me</h2>
        <div class="w3-container">
          <p>If you know me, Please support me with a like :)</p>
          <h4>
            @if(Auth::check())<form method='POST' action='{{url("support")}}/{{$user->id}}'>@endif
            Number of supporter : {{$user->info->support}}
            @if(Auth::check()) &nbsp;|&nbsp;
            {{ csrf_field() }}
            <button type='submit' class='w3-button'><i class="fa fa-thumbs-up fa-fw w3-text-black"></i>
            </button>
          </form>
          @endif
          </h4>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<br>
@endsection