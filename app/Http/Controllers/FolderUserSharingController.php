<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\FolderUserSharing;
use Illuminate\Support\Facades\Validator;

class FolderUserSharingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_folder)
    {
      
        $dataUsers = FolderUserSharing::where('id_status' , 1)->where('id_folder', $id_folder)
        ->with(array('user_to' => function($query) {
            $query->select('id','name','phone_number');
        }))->get();

        $data = [
            'status' => 'success', 
            'message' => 'Successfully get all terrain.',
            'data' => $dataUsers
        ];

        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userTo' 	    => 'required',
        ]);
        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }
        
        $add = new FolderUserSharing;
        $add->id = Uuid::uuid4()->getHex();
        $add->id_folder = $request->id_folder;
        $add->id_users_from = Auth()->user()->id;
        $add->id_users_to = $request->userTo;
        $add->id_status = '1';

        $add->save();
        
        $data = [
            'status' => 'success', 
            'message' => 'Successfully store new user.'
        ];
        return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $deleteData = FolderUserSharing::find($id);
        $deleteData->delete();

        $data = [
            'status' => 'success', 
            'message' => 'Successfully delete sensor.'
        ];
        return json_encode($data);
    }
}
