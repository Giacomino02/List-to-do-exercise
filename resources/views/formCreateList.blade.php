<form action="/list/" method="POST">
    @csrf
    <input type="text" name="activity" placeholder="Activity">
    <input type="checkbox" name="check">
    <input type="number" name="position" placeholder="Position">
    <button type="submit">Create List</button>
</form>