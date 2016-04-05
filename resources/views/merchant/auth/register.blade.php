<form method="POST" action="/merchant/register">
    {!! csrf_field() !!}
    <div>
        Nama
        <input type="nama" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        Alamat
        <input type="alamat" name="alamat" value="{{ old('alamat') }}">
    </div>

    <div>
        Telepon
        <input type="telepon" name="telepon" value="{{ old('telepon') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password2" id="password2">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>