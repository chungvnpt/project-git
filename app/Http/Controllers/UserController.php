<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Khai báo
        $data["status"] = 1;
        $data["error"] = "Thành công";
        $data["data"] = array();

        $all_user = User::all();
        if($all_user){
            $data["data"] = $all_user;
        }else{
            $data["status"] = 0;
            $data["error"] = "Không có thông tin tài khoản";
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Khai báo
        $data["status"] = 1;
        $data["error"] = "Thành công";
        $data["data"] = array();

        //Nhận dữ liệu từ client
        $req = $request->all();
        $req = json_encode($req);
        $req = json_decode($req,true);

        //Xử lý dữ liệu
        $insert = new User();
        $insert["name"] = $req["name"];
        $insert["password"] = $req["password"];
        $insert["email"] = $req["email"];
        $insert["phone"] = $req["phone"];
        $insert["address"] = $req["address"];
        $insert["marital_status"] = $req["marital_status"];
        $insert["avatar"] = $req["avatar"];
        $insert["album"] = $req["album"];
        $insert["gold"] = $req["gold"];
        $insert["type"] = $req["type"];
        $insert->save();

        if($insert->id){
            $data["data"] = $insert;
        }else{
            $data["status"] = 0;
            $data["error"] = "Khởi tạo tài khoản không thành công !";
        }
        return $data;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data["status"] = 1;
        $data["error"] = "Thành công";
        $data["data"] = array();
        if($id){
            $user = User::find($id);
            if($user){
                $data["data"] = $user;
            }else{
                $data["status"] = 0;
                $data["error"] = "Không tồn tại thông tin tài khoản !";
            }
        }else{
            $data["status"] = 0;
            $data["error"] = "Chưa nhập id tài khoản !";
        }
        return ($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
