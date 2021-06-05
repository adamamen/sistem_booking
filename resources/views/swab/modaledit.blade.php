<div class="col-md-12">
    <form action="{{ route('swab.update', ['swab' => $data->id]) }}" method="post" class="login_validator">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label for="email" class="col-form-label"> Hasil</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->hasil }}" name="hasil"
                    placeholder="Nama" required>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Simpan</button>
    </form>
</div>
