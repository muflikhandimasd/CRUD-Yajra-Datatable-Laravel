<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostNoAjaxController extends Controller
{
    public function index()
    {

        $posts =  Post::orderBy("id", "desc")->paginate(5);

        return view("posts.no_ajax_index", compact("posts"));
    }


    // Create Post
    public function create()
    {

        return view("posts.no_ajax_create");
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $file->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }


    public function store(Request $request)
    {

        $data = [
            "title"  =>  $request->title,
            "description" => $request->description
        ];

        Post::create($data);

        return back()->with("success", "Post has been created");
    }
}
