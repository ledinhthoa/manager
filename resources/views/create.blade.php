@extends('index')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    @if(count($errors)>0)
                    						<div class="alert alert-danger">
                    							@foreach($errors->all() as $err)
                    							{{$err}}
                    							@endforeach
                    						</div>
                    					@endif
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày sinh</label>
                        <input type="date" class="form-control" name="dob" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                    </div>
               <div class="form-group">
                                         <label>Tỉnh thành</label>
                                         <select class="form-control" name="city_id">
                                             @foreach($cities as $city)
                                             <option value="{{ $city->id }}">{{ $city->name }}</option>
                                             @endforeach
                                         </select>
                                     </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
