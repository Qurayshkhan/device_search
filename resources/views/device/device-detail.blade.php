<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
</head>

<body>
    <section>
        <div class="container p-5">
            <div class="device-detail-container">
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
                            @if (count($deviceInfo->port->scc_band_info) > 0)
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
                                                    <img src="{{ asset('assets') }}/images/icon-7.png"
                                                        alt="icon-1">

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
                                                    <img src="{{ asset('assets') }}/images/icon-8.png"
                                                        alt="icon-1">

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
                                                    <img src="{{ asset('assets') }}/images/icon-9.png"
                                                        alt="icon-1">

                                                    <div class="mt-4">
                                                        <h4 class="title">
                                                            Device Status
                                                        </h4>

                                                        <h5 class="value-success">
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
                                                    <img src="{{ asset('assets') }}/images/icon-10.png"
                                                        alt="icon-1">
                                                    <div class="mt-4">
                                                        <h4 class="title">
                                                            Cloud connection status
                                                        </h4>

                                                        <h5 class="value-success">
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
            </div>
        </div>
    </section>

    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
