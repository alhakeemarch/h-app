@if ($user->is_active)
<form action="{{route('user.update',$user)}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="activate_user">
    <button type="submit" class="btn btn-link text-success m-0 p-0" title="deactivate user">
        <i class="fas fa-toggle-on"></i></button>
</form>
@else
<form action="{{route('user.update',$user)}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="activate_user">
    <button type="submit" class="btn btn-link text-muted m-0 p-0" title="activate user">
        <i class="fas fa-toggle-off"></i></button>
</form>
@endif