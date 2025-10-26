<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('profile.index');
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'gender'=>'required'
    	]);
    	User::where('id',auth()->user()->id)
    		->update($request->except('_token'));
    	return redirect()->back()->with('message','profile updated');

    }
    public function profilePic(Request $request)
    {
    	$this->validate($request,['file'=>'required|image|mimes:jpeg,jpg,png']);
    	if($request->hasFile('file')){
    		$image = $request->file('file');
    		$name = time().'.'.$image->getClientOriginalExtension();
    		$destination = public_path('/profile');
    		$image->move($destination,$name);
    		
    		$user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
    		
    		return redirect()->back()->with('message','profile updated');


    	}
    }


	public function switchLang($lang)
{
    // Store the language in the session
    Session::put('locale', $lang);
    
    // Set the language for the app
    App::setLocale($lang);
    
    // Redirect back with a success response or you can trigger a JavaScript to reload
    return response()->json(['success' => true]);
}

}
