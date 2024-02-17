<form action="/list/" method="POST">
    @csrf
    <input type="text" name="activity" placeholder="Activity">
    <input type="checkbox" name="check">
    <button type="submit">Create List</button>
</form>