@extends('layout.app')
@section('title', 'Device Detail')
@section('content')
    <a href="{{ route('device.search_device') }}" title="Go Back"><i
            class="fa-solid fa-arrow-left text-navy-blue fs-1"></i></a>
    <div class="device-info-container">
        <h5>Device Info</h5>
        <div class="device-info-item mt-3">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-badge">
                                <img src="{{ asset('assets') }}/images/icon-1.png" alt="icon-1">

                                <div class="mt-4">
                                    <h4 class="title">
                                        Serial
                                    </h4>

                                    <h5 class="value">{{ $deviceInfo->device->serial ?? '-' }}
                                        ( {{ $deviceInfo->device->device_type ?? '-' }} )</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-badge">
                                <img src="{{ asset('assets') }}/images/icon-2.png" alt="icon-1">

                                <div class="mt-4">
                                    <h4 class="title">
                                        Software Version
                                    </h4>

                                    <h5 class="value">{{ $deviceInfo->device->app_version ?? '-' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-badge">
                                <img src="{{ asset('assets') }}/images/icon-3.png" alt="icon-1">

                                <div class="mt-4">
                                    <h4 class="title">
                                        Admin Link
                                    </h4>

                                    <h5 class="value-link">
                                        <a href="{{ $deviceInfo->device->admin_link }}"
                                            target="__blank">{{ $deviceInfo->device->admin_link ?? '-' }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="device-info-container">
        <h5>Network Information</h5>
        <div class="device-info-item mt-3">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-badge">
                                <img src="{{ asset('assets') }}/images/icon-4.png" alt="icon-1">

                                <div class="mt-4">
                                    <h4 class="title">
                                        Sim Provider
                                    </h4>
                                    <h5 class="value">{{ $deviceInfo->port->sim_provider ?? '-' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-badge">
                                <img src="{{ asset('assets') }}/images/icon-5.png" alt="icon-1">

                                <div class="mt-4">
                                    <h4 class="title">
                                        Primary Band & Signal Strength
                                    </h4>

                                    <h5 class="value">{{ $deviceInfo->port->pcc_band ?? '-' }}
                                        {{ $deviceInfo->port->pcc_strength ?? '-' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (isset($deviceInfo->port->scc_band_info) && count($deviceInfo->port->scc_band_info) > 0)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-badge">
                                    <img src="{{ asset('assets') }}/images/icon-5.png" alt="icon-1">

                                    <div class="mt-4">
                                        <h4 class="title">
                                            Secondary Band(s) & Signal Strength
                                        </h4>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="value">
                                                {{ $deviceInfo->port->scc_band_info[0]->band ?? '-' }}
                                                {{ $deviceInfo->port->scc_band_info[0]->strength ?? '-' }}
                                            </h5>

                                            <div class="btn-group dropstart">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">view
                                                    all</a>
                                                <ul class="dropdown-menu dropdown-menu-style">
                                                    @foreach ($deviceInfo->port->scc_band_info as $sccBanInfo)
                                                        <li><a class="dropdown-item"
                                                                href="#">{{ $sccBanInfo->band ?? '-' }}
                                                                {{ $sccBanInfo->strength ?? '-' }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (isset($deviceInfo->latest_speed_test_result->scc_band_info) &&
                        count($deviceInfo->latest_speed_test_result->scc_band_info) > 0)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-badge">
                                    <img src="{{ asset('assets') }}/images/icon-5.png" alt="icon-1">

                                    <div class="mt-4">
                                        <h4 class="title">
                                            Secondary Band(s) & Signal Strength
                                        </h4>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="value">
                                                {{ $deviceInfo->latest_speed_test_result->scc_band_info[0]->band ?? '-' }}
                                                {{ $deviceInfo->latest_speed_test_result->scc_band_info[0]->strength ?? '-' }}
                                            </h5>

                                            <div class="btn-group dropstart">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">view
                                                    all</a>
                                                <ul class="dropdown-menu dropdown-menu-style">
                                                    @foreach ($deviceInfo->latest_speed_test_result->scc_band_info as $sccBanInfo)
                                                        <li><a class="dropdown-item"
                                                                href="#">{{ $sccBanInfo->band ?? '-' }}
                                                                {{ $sccBanInfo->strength ?? '-' }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-badge">
                                    <img src="{{ asset('assets') }}/images/icon-5.png" alt="icon-1">

                                    <div class="mt-4">
                                        <h4 class="title">
                                            Secondary Band(s) & Signal Strength
                                        </h4>

                                        <h5 class="value">N/A</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="device-info-container">
        <div class="row">
            <div class="col-md-6">
                <h5>Usage Information</h5>
                <div class="device-info-item mt-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon-badge">
                                        <img src="{{ asset('assets') }}/images/icon-7.png" alt="icon-1">

                                        <div class="mt-4">
                                            <h4 class="title">
                                                Used Data (MB)
                                            </h4>

                                            <h5 class="value">
                                                {{ number_format($deviceInfo->device->useddata / 1024, 2, '.', '') ?? '-' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon-badge">
                                        <img src="{{ asset('assets') }}/images/icon-8.png" alt="icon-1">

                                        <div class="mt-4">
                                            <h4 class="title">
                                                Device Plan
                                            </h4>

                                            <h5 class="value">
                                                {{ $deviceInfo->device->deviceplan ?? '-' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Status Information</h5>
                <div class="device-info-item mt-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon-badge">
                                        <img src="{{ asset('assets') }}/images/icon-9.png" alt="icon-1">

                                        <div class="mt-4">
                                            <h4 class="title">
                                                Device Status
                                            </h4>

                                            <h5
                                                class="{{ $deviceInfo->device->status_formatted == 'Unreachable' ? 'value-error' : 'value-success' }}">
                                                {{ $deviceInfo->device->status_formatted ?? '-' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon-badge">
                                        <img src="{{ asset('assets') }}/images/icon-10.png" alt="icon-1">
                                        <div class="mt-4">
                                            <h4 class="title">
                                                Cloud connection status
                                            </h4>

                                            <h5
                                                class="{{ $deviceInfo->port->status_formatted == 'Not Present' ? 'value-error' : 'value-success' }} ">
                                                {{ $deviceInfo->port->status_formatted ?? '-' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
