<?php

namespace App\Http\Controllers\Musician;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $args['users'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.musician.index')->with($args);
    }

    public function musician_image(Request $request)
    {
        if(Input::file('image')){

               User::where('id' ,'=', Auth::user()->id)->update([
                'image' => $this->UploadImage('image', Input::file('image'))
            ]);                 
        }
        return back();
    }

    public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/musician_image/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $args['users'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.musician.overview')->with($args);
    }

    //  public function track()
    // {
    //     $args['users'] = User::where('id',Auth::user()->id)->first();
    //     return view('dashboard.musician.track')->with($args);
    // }

     public function setting()
    {
        $args['users'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.musician.setting')->with($args);
    }

     public function musician_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
