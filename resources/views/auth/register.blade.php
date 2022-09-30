@extends('layouts.app')

@section('content')
    <div>
        <h1>Create a Multi-Step Form Using HTML, CSS, and JavaScript</h1>
        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <h2 class="fs-title">Personal Information</h2>
                    </a>
                </li>

                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Social Profiles</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Personal Details</div>
                    </a>
                </li>
            </ul>
            <!-- Step Wise Form Content -->
            <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal">Personal Basic Details</h2>
                    <!-- Step 1 input fields -->
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-12 col-xl-11">
                                <div class="card text-black" style="border-radius: 25px;">
                                    <div class="card-body p-md-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="fname">First Name</label>
                                                        <input type="text" id="fname" name="fname"
                                                            class="form-control" value="{{ old('fname') }}" />
                                                    </div>
                                                </div>
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="lname">Last Name</label>
                                                        <input type="text" id="lname" name="lname"
                                                            class="form-control" value="{{ old('lname') }}" />
                                                    </div>
                                                </div>
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="email">Your
                                                            Email</label>
                                                        <input type="text" id="email" name="email"
                                                            class="form-control" value="{{ old('email') }}" />
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="image">Upload Your Pic
                                                        </label>
                                                        <input type="file" id="image" name="image"
                                                            class="form-control" value="{{ old('image') }}" />
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="mobile">Mobile
                                                        </label>
                                                        <div class="form-group mt-2 d-inline-block">
                                                            +<input class="border-end country-code px-2" value="91"
                                                                name="country_code" disabled>
                                                            <input type="text" class="form-control" id="ec-mobile-number"
                                                                aria-describedby="emailHelp" placeholder="91257888"
                                                                name="mobile" value="{{ old('mobile') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror


                                            </div>
                                            <div
                                                class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                                    class="img-fluid" alt="Sample image">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h2 class="font-normal">Social Profiles</h2>
                    <!-- Step 2 input fields -->
                    <div class="mt-3">
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-12 col-xl-11">
                                    <div class="card text-black" style="border-radius: 25px;">
                                        <div class="card-body p-md-5">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="address">Address</label>
                                                            <input type="text" id="address" name="address"
                                                                class="form-control" value="{{ old('address') }}" />
                                                        </div>
                                                    </div>
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="country">Country</label>
                                                            <input type="text" id="country" name="country"
                                                                class="form-control" value="{{ old('country') }}" />
                                                        </div>
                                                    </div>
                                                    @error('country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="state">State</label>
                                                            <input type="text" id="state" name="state"
                                                                class="form-control" value="{{ old('state') }}" />
                                                        </div>
                                                    </div>
                                                    @error('state')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="city">City</label>
                                                            <input type="text" id="city" name="city"
                                                                class="form-control" value="{{ old('city') }}" />
                                                        </div>
                                                    </div>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div
                                                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                                        class="img-fluid" alt="Sample image">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                    <h2 class="font-normal">Personal Details</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-12 col-xl-11">
                                    <div class="card text-black" style="border-radius: 25px;">
                                        <div class="card-body p-md-5">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="passowrd">Password</label>
                                                            <input type="password" id="password" name="password"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="cpassowrd">Repeat
                                                                your
                                                                password</label>
                                                            <input type="password" id="cpassword" name="cpassword"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                    @error('cpassword')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div
                                                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                                        class="img-fluid" alt="Sample image">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                        <button class="button submit-btn" type="submit">Save</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/register.js') }}"></script>
@endpush
