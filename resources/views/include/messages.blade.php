<div class="w3-row-padding">
@if(count($errors) > 0)
    <br><br><br>
    <div class="w3-panel w3-red">
    <h2>Error(s) : </h2>
    @foreach($errors->all() as $error)
            <p>- {{$error}}</p>
    @endforeach
    </div>
@endif

@if(session('success'))
<br><br><br>
    <div class="w3-panel w3-green">
<h2>Message : </h2>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
<br><br><br>
    <div class="w3-panel w3-red">
<h2>Error(s) : </h2>
        {{session('error')}}
    </div>
@endif
</div>