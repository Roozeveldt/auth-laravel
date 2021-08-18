@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary mb-0">Login</h2>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" id="login_form">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a href="/forgot" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" class="btn btn-dark rounded-0" value="Login" id="login_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <p class="mb-0">Don't have an account? <a href="/register" class="text-decoration-none">Register Here</a></p>
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