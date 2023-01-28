<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function add()
    {
        $htmlOptionRole = $this->getRole('');
        $htmlOptionTrangThai = $this->getTrangThai('');
        return view('admin.user.add_user', compact('htmlOptionRole', 'htmlOptionTrangThai'));
    }

    public function all()
    {
        $users = $this->user->simplePaginate(5);
        return view('admin.user.all_user', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //Insert user
            $dataUserCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => '$2y$10$ofGJ35Cv5IBkVtGw8hkhe.0zhnWfbtzEjP.0yCna3A6WXh//yUyCu',
                'sdt' => $request->sdt,
                'ngay_sinh' => $request->ngay_sinh,
                'dia_chi' => $request->dia_chi,
                'trang_thai' => $request->trang_thai,
            ];
            $this->user->create($dataUserCreate);

            DB::commit();
            return redirect()->route('user.all');
        } catch (\Throwable\Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . "Line: " . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'done'

            ], 200);
        } catch (Exception $e) {
            Log::error("Message: " . $exception->getMessage() . "Line: " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'

            ], 500);
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $htmlOptionRole = $this->getRole($user->role);
        $htmlOptionTrangThai = $this->getTrangThai($user->trang_thai);
        return view('admin.user.edit_user', compact('user', 'htmlOptionRole', 'htmlOptionTrangThai'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //Update user
            $dataUserUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'sdt' => $request->sdt,
                'ngay_sinh' => $request->ngay_sinh,
                'dia_chi' => $request->dia_chi,
                'trang_thai' => $request->trang_thai,
            ];
            $this->user->find($id)->update($dataUserUpdate);
            
            DB::commit();
            return redirect()->route('user.all');
        } catch (\Throwable\Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . "Line: " . $exception->getLine());
        }
    }

    public function getRole($user_role) {
        $htmlOption = '';
        $roles = ['USER', 'ADMIN'];
        foreach ($roles as $role) {
            if($user_role == $role) {
                $htmlOption .= "<option selected value=\"" . $role . "\" >" . $role . "</option>";
            } else {
                $htmlOption .= "<option value=\"" . $role . "\" >" . $role . "</option>";
            } 
        }
        return $htmlOption;
    }

    public function getTrangThai($user_trang_thai) {
        $htmlOption = '';
        $trang_thais = ['hoat_dong', 'khoa'];
        foreach ($trang_thais as $trang_thai) {
            if ($trang_thai == 'hoat_dong') {
                $display = 'Hoạt động';
            } else {
                $display = 'Khóa';
            }
            
            if($user_trang_thai == $trang_thai) {
                $htmlOption .= "<option selected value=\"" . $trang_thai . "\" >" .$display . "</option>";
            } else {
                $htmlOption .= "<option value=\"" . $trang_thai . "\" >" . $display . "</option>";
            } 
        }
        return $htmlOption;
    }
}
