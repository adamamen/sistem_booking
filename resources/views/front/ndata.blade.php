@forelse ($data as $datas)

    <div class="data">
        <div class="row">
            <div class="col-12 message-data">
                <strong>{{ $datas->name }}</strong>
                {{ $datas->descript }}
            </div>
        </div>
    </div>
@empty

@endforelse
