@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                        href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                        aria-selected="true">Change Password</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel"
                    aria-labelledby="register-tab">
                    <div class="register-form">
                        <form method="POST" action="{{ route('update_password') }}" name="register-form"
                            class="needs-validation" novalidate="">
                            @csrf
                            <div class="pb-3"></div>
                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                    class="form-control form-control_gray @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required="" autocomplete="email">
                                <label for="email">Email *</label>
                                @error('email')
                                    <span class="invalid-feeback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pb-3"></div>
                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                    class="form-control form-control_gray @error('password') is-invalid @enderror"
                                    name="old_password" autocomplete="new-password">
                                <label for="old_password">Old Password *</label>
                                @error('old_password')
                                    <span class="invalid-feeback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password"
                                    class="form-control form-control_gray @error('password-confirm') is-invalid @enderror"
                                    name="new_password" autocomplete="new-password">
                                <label for="new_password">New Password *</label>
                                @error('new_password')
                                    <span class="invalid-feeback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password"
                                    class="form-control form-control_gray @error('password-confirm') is-invalid @enderror"
                                    name="confirm_new_password" autocomplete="new-password">
                                <label for="password">New Confirm Password *</label>
                                @error('confirm_password')
                                    <span class="invalid-feeback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Change Password</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">Have an account?</span>
                                <a href="{{ route('login') }}" class="js-show-register">Login to your Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
