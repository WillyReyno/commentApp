<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(array(
            'author' => 'Willy Reyno',
            'text'   => 'First.'
        ));

        Comment::create(array(
            'author' => 'Amélie Van Waerbeke',
            'text'   => 'Currently writing the next Game of Thrones volume, do not disturb.'
        ));

        Comment::create(array(
            'author' => 'Alexandre Tobia',
            'text'   => 'Zigounette Pipi, Zigounette Pipi !'
        ));
    }

}
 