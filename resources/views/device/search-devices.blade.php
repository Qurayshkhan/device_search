@extends('layout.app')
@section('title', 'Searched Devices')
@section('content')
    <div class="container">
        <h1>Device Result's Select One To See Device Detail's</h1>
    </div>
    <div class="row">
        @foreach ($devices as $device)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-badge">
                            <img src="{{ asset('assets') }}/images/icon-1.png" alt="icon-1">
                            <div class="mt-4">
                                <h4 class="title">
                                    Serial
                                </h4>
                                <h5 class="value">{{ $device->serial_no }} ({{ $device->device_type }})</h5>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('device.device_detail', ['uuid' => $device->uuid]) }}"
                                title="Click Here To See The Device Detail">view details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
