@forelse ($data as $datas)

    <div class="data">
        <div class="row">
            <div class="col-12 ">
                <a class="message-data c-notif" data-id="{{ $datas->id }}">
                    <strong>{{ $datas->name }},</strong>
                    {{ $datas->descript }}
                </a>
            </div>
        </div>
    </div>
@empty

@endforelse

<script>
    $('.c-notif').click(function() {
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('delete.notif') }}",
            data: {
                id: id
            }
        }).then(function(data) {
            if (data) {
                if (data.flag == '0') {
                    window.location.href = "{{ route('antrianc.index') }}";
                } else {
                    window.location.href = "{{ route('bukti.index') }}";
                }
            }
        })
    });

</script>
