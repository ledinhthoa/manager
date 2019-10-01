<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::with('city')->paginate(3);

        $cities = City::all();

        return view('list', compact('customers', 'cities'));
    }
    public function create(){
        $cities = City::all();
        return view('create', compact('cities'));
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email|unique:customer,email',
                'name'=>'required'|'',
                'dob'=>'required',

            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.unique'=>'Email đã có người sử dụng',
                'email.email'=>'Email không đúng định dạng',
                'name.required'=>'name ko duoc de trong',
                'dob.required'=>'date ko duoc de trong',
                'dob.date'=>'ngay phai theo ding dang'

            ]
        );
        $customer = new Customer();
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function edit($id){
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('edit', compact('customer', 'cities'));
    }


    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }
    public function filter(){
        $cities = City::all();
        return view('filterbycity', compact('cities'));
    }
    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }
    public function search(Request $request)

    {
        $keyword = $request->input('keyword');
        $customers = Customer::where('name', 'like', '%'.$keyword .'%')->get();
      //  var_dump($customers);
       return view('search', compact('customers'));


    }
}
