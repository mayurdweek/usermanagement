<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\City;
use App\Models\Country;
use App\Models\Documents;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    //

    public function exportUsers(){
        return Excel::download(new UsersExport,'users.csv');
    }
    public function importdata(Request $request){
        $request->validate([
            'file'=>'required|mimes:csv,txt',
        ]);
        Excel::import(new UsersImport,$request->file('file'));
        return back()->with('success','Users Imported successfully');

    }
    public function showlogin()
    {
        return view('user.login');
    }
    public function showForgotPasswordForm(Request $request)
    {
        return view('user.forgot-password');
    }
    public function sendResetLink(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
    public function showResetPasswordForm($token)
    {
        return view('user.reset-password', ['token' => $token]);

    }
    public function resetPassword(Request $request){
        
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.showlogin')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function checklogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=> 'required|min:6',
        ]);

        $user=User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
        
            return redirect('/users')->with('message', 'Login successful!');
        }
        
        else{
            
            return redirect('/')->with('message','Username or password Invalid');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('message', 'Logout successful!');
    }
    public function index()
    {
        return view('user.index');
    }
    public function getdata()
    {
        $users = User::select([
            'id', 'name', 'image', 'email', 'mobile', 'gender', 
            'country', 'state', 'city', 'hobby', 'created_at'
        ]);

        return DataTables::of($users)
        ->addColumn('action', function ($user) {
            return '<a href="/users/edit/' . $user->id . '">Edit</a> | 
                    <form action="/users/delete/' . $user->id . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';
        })
        ->rawColumns(['action']) // Ensure action column renders HTML
        ->make(true);
    }
    public function create()
    {
        $contries=Country::all();
        return view("user.create",compact('contries'));
    }

    public function uploadimage(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            return back()->with('success','Image uploaded successfully')->with('file',$filename);
        }
        else{
            return back()->withErrors(['image'=>'Please upload a validimage file']);
        }
    }
    
    public function getstatebycountry($cid)
    {
        
        $states=State::where('country_id',$cid)->get(['id','name']);
        
        return response()->json($states);
    }
    public function getcitybystate($sid)
    {
        $cities = City::where('state_id', $sid)->get(['id','name']);
        return response()->json($cities);
    }
    public function selectcity($cid)
    {
        $selectedcity=City::where('id',$cid)->get(['id','name']);
        return response()->json($selectedcity);
    }
    public function store(Request $request)
{

   
    // print_r($request->image);die;
    // Validate the input
    $validatedData = $request->validate([
        'files'=>'required',
        'profile'=>'required|max:2048',
        'name'=>'required|max:2048',
        'email' => 'required|email|unique:users,email', 
        'password' => 'required|min:6', 
        'mobile' => 'required|numeric|digits:10', 
        'gender' => 'required|in:male,female,other',
        'country'=>'required|string|max:255',
        'state'=>'required|string|max:255',
        'city' => 'required|string|max:255', 
        'hobby' => 'required|array',
        'hobby.*' => 'string|in:Cricket,Football,Vollyball', 
    ]);
    $path = $request->file('profile')->store('images', 'public');

    

    // Convert hobbies array to string
    $hobbyString = implode(', ', $validatedData['hobby']); 
   
    $user=User::create([
        'name'=> $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']), // Hash the password
        'mobile' => $validatedData['mobile'],
        'gender' => $validatedData['gender'],
        'country'=>$validatedData['country'],
        'state'=>$validatedData['state'],
        'city' => $validatedData['city'],
        'hobby' => $hobbyString,
        'image'=>'storage/'.$path,
    ]);
    if($request->hasFile('files'))
    {
        foreach ($request->file('files') as $file)
        {
            $filename=time().'-'.$file->getClientOriginalName();
            
            $pathfile=$file->storeAs('uploads',$filename,'public');
            Documents::create([
                'userid'=>$user->id,
                'filename'=>$filename
            ]);
          
        }
    }
    
   

    

    return redirect()->route('users.index')->with('success', 'User created successfully');
}
    public function show(User $user)
    {
        $doc=Documents::where('userid', $user->id)->get();
        $users =User::select('users.*','tbl_countries.name as country_name', 'tbl_states.name as state_name', 'tbl_cities.name as city_name')
        ->join('tbl_countries', 'users.country', '=', 'tbl_countries.id')
        ->join('tbl_states', 'users.state', '=', 'tbl_states.id')
        ->join('tbl_cities', 'users.city', '=', 'tbl_cities.id')
        ->where('users.id',$user->id)
        ->first();
        return view("user.show", compact("users",'doc'));
    }
    public function edit(User $user)
    {
        $countries=Country::all();;
        $states=State::where('country_id',$user->country)->get();
        $cities=City::where('state_id',$user->state)->get();
        $documents=Documents::where('userid',$user->id)->get();
        return view('user.edit', compact('user','countries','states','cities','documents'));
    }
    public function update(Request $request, User $user ,Documents $doc)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // Make password optional
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required|in:Male,Female,Other',
            'city' => 'required|string|max:255',
            'hobby' => 'required|array',
            'hobby.*' => 'string|in:Cricket,Vollyball,Football',
        ]);
    
        // Handle profile image upload
        $path = $user->image; // Keep the existing image by default
        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('images', 'public');
            $path = 'storage/' . $path; // Ensure public path is used
        }
    
        // Convert hobbies array to string
        $hobbyString = implode(', ', $validatedData['hobby']); 
    
        // Check if the password needs updating
        $password = $user->password; // Retain the current password by default
        if ($validatedData['password']) {
            $password = bcrypt($validatedData['password']); // Hash only if provided
        }
      

        // Update the user
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $password, // Use the appropriate password value
            'mobile' => $validatedData['mobile'],
            'gender' => $validatedData['gender'],
            'city' => $validatedData['city'],
            'hobby' => $hobbyString, 
            'image' => $path
        ]);
        if($request->hasFile('files'))
        {
            $existingDocs = $doc->where('userid', $user->id)->get();
            
            $files = $request->file('files');
            foreach ($files as $index => $file)
            {
                // dd($request->files);die;
                $filename=time().'-'.$file->getClientOriginalName();
                $pathfile=$file->storeAs('uploads',$filename,'public');
                if (isset($existingDocs[$index])) {
                    // Update the existing document
                    $existingDocs[$index]->update([
                        'filename' => $filename,
                    ]);
                } else {
                    // If no matching record exists, create a new one
                    $doc->create([
                        'userid' => $user->id,
                        'filename' => $filename,
                    ]);
                }
            }
            
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message','user deleted successfully');
    }
}
