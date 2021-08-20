@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary mb-0">Register</h2>
                </div>
                <div class="card-body p-4">
                    <div id="show_success_alert"></div>
                    <form action="#" method="POST" id="register_form">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control rounded-0"
                                placeholder="Full Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0"
                                placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0"
                                placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0"
                                placeholder="Confirm Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" class="btn btn-dark rounded-0" value="Register" id="register_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <p class="mb-0">Already have an account? <a href="/" class="text-decoration-none">Login
                                    Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('#register_form').on('submit', function(evt) {
            evt.preventDefault();
            $('#register_btn').val('Please Wait...');
            $.ajax({
                url: '{{ route('auth.register') }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.status === 400) {
                        showError('name', res.messages.name);
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        showError('cpassword', res.messages.cpassword);
                        $('#register_btn').val('Register');
                    } else if (res.status === 200) {
                        $('#show_success_alert').html(showMessage('success', res.messages));
                        $('#register_form')[0].reset();
                        removeValidationClasses('#register_form');
                        $('#register_btn').val('Register');
                    }
                },
            });
        });
    });
</script>
@endsection
