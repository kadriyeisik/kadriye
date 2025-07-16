 <?php
 namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogApiController extends Controller
{
    public function index()
    {
        return Blog::orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return Blog::findOrFail($id);
    }
}
