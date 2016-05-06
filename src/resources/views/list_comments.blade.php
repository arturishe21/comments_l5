<div class="all_comments_show">
    @if(count($comments)>0)
        <label><a href="javascript:;">{{count($comments)}} комментарий</a></label>
        <div class="comment_item">
            <table>
                @foreach($comments as $comment)
                    <div class="reviews__item">
                        <div class="reviews__author">{{$comment->name}}</div>
                        <div class="reviews__comment">
                            <p>{{$comment->message}}</p>
                        </div>
                    </div
                @endforeach
            </table>
        </div>
    @else
        <div style="text-align: center; padding: 50px 0">Пока нет комментариев</div>
    @endif

</div>
