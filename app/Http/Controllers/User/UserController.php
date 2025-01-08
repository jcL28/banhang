<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    // Danh sách khách hàng
    public function cusList()
    {
        $customers = User::where('type', 1)->get();  // type 1 là khách hàng

        return view('admin.manage.customer.list', compact('customers'));
    }

    // Danh sách nhân viên
    public function empList()
    {
        $employees = User::where('type', 2)->get();  // type 2 là nhân viên

        return view('admin.manage.employee.list', compact('employees'));
    }

    // Xóa khách hàng
    public function deleteCus($id)
    {
        $customer = User::findOrFail($id);

        $customer->delete();

        return redirect()->route('admin.customer.list')->with('success', 'Đã xóa khách hàng "' . $customer->name . '" thành công.');
    }

    // Chỉnh Sửa khách hàng
    public function editCus($id)
    {
        $customer = User::findOrFail($id);

        return view('admin.manage.customer.edit', compact('customer'));
    }

    public function postEditCus(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'type' => 'required|in:1,2', // Chỉ cho phép chọn '1' (customer) hoặc '2' (employee)
        ]);

        $typeNames = [
            1 => 'Khách Hàng', // 1 tương ứng với 'Khách Hàng'
            2 => 'Nhân Viên',  // 2 tương ứng với 'Nhân Viên'
        ];

        // Cập nhật loại tài khoản
        $customer->type = $request->type;
        $customer->save();

        // Lấy tên loại tài khoản sau khi cập nhật
        $typeName = $typeNames[$customer->type];

        return redirect()->route('admin.customer.list')
            ->with('success', 'Cập nhật loại tài khoản của "' . $customer->name . '" thành ' . $typeName . ' thành công.');
    }



    // Xóa nhân viên
    public function deleteEmp($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.manage.employee.list')->with('success', 'Đã xóa nhân viên "' . $employee->name . '" thành công.');
    }

    // Chỉnh Sửa nhân viên
    public function editEmp($id)
    {
        $employee = User::findOrFail($id);

        return view('admin.manage.employee.edit', compact('employee'));
    }

    public function postEditEmp(Request $request, $id)
    {
        $employee = User::findOrFail($id);

        $request->validate([
            'type' => 'required|in:1,2', // Chỉ cho phép chọn '1' (customer) hoặc '2' (employee)
        ]);

        $typeNames = [
            1 => 'Khách Hàng', // 1 tương ứng với 'Khách Hàng'
            2 => 'Nhân Viên',  // 2 tương ứng với 'Nhân Viên'
        ];

        // Cập nhật loại tài khoản
        $employee->type = $request->type;
        $employee->save();

        $typeName = $typeNames[$employee->type];

        return redirect()->route('admin.employee.list')
            ->with('success', 'Cập nhật loại tài khoản của "' . $employee->name . '" thành ' . $typeName . ' thành công.');
    }
}
