@extends('index')
@section('title', 'Danh sách khách hàng')
@section('content')
  <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                   @if(Auth::check())
                   					@else
                   						<li><a href="{{route('register')}}">Đăng kí</a></li>
                   						<li><a href="{{route('login')}}">Đăng nhập</a></li>
                   					@endif
                </ul>
            </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
                 @if(isset($totalCustomerFilter))
                                      <span class="text-muted">
                                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                                </span>
                              @endif

                              @if(isset($cityFilter))
                                   <div class="pl-5">
                                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                       {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                                      </div>
                              @endif
            </div>
            <div class="col-6">

              <form class="navbar-form navbar-left" action="{{ route('customers.search') }}" method="post">

                @csrf

                  <div class="row">

                      <div class="col-8">

                          <div class="form-group">

                              <input type="text" name='keyword' class="form-control" placeholder="Search">

                          </div>

                      </div>

                      <div class="col-4">

                          <button type="submit" class="btn btn-default">Tìm kiếm</button>

                      </div>

                  </div>

              </form>

            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Email</th>
                     <th scope="col">Tỉnh thành</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->city->name }}</td>
                            <td><a href="{{ route('customers.edit', $customer->id) }}">sửa</a></td>
                            <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
        </div>
<div></br></div>
    </div>
<div> <a class="btn btn-primary" href="{{ route('customers.filterByCity') }}">loc khach hang</a></div>
<div></br></div>
   {{ $customers->appends(request()->query()) }}
@endsection

