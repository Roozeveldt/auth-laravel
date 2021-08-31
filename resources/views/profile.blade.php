@extends('layouts.app')
@section('title', 'Profile Page')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary fw-bold">User Profile</h2>
                    <a href="{{ route('auth.logout') }}" class="btn btn-dark">Logout</a>
                </div>
                <div class="card-body p-5">
                    <div id="profile_alert"></div>
                    <div class="row">
                        <div class="col-lg-4 px-5 text-center" style="border-right: 1px solid #999;">
                            @if ($userInfo->picture)
                            <img src="storage/images/{{ $userInfo->picture }}" id="image_preview"
                                class="img-fluid rounded-circle img-thumbnail" width="200" alt="{{ $userInfo->name }}">
                            @else
                            <img src="{{ asset('img/profile.jpg') }}" id="image_preview"
                                class="img-fluid rounded-circle img-thumbnail" width="200" alt="">
                            @endif
                            <div>
                                <label for="picture">Change profile picture</label>
                                <input type="file" name="picture" id="picture" class="form-control rounded-pill">
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $userInfo->id }}">
                        <div class="col-lg-8 px-5">
                            <form action="#" method="POST" id="profile_form">
                                @csrf
                                <div class="my-2">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control rounded-0"
                                        value="{{ $userInfo->name }}">
                                </div>
                                <div class="my-2">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control rounded-0"
                                        value="{{ $userInfo->email }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-select rounded-0">
                                            <option value="" selected disabled>-Select-</option>
                                            <option value="Male" {{ $userInfo->gender == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ $userInfo->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control rounded-0"
                                            value="{{ $userInfo->dob }}">
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control rounded-0"
                                        value="{{ $userInfo->phone }}">
                                </div>
                                <div class="my-4">
                                    <input type="submit" value="Update Profile"
                                        class="btn btn-primary rounded-0 float-end" id="profile_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('#picture').on('change', function(evt) {
            const file = evt.target.files[0];
            const url = window.URL.createObjectURL(file); // blob:http://auth-laravel.local/8006e24f-4b5c-4af8-9332-87622e7df98b
            $('#image_preview').attr('src', url);
            
            let fd = new FormData();
            fd.append('picture', file);
            fd.append('user_id', $('#user_id').val());
            fd.append('_token', '{{ csrf_token() }}');
            
            $.ajax({
                url: '{{ route('profile.image') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if(response.status === 200) {
                        $('#profile_alert').html(showMessage('success', response.messages));
                        $('#picture').val('');
                    }
                },
            });
        });
        $('#profile_form').on('submit', function(evt) {
            evt.preventDefault();
            const id = $('#user_id').val();
            $('#profile_btn').val('Updating...');
            
            $.ajax({
                url: '{{ route('profile.update') }}',
                method: 'post',
                data: $(this).serialize() + `&id=${id}`,
                dataType: 'json',
                success: function(response) {
                    if(response.status === 200) {
                        $('#profile_alert').html(showMessage('success', response.messages));
                        $('#profile_btn').val('Update Profile');
                    }
                },
            });
        });
    });
</script>
@endsection