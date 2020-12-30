@extends('layouts.homeLayout')

@section('content')
<div role="dialog" tabindex="-1" class="modal fade" id="avatarModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Avatar</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img type="button" class="ava" src="assets/img/avatars/bath-cat.jpg" style="height: 120px;width: 120;margin: 2px;" />
                <img type="button" class="ava" src="assets/img/avatars/pout-cat.jpg" style="width: 120px;margin: 2px;" />
                <img type="button" class="ava" src="assets/img/avatars/smolder-cat.jpg" style="width: 120px;margin: 2px;" />
                <img type="button" class="ava" src="assets/img/avatars/shocked-cat.jpg" style="width: 120px;margin: 2px;" />
                <img type="button" class="ava" src="assets/img/avatars/tiger-cat.jpg" style="width: 120px;margin: 2px;" />
                <img type="button" class="ava" src="assets/img/avatars/white-cat.jpg" style="width: 120px;margin: 2px;" />
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
        </div>
    </div>
</div>

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
                            <form method="POST" action="{{ route('user.update', auth()->user()->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Name</strong></label>
                                            <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email Address</strong></label>
                                            <input class="form-control" type="email" name="email" id="email" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input class="form-control" type="password" placeholder="" name="password" id="password" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection