<div class="col-md-12">
    <form action="{{ route('pasien.update', ['pasien' => $data->id]) }}" method="post" class="login_validator">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label for="email" class="col-form-label"> Nama</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->name }}" name="nama"
                    placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Email</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="email" class="form-control  form-control-md" value="{{ $data->email }}" name="email"
                    placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Password *kosongkan jika tidak akan dirubah</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="password" class="form-control  form-control-md" value="" name="password"
                    placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Alamat</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="text" class="form-control  form-control-md" value="{{ $data->alamat }}" name="alamat"
                    placeholder="Alamat" required>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Simpan</button>
    </form>
</div>
