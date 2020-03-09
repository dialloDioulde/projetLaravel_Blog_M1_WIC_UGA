<?php

namespace App\Http\Controllers;

use App\posts;
use App\User;
use foo\bar;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = posts::all();
        return view('admin.articles', ['articles' => $article]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.createArticles');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'post_content' => ['required'],
            'post_title' => ['required'],
            'post_status' => ['required'],
            'post_name' => ['required'],
            'post_type' => ['required'],
            'post_category' => ['required'],
        ]);

        auth()->user()->posts()->create([
            'post_content' => $data['post_content'],
            'post_title' => $data['post_title'],
            'post_status' => $data['post_status'],
            'post_name' => $data['post_name'],
            'post_type' => $data['post_type'],
            'post_category' => $data['post_category'],
        ]);

        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(posts $id)
    {

        //return view('admin.articles', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $article)
    {

        return view('admin/edit', compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(posts $article)
    {
        $data = request()->validate([
            'post_content' => ['required'],
            'post_title' => ['required'],
            'post_status' => ['required'],
            'post_name' => ['required'],
            'post_type' => ['required'],
            'post_category' => ['required'],
        ]);

        $article->update($data);
        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $article)
    {
        $article->delete();
        return redirect('admin/articles');
    }
}
