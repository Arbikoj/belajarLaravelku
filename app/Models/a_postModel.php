<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class a_postModel extends Model
{
   public function dataMhs()
   {

    return [
            [
                'nip'   => '1234',
                'nama'  => 'ani',
                'kampus'=> 'EEPIS'
            ],
            [
                'nip'   => '1234',
                'nama'  => 'arbi',
                'kampus'=> 'ITS'
            ],
        ];
   }
// ambil semua row/data
   public function allDataPost()
   {
        return DB::table('posts')->get();
   }
//ambil single row/data
   public function detailPost($id)
   {
        return DB::table('posts')->where('id', $id)->first();
   }

   public function addPost($dataPost)
   {
        DB::table('posts')->insert($dataPost);
   }
 
}
