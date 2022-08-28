<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
