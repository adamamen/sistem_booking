<div class="col-md-12">
    <form action="{{ route('booking.update', ['booking' => $data->id]) }}" method="post" class="login_validator">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label for="nama" class="col-form-label"> Nama</label>
            <div class="input-group">
                <span class="input-group-addon input_nama"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->nama }}" name="nama"
                    placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin" class="col-form-label"> Jenis Kelamin</label>
            <div class="input-group">
                <span class="input-group-addon input_jenis_kelamin"><i class="fa fa-money text-primary"></i></span>
                {{-- <input type="text" class="form-control  form-control-md" value="{{ $data->jenis_kelamin }}" name="jenis_kelamin" placeholder="jenis_kelamin" required> --}}
                <select name="jenis_kelamin" class="form-control" id="gender">
                    <option selected value="Pria" @if (old('gender') == 'Laki-laki') {{ 'selected' }} @endif>Laki-laki</option>
                    <option value="Perempuan" @if (old('gender') == 'Perempuan') {{ 'selected' }} @endif>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="umur" class="col-form-label"> Umur</label>
            <div class="input-group">
                <span class="input-group-addon input_umur"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->umur }}" name="umur"
                    placeholder="umur" required>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat" class="col-form-label"> Alamat</label>
            <div class="input-group">
                <span class="input-group-addon input_alamat"><i class="fa fa-money text-primary"></i></span>
                <input type="text" class="form-control  form-control-md" value="{{ $data->alamat }}" name="alamat"
                    placeholder="alamat" required>
            </div>
        </div>
        <div class="form-group">
            <label for="tanggal" class="col-form-label"> Tanggal</label>
            <div class="input-group">
                <span class="input-group-addon input_tanggal"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->tanggal }}" name="tanggal"
                    placeholder="tanggal" required>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Simpan</button>
    </form>
</div>
