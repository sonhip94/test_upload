<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;
use App\files;
use App\videos;
use DB;

class FileController extends Controller
{

    //direct into upload file page
    public function showUploadFrom()
    {
        return view('uploading', ['User'=>Auth::User()]);
        //return redirect()->route('uploadM');
    }
    public function showTestUploadForm()
    {
        return view('fileupload3');
    }
    public function showUploadManage()
    {
        return view('fileuploads') ;
    }
    public function storeFile(Request $request, $userId){
        if($request->hasFile('file')){
            $file = $request->file;
            if ($file->getMimeType() == 'video/mp4') {
                $video = new videos;
                $video->name = $file->getClientOriginalName();
                $video->duration = 0;
                $video->extension = 'video/mp4';
                $video->createDate = now();
                $video->uploadDate = now();
                $video->user_id = auth()->id();
                $video->jwPlayerId = 1;
                $request->file->storeAs('public/videos', $file->getClientOriginalName());

                $video->save();
            } else {
                $tmp = new files;
                $tmp->name = $file->getClientOriginalName();
                $tmp->size = $file->getClientSize();
                $tmp->description = $file->getClientOriginalName();
                $tmp->extension = $file->getMimeType();
                $tmp->createDate = now();
                $tmp->uploadDate = now();
                $tmp->user_id = auth()->id();
                $tmp->remember_token = $request->_token;
                $request->file->storeAs('public/files', $file->getClientOriginalName());

                $tmp->save();
            }

            return redirect()->route("uploadManage");
        };

        return $request->all();
    }


    // trying two function below
    public function fileDetails($userId){
        $file_Cate = DB::table('files')->select('name','size','user_id')->where('user_id',$userId)->get();
        print_r($file_Cate);
        //return view('uploadingqueue',compact('file_Cate'));
    }

    //get list into fileuploads
    public function getList(){
        $data = files::select('id','name','size','user_id')->where('user_id',['User'=>Auth::User()->id])->orderBy('id','ASC')->get()->toArray();
        return view('fileuploads',compact('data'));

    }
    //delete function for file upload management
    public function getDelete($id){
        $file = files::find($id);
        if (!Storage::exists(storage_path('public/uploads/' . $file->name))) {
            unlink(storage_path('public/uploads/' . $file->name));
            unlink(storage_path('app/public/files/' . $file->name));
        }
        $file->delete();
        return redirect()->route('uploadManage')->with(['flash_level'=>'success','flash_message'=>'Delete successfully']);
    }

    //download
    public function download($id){
        $file = files::find((int) $id);

        return response()->download(storage_path("app/public/files/{$file->name}"));
    }

    //getlist Video

    public function uploadTus(Request $request)
    {
        $files = $request->all();
        foreach ($files as $file) {
            if ($file->getMimeType() == 'video/mp4') {
                $video = new videos;
                $video->name = $file->getClientOriginalName();
                $video->duration = 0;
                $video->extension = 'video/mp4';
                $video->createDate = now();
                $video->uploadDate = now();
                $video->user_id = auth()->id();
                $video->jwPlayerId = 1;
                $file->storeAs('public/videos', $file->getClientOriginalName());

                $video->save();
            } else {
                $tmp = new files;
                $tmp->name = $file->getClientOriginalName();
                $tmp->size = $file->getClientSize();
                $tmp->description = $file->getClientOriginalName();
                $tmp->extension = $file->getMimeType();
                $tmp->createDate = now();
                $tmp->uploadDate = now();
                $tmp->user_id = auth()->id();
                $tmp->remember_token = $request->_token;
                $file->storeAs('public/files', $file->getClientOriginalName());

                $tmp->save();
            }
        }
    }
}
