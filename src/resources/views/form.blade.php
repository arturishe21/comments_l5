@if (Sentinel::check() || Config::get("comments.config.only_for_authorized_user") == false)

    <form id="reviews-form" name="comments_form">
        <div class="form__row">
            <label>Ваше имя</label>
            <input name="name" type="text" value="{{Sentinel::check() ? Sentinel::getUser()->first_name : ""}}">
        </div>
        <div class="form__row">
            <label>Комментарий</label>
            <textarea name="message"></textarea>
        </div>
        <div class="form__row">
            <button type="submit" class="submit__btn">Оставить отзыв</button>
        </div>
        <input type="hidden" name="id_page" value="{{$page->id}}">
        <input type="hidden" name="commentable" value="{{Crypt::encrypt(get_class($page))}}">
    </form>
    <script src="/packages/vis/comments/js/comments.js"></script>

@else
    <p style="text-align: center">Добавлять комментарии могут только <a href="#" data-reveal-id="login" style="text-decoration: underline">авторизованные пользователи</a></p>
@endif