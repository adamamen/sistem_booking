<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
<style>
    .bodyall {
        padding: 0;
        margin: 0;
    }

</style>
<div class="bodyall">
    <div class="row justify-content-center">
        @if ($datasisa[0]['open'] == '0')
            <div class="col-6 align-self-center">
                <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                <div class="card card-inverse card-warning m-t-35">
                    <div class="card-header bg-white" style="font-size: 25px; align-self: center">Antrian</div>
                    <div class="card-block" style="text-align: center">
                        <p class="card-text" style="font-size: 26px">
                            Antrian Belum dimulai
                        </p>
                    </div>
                </div>
                <br>
            </div>
        @else
            <div class="col-6 align-self-center">
                <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                <div class="card card-inverse card-warning m-t-35">
                    <div class="card-header bg-white" style="font-size: 25px; align-self: center">Antrian</div>
                    <div class="card-block" style="text-align: center">
                        <p class="card-text" style="font-size: 30px">SEDANG BERKALAN ANTRIAN KE-</p>
                        <p class="card-text" style="font-size: 120px">
                            {{ $datasisa[0]['no_antrian'] }}/{{ count($dataall) }}
                        </p>
                        <div class="row">
                            <div class="col">
                                <p class="card-text" style="font-size: 20px">No Antrian:
                                <p class="card-text" style="font-size: 30px"> {{ $datasisa[0]['no_antrian'] }}</p>
                                </p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="font-size: 20px">Nama:
                                <p class="card-text" style="font-size: 30px"> {{ $datasisa[0]['nama'] }}</p>
                                </p>
                            </div>
                        </div>
                        @if ($datasisa[0]['no_antrian'] == $mydata[0]['no_antrian'])

                            <p class="card-text" style="font-size: 26px; color: chartreuse">
                                Giliran Anda!
                            </p>
                        @endif
                    </div>
                </div>
                <br>
            </div>
        @endif
    </div>
</div>
<script>
    setTimeout(function() {
        location.reload();
    }, 2000);

</script>
