@extends('layouts.homeLayout')

@section('content')
<div role="dialog" tabindex="-1" class="modal fade" id="avatarModal">
<form method="POST" action="{{ route('user.updateAvatar', auth()->user()->id) }}" enctype="multipart/form-data">
@csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Avatar</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="text-align: center;">
            <!-- AVATARS -->
                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/bath-cat.jpg" checked>
                    <img src="assets/img/avatars/bath-cat.jpg" class="pic-style">
                </label>

                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/pout-cat.jpg">
                    <img src="assets/img/avatars/pout-cat.jpg" class="pic-style">
                </label>

                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/smolder-cat.jpg" checked>
                    <img src="assets/img/avatars/smolder-cat.jpg" class="pic-style">
                </label>

                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/shocked-cat.jpg">
                    <img src="assets/img/avatars/shocked-cat.jpg" class="pic-style">
                </label>

                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/tiger-cat.jpg" checked>
                    <img src="assets/img/avatars/tiger-cat.jpg" class="pic-style">
                </label>

                <label class="ava">
                    <input class="hide-radio" type="radio" name="avatar" value="/assets/img/avatars/white-cat.jpg">
                    <img src="assets/img/avatars/white-cat.jpg" class="pic-style">
                </label>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="submit" value="Save" data-dismiss="modal">Close</button><button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</form>
</div>

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: rgb(214, 0, 0)">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ Auth::user()->photo }}" width="160" height="160">
                    <div class="mb-3">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#avatarModal" type="button">Select Avatar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Name<span style="color: red"> *</span></strong></label>
                                            <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ Auth::user()->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email Address<span style="color: red"> *</span></strong></label>
                                            <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>Password<span style="color: red"> *</span></strong></label>
                                            <input class="form-control" type="password" placeholder="" name="password" id="password" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>New password</strong></label>
                                            <input class="form-control" type="password" placeholder="" name="newpassword" id="newpassword" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Retype new password</strong></label>
                                            <input class="form-control" type="password" placeholder="" name="confnewpassword" id="confnewpassword" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
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