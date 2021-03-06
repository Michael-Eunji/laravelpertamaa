<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Friends;
class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(3);
        return response()->json([
            'success'=> true,
            'message'=> 'Daftar Data Teman',
            'data'=> $friends
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'pendidikan' => 'required',

        ]);
        $friends = Friends::create([
            'nama' =>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'pendidikan'=>$request->pendidikan
        ]);

        if($friends){
            return response()->json([
                'success'=> true,
                'message'=> 'Teman Berhasil Ditambahkan',
                'data'=> $friends
        ], 200);
    }else {
                return response()->json([
                    'success'=> false,
                    'message'=> 'Teman Gagal Ditambahkan',
                    'data'=> $friends
                ], 409);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = Friends::where('id',$id)->first();
        return response()-> json([
            'success'=> true,
            'message'=> 'Detail Teman',
            'data'=> $friends  
        ],200);
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
        $friend = Friends::find($id)
        ->update([
            'nama' =>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'pendidikan'=>$request->pendidikan
        ]);
        return response()->json([
            'success'=> true,
            'message'=> 'Data Teman Berhasil Diubah',
            'data'=> $friends  
        ],200);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friends::find($id)->delete();
        
        return response()->json([
            'success'=> true,
            'message'=> 'Data Teman Berhasil Dihapus',
            'data'=> $friends  
        ],200);    
    }
}
