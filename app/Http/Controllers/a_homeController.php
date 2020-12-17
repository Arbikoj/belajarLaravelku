<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\a_postModel;
use Illuminate\Support\Facades\DB;

class a_homeController extends Controller
{
    //memanggil data
    public function __construct()
    {
        $this->a_postModel = new a_postModel();
    }

    public function index()
    {

        return view('a_home');
    }

    public function post()
    {
        // memanggil data
            $dataku = [
            'posts'  => $this->a_postModel-> allDataPost(),
        ];

        return view('a_post', $dataku);
    }

    public function detailPost($id)
    {
        $dataku = [
            'posts'  => $this->a_postModel->detailPost($id),
        ];

        return view('a_detailPost', $dataku);
    }

    public function category()
    {
        return view('a_category');
    }
    
    public function add()
    {
        return view('a_addPost');
    }
    //validasi
    public function addPost()
    {
        // request()->validate([
        //     'post_title' => 'required|unique:posts,post_title|min:10|max:100',
        //     'post_article' => 'required',
        //     'post_date' => 'required',
        //     'post_images' => 'required|mimes:jpg,jpeg,bmp,png|max:2040',
        //     'post_category' => 'required',
        // ],[
        //     'post_title.required' => 'wajid diisi',
        //     'post_title.unique' => 'judul sudah ada',
        //     'post_article.required' => 'wajid diisi',
        //     'post_date.required' => 'wajid diisi',
        //     'post_images.required' => 'wajid diisi',
        //     'post_category.required' => 'wajid diisi',
        // ]);

        //upload thumbnail
    // $images = request()->post_images;
    // $nama_images = request()->id.'.'. $images->extension(); //rename
    // $images = move(path, target);
    // $request->file('key')->move(public_path('img_thumbnail'), $nama_images);

    $dataPost = [
        'post_title'        =>request()->post_title,
        'post_article'        =>request()->post_article,
        'post_date'        => request()->post_date,
        'post_images'        => 'j',
        'post_category'        => request()->post_category,
    ];

        DB::table('posts')->insert($dataPost);
        // $this -> a_postModel -> addPost($dataPost);
        return redirect()->route('admin.post')->with('pesan','data berhasil ditambahkan');


    }
}
