<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Replie;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showcomment($productId)
    {
        $product = Product::find($productId);
        $comments = Comment::where('product_id', $productId)
            ->get();

        $colors = Color::all();
        $sizes = Size::all();

        return view('products.comments')->with(['product' => $product, 'comments' => $comments, 'colors' => $colors, 'sizes' => $sizes]);
    }

    public function storecomment(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        Comment::create([
            'content' => $request->input('content'),
            'review_day' => now(),
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        return redirect()->route('products.show', $productId)->with('success', 'Comment added successfully');
    }

    public function replycoment(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        if (Auth::user()->is_admin) {
            Replie::create([
                'content' => $request->input('content'),
                'review_day' => now(),
                'user_id' => auth()->id(),
                'comment_id' => $commentId,
            ]);

            return redirect()->back()->with('success', 'Reply added successfully');
        } else {
            return redirect()->back()->with('error', 'Only admins can reply to comments');
        }
    }

    public function destroycomment($commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment) {
            // Kiểm tra xem người dùng có phải là chủ nhân của comment không
            if (Auth::check() && Auth::user()->id == $comment->user_id || Auth::user()->is_admin) {
                $comment->delete();
                return redirect()->back();
            } 
        }
    }
    public function destroyreply($replyId)
    {
        $reply = Replie::find($replyId);

        if ($reply) {
            // Kiểm tra xem người dùng có phải là chủ nhân của reply hay là admin không
            if (Auth::user()->id == $reply->user_id || Auth::user()->is_admin) {
                $reply->delete();
                return redirect()->back();
            } 
        }
    }

}
