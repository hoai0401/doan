@extends('products.layoutcomment')

@section('content')
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
    

    @foreach($comments as $comment)
        <div class="comment">
          
            <p>Sản Phẩm: {{ $product->name  }}</p>
            <p>Nguời Đã Comment: {{ $comment->user->name}}</p>
            <p>{{ $comment->content }}</p>
            <p> {{ $comment->user->name }} đăng vào ngày: {{ $comment->review_day }}</p>
            <p>
            <form id="delete-comment-form-{{ $comment->id }}" action="{{ route('comments.destroy', ['commentId' => $comment->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" >Xóa Bình Luận</button>
            </form>
        </p>    
                @if(Auth::check())
                    @if(Auth::user()->is_admin)
                        <form action="{{ route('comment.reply', ['id' => $comment->id]) }}" method="post">
                            @csrf
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control" required></textarea>
                            <button type="submit">Reply</button>
                        </form>
                    @else
                    
                @endif
            @else
            @endif
            
            <!-- Hiển thị danh sách replies -->
            @if($comment->replies->count() > 0)
            <ul class="reply-list">
                @foreach($comment->replies as $reply)
                    <li>
                        
                        <p>{{ $reply->content }}</p>
                        <p>Trả lời {{ Auth::user()->name }} vào {{ $reply->review_day }}</p>
                        <p>
                        <form id="delete-reply-form-{{ $reply->id }}" action="{{ route('replies.destroy', ['replyId' => $reply->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa Reply</button>
                        </form>
                        </p>
             
                    </li>
                @endforeach
            </ul>
        @endif
        
        </div>
    @endforeach
@endsection
