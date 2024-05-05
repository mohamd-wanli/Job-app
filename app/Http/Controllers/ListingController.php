<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    public function index(){
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))
            ->paginate(4)
        ]);
    }
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }
    public function create(){
      
       return view('listings.create');
  
    }
    public function store(Request $request){
      $fields = $request->validate([
        'company'=>['required', Rule::unique('listings','company')],
        'title'=>'required',
   
        'location'=>'required',
        'website'=>'required',
        'email'=>['email','required'],
        'tags'=>'required',
        'description'=>'required'
      ]);
      if($request->hasFile('logo')){
        $fields['logo']= $request->file('logo')->store('logos','public');
      }
            $fields['user_id']=auth()->id();
      Listing::create($fields);

      return redirect('/')->with('message','listing created successfully');

    }
    //show edit form
  public function edit(Listing $listing){
  
      return view('listings.edit',[
        'listing'=>$listing
      ]);
    }
    public function update(Request $request,Listing $listing){
      if($listing['user_id']!=auth()->id()){
        return abort(403,'Unauthorized Action');
      }
      $fields=$request->validate([
        'company'=>'required',
        'title'=>'required',
        'location'=>'required',
        'website'=>'required',
        'email'=>['email','required'],
        'tags'=>'required',
        'description'=>'required'
      ]);
        $listing->update($fields);
      return back()->with('message','listing updated successfully');

    }
    public function destroy(Listing $listing){
      if($listing['user_id']!=auth()->id()){
        return abort(403,'Unauthorized Action');
      }
      $listing->delete();
      return redirect('/')->with('message','listing deleted successfully');

    }
   
    public function manage(){
         
      return view('listings.manage',[
        'listings'=>auth()->user()->listings()->get()
      ]);
    }
    
 


}
