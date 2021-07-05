<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\FileFolder;
use App\Models\FileStorage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $folders = FileFolder::where('id_users','=',Auth()->user()->id)->get();

        return view('file.index')->with(compact('folders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $id_folder = $id;
        return view('file.create')->with(compact('id_folder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $files = FileStorage::where('id_folders','=',$id)->get();
      $id_folder = $id;
      $users = User::all();

      return view('file.show')->with(compact('files','id_folder','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createFolder(){
        return view('file.folder.create');

    }

    public function storeFolder(Request $request){
        
        $add = New FileFolder;
        $add->id = Uuid::uuid4()->getHex();
        $add->id_users = auth()->user()->id;
        $add->name = $request->name;
        $add->description = $request->description ? $request->description : "n/a";
        $add->save();

        $folders = FileFolder::where('id_users','=',Auth()->user()->id)->get();

        return redirect()->action([FileController::class, 'index']);
    }

    public function storeFile(Request $request, $id){
        request()->validate([
            'file' => 'mimes:jpeg,png,jpg,pdf,doc,dox|max:8192'
        ]);
      $new = New FileStorage;
      $new->id = Uuid::uuid4()->getHex();
      $new->id_users = auth()->user()->id;
      $new->name = $request->name;
      $new->id_folders = $id;
      $new->id_status = '1';

      //file
      if ($request->hasFile('file')) {

        $file = $request->file('file');
        $path = $file->store('img/file', 'public');
        $infoPath = pathinfo($path);
        $new->file_extension = $infoPath['extension'];
        $new->pathfile = $path;
        } else {
            $new->pathfile = '';
        }

      $new->save();

      return redirect()->action([FileController::class, 'index']);

    }
  
}
