<?php

namespace idprofile\Http\Controllers;

use Illuminate\Http\Request;
use idprofile\User;
use idprofile\Experience;

class SearchController extends Controller
{

	public function search(Request $request){
		//dd($request);

		$this->validate($request,[
			'string'=>'required'
		]);
		$str=$request->input('string');
		$users=User::where('name','LIKE',"%$str%")->get();
		$comp=Experience::select('name')->where('name','like',"%$str%")->get();

		return view('search.result')->with('title','Result')->with('users',$users)->with('comp',$comp);
	}

	public function index(){
		$comp=Experience::select('name')->get();
		return view('search.all')->with('comp',$comp);
	}

	public function show($id){
		$user=User::all();
		return view('search.show')->with('users',$user)->with('string',$id);
	}
}
