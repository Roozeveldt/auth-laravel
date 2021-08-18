@extends('layouts.app')
@section('title', 'Forgot Password')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary mb-0">Forgot Password</h2>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" id="forgot_form">
                        @csrf
                        <div class="mb-3 text-secondary">
                            Enter your e-mail address and we will send you a link to reset your password.
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>                    
                        <div class="mb-3 d-grid">
                            <input type="submit" class="btn btn-dark rounded-0" value="Reset Password" id="forgot_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <p class="mb-0">Back to <a href="/" class="text-decoration-none">Login Page</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
