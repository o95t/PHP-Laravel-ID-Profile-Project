@extends('main.app')
@section('content')
<br><br><br>
<div class="w3-container w3-row">
  <h2>&nbsp;&nbsp;Users</h2>
  <hr>
  @foreach($users as $user)
  <div class="w3-card-4 w3-third w3-margin" style="width:20%">
    <header class="w3-container w3-light-grey">
      <h3>{{$user->name}}</h3>
    </header>
    <div class="w3-container">
      <img src="../storage/image/{{$user->info->file->image}}" alt="" class="w3-left w3-circle w3-margin-right" style="width:90px;height:100px">
      <p>{{substr($user->info->about,0,70)}}</p><br>
    </div>
    <a href='../id/{{$user->info->username}}' class="w3-button w3-block w3-dark-grey">Show</a>
  </div>
  @endforeach
</div>

<br>
<div class="w3-container w3-row">
  <h2>&nbsp;&nbsp;Companies</h2>
  <hr>
  @foreach($comp as $com)
  <div class="w3-card-4 w3-third w3-margin" style="width:20%">
    <header class="w3-container w3-light-grey">
      <h3>{{$com->name}}</h3>
    </header>
    <a href="../companies/{{$com->name}}" class="w3-button w3-block w3-dark-grey">Show All</a>
  </div>
  @endforeach
</div>
@endsection