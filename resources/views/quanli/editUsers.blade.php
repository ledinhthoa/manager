@extends('index')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa users</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('quanli.update', $user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required></div>
                    <div class="form-group">
                        <label>email_verified_at</label>
                        <input type="text" class="form-control" name="email_verified_at" value="{{ $user->email_verified_at }}" >
                    </div>
                    <div class="form-group">
                                            <label>password</label>
                                            <input type="password" class="form-control" name="password" value="{{ $user->password }}" required></div>

                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
