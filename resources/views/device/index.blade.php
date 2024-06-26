<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Device Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
        </div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center search-device">
                    <div class="col-md-8 col-lg-6 col-xl-5 p-0">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="">View Device Info</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('device.device_details') }}" method="POST"
                                        onsubmit="handleContinue()">
                                        @csrf
                                        <div class="mb-2">
                                            <input type="text" class="form-control" id=""
                                                placeholder="Enter Device Serial Number" name="serial_number"
                                                value="{{ old('serial_number') }}">
                                            @error('serial_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <button class="btn btn-info w-100" type="submit"
                                                id="countinueBtn">Continue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if (Session::has('error'))
        <script>
            toastr.error('{{ Session::get('error') }}')
        </script>
    @endif

    <script>
        const handleContinue = () => {
            const continueBtn = document.getElementById('countinueBtn');
            continueBtn.setAttribute('disabled', true);
            continueBtn.innerHTML = "Loading...";
        }
    </script>
</body>

</html>
