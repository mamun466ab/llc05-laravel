<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [];
        $data['site_title'] = 'LLC Blog';
        $data['current_time'] = date('Y m d, H:i:s');
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com',
        ];

        return view('index', $data);
    }

    public function post()
    {
        $data = [];
        $data['site_title'] = 'LLC Blog';
        $data['current_time'] = date('Y m d, H:i:s');
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com',
        ];

        $data['post'] = [
            'title' => 'This is a sample post',
            'created_at' => 'January 1, 2014',
            'description' => '<p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
        <hr>
        <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
            vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
        <blockquote>
            <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </blockquote>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        <h2>Heading</h2>
        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
            Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <h3>Sub-heading</h3>
        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        <pre><code>Example code block</code></pre>
        <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh,
            ut fermentum massa.</p>
        <h3>Sub-heading</h3>
        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna
            mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <ul>
            <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
            <li>Donec id elit non mi porta gravida at eget metus.</li>
            <li>Nulla vitae elit libero, a pharetra augue.</li>
        </ul>
        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
        <ol>
            <li>Vestibulum id ligula porta felis euismod semper.</li>
            <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
            <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
        </ol>
        <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>',
        ];

        return view('post', $data);
    }

    public function showRegistrationForm()
    {
        $data = [];
        $data['site_title'] = 'LLC Blog';
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com',
        ];

        return view('register', $data);
    }

    public function processRegistration(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'username' => 'required|min:5',
            'password' => 'required|min:6',
            'photo' => 'required|image|max:10240',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');
        $file_name = uniqid('photo_', true).str_random(10).'.'.$photo->getClientOriginalExtension();

        if ($photo->isValid()) {
            $photo->storeAs('images', $file_name);
        }

        //$user = new User();
        //$user->email = trim($request->input('email'));
        //$user->password = bcrypt($request->input('password'));
        //$user->photo = $file_name;
        //$user->save();
        User::create([
            'email' => strtolower(trim($request->input('email'))),
            'username' => strtolower(trim($request->input('username'))),
            'password' => bcrypt($request->input('password')),
            'photo' => $file_name,
        ]);

        session()->flash('type', 'success');
        session()->flash('message', 'Registration successful');

        return redirect()->back();
    }

    public function showLoginForm()
    {
        $data = [];
        $data['site_title'] = 'LLC Blog';
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com',
        ];

        return view('login', $data);
    }

    public function processLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->except('_token');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Credentials incorrect');

        return redirect()->back();
    }

    public function showDashboard()
    {
        $data = [];
        $data['site_title'] = 'LLC Blog';
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'Youtube' => 'https://youtube.com',
            'LinkedIn' => 'https://linkedin.com',
        ];
        $data['user'] = auth()->user();

        return view('dashboard', $data);
    }

    public function logout()
    {
        auth()->logout();

        session()->flash('type', 'success');
        session()->flash('message', 'You have been logged out');

        return redirect()->route('login');
    }
}