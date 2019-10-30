<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videos;
use Auth;
use Storage;

class FrontendController extends Controller
{
    //Linking to index page
    public function index()
    {
        return view('home');
    }
    
    //Linking to uploading page
    public function uploading()
    {
        return view('uploading');
    }
    
    //Linking to file uploads page
    public function fileuploads()
    {
        return view('fileuploads');
    }
    
    //Linking to video viewer page
    public function videoviewer()
    {
        $data = videos::where('user_id', ['User'=>Auth::User()->id])->orderBy('id','ASC')->get()->toArray();
//
        return view('videoviewer', compact('data'));
    }
    
    //Linking to uploading queue page
    public function uploadingqueue()
    {
        return view('uploadingqueue');
    }
    
    //Linking to uploading progress  page
    public function uploadingprogress()
    {
        return view('uploadingprogress');
    }

    public function download($id){
        $file = videos::find((int) $id);

        return response()->download(storage_path("app/public/videos/{$file->name}"));
    }

    public function getDelete($id){
        $file = videos::find($id);
        if (!Storage::exists(storage_path('public/uploads/' . $file->name))) {
            unlink(storage_path('public/uploads/' . $file->name));
            unlink(storage_path('app/public/videos/' . $file->name));
        }
        $file->delete();
        return redirect()->route('videos')->with(['flash_level'=>'success','flash_message'=>'Delete successfully']);
    }
}
