<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Track;
use App\Rating;
use App\Comment;
use App\RedeemedPoint;
use App\Category;
use App\Album;
use App\Album_Video;
use App\Point;

class AdminController extends Controller
{    
    public function is_admin(){
    return view ('dashboard.admin.index');        
    }
    
    public function profile_view(){
    return view ('dashboard.admin.profile.view');        
    }   

    public function AdminImageUpload(Request $request){    	
		$img_name = '';
		if(Input::file('image')){
		$img_name = $this->UploadImage('image', Input::file('image'));
		User::where('id' ,'=', Auth::user()->id)->update([
		'image' => $img_name
		]);  
		$path = asset('/public/dashboard/profile_images').'/'.$img_name; 
		return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
		}else{
		return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
		}	
    }
    public function UploadImage($type, $file){
        if( $type == 'image'){
        $path = base_path() . '/public/dashboard/profile_images/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
    
    public function edit_admin_profile(Request $request, $id){
        $edit_admin_profile = User::find($id);
        return view('dashboard.admin.profile.edit');           
    }

    public function update_admin_profile(Request $request, $id){            
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');        
        $u->username = Input::get('username');
        $u->facebook = Input::get('facebook');
        $u->twitter = Input::get('twitter');
        $u->instagram = Input::get('instagram');
        $u->save();
        $this->set_session('Your information is updated', true);
        return redirect()->route('profile_view');  
    }

    public function users(){
        $args['users'] = User::leftJoin('roles','roles.id','=','users.role_id')->select('users.*','roles.name as role_name')->orderBy('users.id' ,'DESC')->get();
        return view('dashboard.admin.users.index')->with($args);
    }
    public function edit_user_profile(Request $request, $id){
        $edit_user_profile = User::find($id);
        $roles = Role::select('name')->where('id',$edit_user_profile->role_id)->first(); 
        return view('dashboard.admin.users.edit')->with('edit_user_profile',$edit_user_profile)->with('roles',$roles);           
    }

    public function update_user_profile(Request $request, $id){            
        $u = User::find($id);
        $u->name = Input::get('name');
        $u->phone = Input::get('phone');
        $u->email = Input::get('email');        
        $u->username = Input::get('username');
        $u->facebook = Input::get('facebook');
        $u->twitter = Input::get('twitter');
        $u->instagram = Input::get('instagram');
        $u->save();
        $this->set_session('Your information is updated', true);       
        return redirect()->route('users');  
    }

    public function view_user_profile(Request $request, $id){
        $view_user_profile = User::find($id);
        $roles = Role::select('name')->where('id',$view_user_profile->role_id)->first(); 
        return view ('dashboard.admin.users.view')->with('view_user_profile',$view_user_profile)->with('roles',$roles);        
    }

    public function suspend_user(Request $request, $id){
        DB::table('users')
            ->where('id', $id)
            ->update(['suspend' => 1]); 
        $this->set_session('You Have Successfully Suspended User ', true);      
        return redirect()->back();
    }

    public function unsuspend_user(Request $request, $id){
            DB::table('users')
            ->where('id', $id)
            ->update(['suspend' => 0]); 
        $this->set_session('You Have Successfully UnSuspended User ', true);      
        return redirect()->back();
    }

    public function redeem_index(){
        $args['redeemed_points'] = RedeemedPoint::leftJoin('users','users.id','=','redeemed_points.user_id')->select('users.name','users.email','users.phone','users.username','redeemed_points.id','redeemed_points.redeemed_point','redeemed_points.status')->orderBy('redeemed_points.id' ,'DESC')->get();
        return view('dashboard.admin.redeem.index')->with($args);
    }

    public function accept_redeem_request(Request $request, $id){
        // dd('123');
        DB::table('redeemed_points')
            ->where('id', $id)
            ->update(['status' => 1]);  
        $this->set_session('You Have Successfully Accepted Points Redeem Request ', true);      
        return redirect()->back();
    }

    public function reject_redeem_request(Request $request, $id){
        // dd('456');
        DB::table('redeemed_points')
            ->where('id', $id)
            ->update(['status' => 0]);   
        $this->set_session('You Have Successfully Rejected Points Redeem Request ', true);     
        return redirect()->back();
    }

     public function admin_update_password(Request $request)
    {
        $this->validate(request(),[
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if (Hash::check($request->old_password, Auth::user()->password))
        {
            if($request->password === $request->password_confirmation)
            {
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user)
                {
                    $this->set_session('You Have Successfully Updated Password', true);
                    return redirect()->back(); 
                }
                else
                {
                    $this->set_session('Password Update Failed, Please Try Again ', false);
                    return redirect()->back();
                }
            }
            else
            {
                $this->set_session('Password Does Not Match, Please Try Again ', false);
                    return redirect()->back();
            }
        }
        else
        {
            $this->set_session('Old Password Is Incorrect, Please Try Again ', false);
            return redirect()->back(); 
        }

                   
    }
    public function admin_logout(Request $request) {     
      Auth::logout();
      return redirect('/');
    }
}
