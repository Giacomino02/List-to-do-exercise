<h3>Update Post</h3>
@if ($list != null)
    <form action="{{ route('list.update', $list) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="activity" placeholder="Activity" value="{{ $list->activity }}">
        <input type="checkbox" name="check" value="{{ $list->check }}">
        <input type="number" name="position" placeholder="Position" value="{{ $list->position }}">
        <button type="submit">Update List</button>
    </form>
@endif
