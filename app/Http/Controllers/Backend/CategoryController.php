<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
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
        $data['categories'] = Category::select('id', 'name', 'slug', 'status')->paginate(10);

        return view('backend.category.index', $data);
    }

    public function create()
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

        return view('backend.category.create', $data);
    }

    public function store(Request $request)
    {
        // validation
        $rules = [
            'name' => 'required|unique:categories,name',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // database insert
        Category::create([
            'name' => trim($request->input('name')),
            'slug' => str_slug(trim($request->input('name'))),
            'status' => $request->input('status'),
        ]);

        // redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Category added');

        return redirect()->back();
    }

    public function show($id)
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
        $data['category'] = Category::with('posts', 'posts.user')->select('id', 'name', 'slug', 'status', 'created_at')->find($id);

        return view('backend.category.show', $data);
    }

    public function edit($id)
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
        $data['category'] = Category::select('id', 'name', 'slug', 'status', 'created_at')->find($id);

        return view('backend.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        // validation
        $rules = [
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // database update
        $category = Category::find($id);
        $category->update([
            'name' => trim($request->input('name')),
            'slug' => str_slug(trim($request->input('name'))),
            'status' => $request->input('status'),
        ]);

        // redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Category updated');

        return redirect()->back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        // redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Category deleted');

        return redirect()->route('categories.index');
    }
}
