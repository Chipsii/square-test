<form action="/charge" method="POST">
    <input type="text" name="_token" value="{{ csrf_token() }}">
    <button type="submit">Checkout</button>
</form>