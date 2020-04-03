<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\DemoUser;
use App\Repositories\Repository;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $model;
    public function __construct(DemoUser $demoUser)
    {
        $this->model = new Repository($demoUser);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('home.dashboard');
    }
    public function admin()
    {
        return view('home.admin');
    }
    public function user($id="")
    {
        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            
        }

        $data["data"] = ($id === "") ? collect([]) : $this->model->show($decrypted);
        $data["id"] = $id;
        return view('home.user', $data);
    }
    public function userAction($id="", Request $request)
    {
        
        Validator::extend('greater_than', function ($attribute, $value) {
            return strtotime($value) > time();
        });
        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|email|max:255',
            'file' => 'sometimes|file|max:10240|mimes:mp4, jpeg, jpg, png, pdf, xlsx, csv',
            'address' => 'required',
            'zipcode' => 'required|numeric|digits:6',
            'mobile_number' => 'required|numeric|digits:10',
            'date' => 'required|date|after:yesterday',
            'time' => 'required|date_format:H:i|greater_than',
        ],
        [
            'time.greater_than' => 'Time should be feature'
        ]);

        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            
        }

        $email = $request->request->get('email');
        $name = $request->request->get('name');
        $address = $request->request->get('address');
        $zipcode = $request->request->get('zipcode');
        $mobile_number = $request->request->get('mobile_number');
        $date = $request->request->get('date');
        $time = $request->request->get('time');
        $fileName = "";
        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file('file')->extension();  
            $request->file->move(public_path('uploads'), $fileName);
        } 

        $data = [
            "name" => $name,
            "email" => $email,
            "file"  => $fileName,
            "address" => $address,
            "zipcode" => $zipcode,
            "mobile_number" => $mobile_number,
            "date" => $date,
            "time" => $time,
            "created_at" => time()
        ];

        if ($request->isMethod('post')) {
            $this->model->create($data);
        } else if ($request->isMethod('put')){
            $data["updated_at"] = time();
            $this->model->update($data, $decrypted);
        }
        return \Redirect::route('list');
    }

    public function list(Request $request) {
        $data["data"] = $this->model->all();
        return view('home.list', $data);
    }

    public function logout() {
        Auth::logout();
        return redirect()->intended('');
    }
}
