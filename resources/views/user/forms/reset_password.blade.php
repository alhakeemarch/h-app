<form action="{{route('user.update',$user)}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="reset_password">
    <button type="submit" class="btn btn-link text-danger m-0 p-0" title="reset password">
        <i class="fas fa-retweet"></i></button>
</form>