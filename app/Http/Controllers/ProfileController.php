<?php

namespace idprofile\Http\Controllers;

use Illuminate\Http\Request;
use idprofile\User;
use idprofile\BasicInfo;
use idprofile\Education;
use idprofile\Experience;
use idprofile\Upload;
use idprofile\Social;
use idprofile\Skill;
use idprofile\Hobby;

class ProfileController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except("show");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.show')->with('user',auth()->user())->with('title',auth()->user()->name);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info=BasicInfo::where('username',$id)->first();
        $user=User::find($info->user_id);
        return view('profile.show')->with('user',$user)->with('title',$user->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit')->with('user',auth()->user())->with('title','Edit Profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        //dd($request->input('skill'));
        $this->validate($request, [
          'name' => 'required',
          'username' => 'required',
          'birth' => 'required',
          'country' => 'required',
          'phone' => 'required',
          'career' => 'required',
          'about' => 'required',
          'jtitle' => 'required',
          'jcompany' => 'required',
          'jstart' => 'required',
          'euni' => 'required',
          'etype' => 'required',
          'etitle' => 'required',
          'skill.*' => 'required',
          'hobby.*' => 'required',
          'wname.*' => 'required',
          'wurl.*' => 'required',
          'jabout' =>'required',
          'image'=>'image',
          'pdf'=>'mimes:pdf'
        ]);


        $user=auth()->user();

        // Change usersname
        if($user->info->username!=$request->input('username')){
            if(BasicInfo::where('username', '=', $request->input('username'))->exists()){
                return redirect('/setting')->with('error','User name is used.')->withInput();
            }else{
                $user->info->username=$request->input('username');
            }
        }


        // Change name
        $user->name=$request->input('name');

        // Change birth
        $user->info->birth=$request->input('birth');

        // Change country
        $user->info->country=$request->input('country');

        // Change phone
        $user->info->phone=$request->input('phone');

        // Change title
        $user->info->title=$request->input('career');

        // Change about
        $user->info->about=$request->input('about');

        $user->save();
        $user->info->save();

        // Experience 
        $exp=isset($user->info->exper)?$user->info->exper:new Experience;

        $exp->name=$request->input('jcompany');
        $exp->start=$request->input('jstart');
        $exp->what=$request->input('jabout');
        $exp->title=$request->input('jtitle');
        $exp->basic_info_id=$user->info->id;
        $exp->save();

        // Education 
        $edu=isset($user->info->edu)?$user->info->edu:new Education;

        $edu->uni=$request->input('euni');
        $edu->study=$request->input('etitle');
        $edu->type=$request->input('etype');
        $edu->basic_info_id=$user->info->id;
        $edu->save();

        // Files Saving
        $file=isset($user->info->file)?$user->info->file:new Upload;
        $file->basic_info_id=$user->info->id;
        
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName= 'image'.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $imageName);
            $file->image=$imageName;
        }

        if($request->hasFile('pdf')){
            $extension = $request->file('pdf')->getClientOriginalExtension();
            $pdfName= 'pdf'.'_'.time().'.'.$extension;
            $path = $request->file('pdf')->storeAs('public/pdf', $pdfName);
            $file->resume=$pdfName;
        }
        $file->save();

        $userId=$user->info->id;

        // Skills 
        Skill::where('basic_info_id',$user->info->id)->delete();
        $skills=$request->input('skill');
        foreach($skills as $skill){
            if($skill=='')break;
            $sk=new Skill;
            $sk->basic_info_id=$userId;
            $sk->skill=$skill;
            $sk->save();
        }

        // hobby 
        Hobby::where('basic_info_id',$user->info->id)->delete();
        $hobb=$request->input('hobby');
        foreach($hobb as $hoby){
            if($hoby=='')break;
            $hoo=new Hobby;
            $hoo->basic_info_id=$userId;
            $hoo->name=$hoby;
            $hoo->save();
        }

        // Social 
        Social::where('basic_info_id',$user->info->id)->delete();
        $wname=$request->input('wname');
        $wurl=$request->input('wurl');
        $wlen=count($wname);
        for($i=0;$i<$wlen;$i++){
            if($wname[$i]=='')break;
            $so=new Social;
            $so->basic_info_id=$userId;
            $so->site=$wname[$i];
            $so->url=$wurl[$i];
            $so->save();
        }

        return redirect('/id')->with('success','Profile Updated');
        
    }


    public function support(Request $r,$id){
        $user=User::find($id);
        if($id==auth()->user()->id){
          return redirect(url("id/".$user->info->username))->with('error','You cannot support you self');
        }
        $user->info->support=$user->info->support+1;
        $user->info->save();
        return redirect(url("id/".$user->info->username))->with('success','Done.');
    }

}
