@extends('template.front.main')
@section('content')
<section class="pt-5 pb-5" data-bg-image="/assets/front/image/Sangita/Sangita.jpg">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-body py-5 px-sm-5">
                        <h3>Register New Account</h3>
                        <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                        @csrf
                        <form id="form1" class="form-validate mt-5">
                            <div class="h5 mb-4">Account details</div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control" name="password" placeholder="Enter password" type="text" required="">
                                        <span class="input-group-text"><i class="icon-eye" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password2">Confirm Password</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control" name="password2" placeholder="Enter password" type="password" required="">
                                        <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your Name" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Enter your Surname" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select class="form-select" name="gender" required="">
                                            <option value="">Select your gender</option>
                                            <option value = "Famale">Female</option>
                                            <option value = "Male">Male</option>
                                            <option value = "Rather not say">Rather not say</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Date of Birth</label>
                                    <input class="form-control" type="date" name="dateofbirth" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter your Street Address" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telephone">Telephone</label>
                                    <input class="form-control" type="tel" name="telephone" placeholder="Enter your Telephone number" required="">
                                </div>
                            </div>
                            <div class="form-check mb-1 mt-5">
                                <input type="checkbox" name="reminders" id="reminders" class="form-check-input" value="1" required="">
                                <label class="form-check-label" for="reminders">Send me occasional
                                            reminders
                                            about these settings</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="terms_conditions" id="terms_conditions" class="form-check-input" value="1" required="">
                                <label class="form-check-label" for="terms_conditions">By checking
                                            this
                                            option, you agree to acceot with the <a href="#">Terms and
                                                Conditions</a>.</label>
                            </div>
                            <button type="submit" class="btn m-t-30 mt-3">Submit</button>
                        </form>
                        <div class="mt-4"><small>Already have an acocunt?</small> <a href="{{route('login')}}" class="small fw-bold">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection