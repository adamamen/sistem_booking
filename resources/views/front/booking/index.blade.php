<link href="Bocor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datepicker/css/bootstrap-datepicker.min.css" />
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    body {
        background: #456;
        font-family: "Open Sans", sans-serif;
    }

    .login {
        width: 400px;
        margin: 16px auto;
        font-size: 16px;
    }

    /* Reset top and bottom margins from certain elements */
    .login-header,
    .login p {
        margin-top: 0;
        margin-bottom: 0;
    }

    /* The triangle form is achieved by a CSS hack */
    .login-triangle {
        width: 0;
        margin-right: auto;
        margin-left: auto;
        border: 12px solid transparent;
        border-bottom-color: #28d;
    }

    .login-header {
        background: #28d;
        padding: 20px;
        font-size: 1.4em;
        font-weight: normal;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
    }

    .login-container {
        background: #ebebeb;
        padding: 12px;
    }

    /* Every row inside .login-container is defined with p tags */
    .login p {
        padding: 12px;
    }

    .login input {
        box-sizing: border-box;
        display: block;
        width: 100%;
        border-width: 1px;
        border-style: solid;
        padding: 16px;
        outline: 0;
        font-family: inherit;
        font-size: 0.95em;
    }

    .login input[type="email"],
    .login input[type="password"] {
        background: #fff;
        border-color: #bbb;
        color: #555;
    }

    /* Text fields' focus effect */
    .login input[type="email"]:focus,
    .login input[type="password"]:focus {
        border-color: #888;
    }

    .login input[type="submit"] {
        background: #28d;
        border-color: transparent;
        color: #fff;
        cursor: pointer;
    }

    .login input[type="submit"]:hover {
        background: #17c;
    }

    /* Buttons' focus effect */
    .login input[type="submit"]:focus {
        border-color: #05a;
    }

</style>
@if (session('status'))
    <h2 class="login-header">{{ session('mssg') }}</h2>
@endif
@if (session('status1'))
    <h2 class="login-header">{{ session('mssg') . session('no') }} <br> <a style="color: white"
            href="{{ route('antrianc.index') }}"> Klik disini </a> Untuk masuk ke halaman antrian
    </h2>
@endif
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Booking</h2>

    <form class="login-container" action="{{ route('bookingc.post') }}" method="post">
        @csrf
        <p><input type="text" name="nama" placeholder="Nama" readonly
                value="{{ Auth::guard('client')->user()->name }}"></p>
        <p>
            <select class="form-control" name="jenis_kelamin">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </p>
        <input type="text" name="id_pasien" hidden value="{{ Auth::guard('client')->user()->id }}">
        <p><input type="text" name="umur" placeholder="Umur"></p>
        <p><input type="text" name="alamat" placeholder="Alamat"></p>
        <p><input type="text" name="tanggal" class="datepicker" readonly placeholder="tanggal"></p>
        <p><input type="submit" value="Simpan"></p>
    </form>
</div>

@if (session('error'))
    <script>
        alert('Error! Masukan data dengan benar')

    </script>
@endif
<script type="text/javascript" src="/tmpl_admin/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::To('/') }}/tmpl_admin/vendors/datepicker/js/bootstrap-datepicker.min.js">
</script>
<script>
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
        orientation: "top"
    });

</script>
