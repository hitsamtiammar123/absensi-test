@if (session('status'))
@php
    $type = session('type');
    $s = '';
    $status = session('status');
    switch($type){
        case 'CREATE':
            $s = 'dibuat';
        break;
        case 'UPDATE':
            $s = 'diubah';
        break;
    }

@endphp
    @if ($status === 'SUCCESS')
        <p class="green">
            Data Berhasil {{$s}}
        </p>
    @elseif($status === 'FAILED')
        <p class="green">
            Terjadi kesalahan saat menambahkan data, mohon dicoba beberapa saat lagi
        </p>
    @endif
    <style>
        .green{
            color: green
        }
    </style>
@endif
