<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Cart;

use App\Models\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\chiTietHD;
use App\Models\TrangThai;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::create($data);

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $data = category::all();
        return view('admin.product', compact('data'));
    }

    public function add_product(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:products',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('logos', 'public');
        }

        Product::create($data);

        return redirect()->back()->with('message', 'Thêm sản phẩm mới thành công!');
    }

    public function show_product()
    {
        $data = product::all();
        return view('admin.show_product', compact('data'));
    }

    public function update_product($id)
    {
        $data = product::find($id);
        $value = category::all();
        return view('admin.update_product', compact('data', 'value'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = product::find($id);

        $value = $request->validate([
            'title' => 'required|unique:products,title,' . $id,
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('logos', 'public');
        }

        $data->update($value);

        return redirect()->back()->with('message', 'Cập nhật sản phẩm thành công!');
    }

    public function delete_product($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Xóa sản phẩm thành công!');
    }

    public function add_hd()
    {
        $data = User::all();
        $index = TrangThai::all();
        return view('admin.add_hd', compact('data', 'index'));
    }

    // public function order()
    // {
    //     $order = Order::all();
    //     return view('admin.order', compact('order'));
    // }

    // public function delivery($id)
    // {
    //     $order = Order::find($id);
    //     $order->delivery_status = "delivered";
    //     $order->payment_status = "paid";

    //     $order->save();

    //     return redirect()->back();
    // }

    // public function send_email($id)
    // {
    //     $order = Order::find($id);
    //     return view('admin.email_info', compact('order'));
    // }

    // public function send_user_email(Request $request, $id)
    // {
    //     $order = Order::find($id);
    //     $details = [
    //         'greeting' => $request->greeting,
    //         'firstline' => $request->firstline,
    //         'body' => $request->body,
    //         'button' => $request->button,
    //         'url' => $request->url,
    //         'lastline' => $request->lastline
    //     ];

    //     Notification::send($order, new SendEmailNotification($details));

    //     return redirect()->back();
    // }

    public function view_status()
    {
        $data = TrangThai::all();
        return view('admin.view_status', compact('data'));
    }

    public function add_status(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:trang_thais',
        ]);

        TrangThai::create($data);

        return redirect()->back()->with('message', 'Status Added Successfully');
    }

    public function delete_status($id)
    {
        $data = TrangThai::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Status Deleted Successfully');
    }

    public function show_kh()
    {
        $data = User::where('usertype', 0)->get();

        return view('admin.show_kh', compact('data'));
    }

    public function show_nv()
    {
        $data = User::whereIn('usertype', [1, 2])->get();
        return view('admin.show_nv', compact('data'));
    }

    public function delete_user($id)
    {
        $data = User::find($id);
        if ($data->usertype == 1 && User::where('usertype', 1)->count() == 1)
            return redirect()->back()->with('message', 'Hãy thêm một admin khác trước khi xóa');
        $data->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }

    public function view_cart()
    {
        $data = Cart::all();

        return view('admin.show_cart', compact('data'));
    }

    public function delete_gh($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Cart Deleted Successfully');
    }

    public function show_hd()
    {
        $data = Order::all();
        return view('admin.show_hd', compact('data'));
    }

    public function delete_hd($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Deleted Successfully');
    }

    public function show_cthd()
    {
        $data = chiTietHD::all();
        return view('admin.show_cthd', compact('data'));
    }

    public function delete_cthd($id)
    {
        $data = chiTietHD::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Detail Deleted Successfully');
    }

    public function add_hoadon(Request $request)
    {
        $data = $request->validate([
            'ngaydat' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'tongtien' => 'required',
            'user_id' => 'required',
            'trangthai_id' => 'required',
            'payment_status' => 'required',
        ]);

        Order::create($data);

        return redirect()->back()->with('message', 'Thêm Hóa Đơn Thành Công');
    }

    public function update_hoadon($id)
    {
        $data = Order::find($id);
        $value = User::all();
        $index = TrangThai::all();
        return view('admin.update_hd', compact('data', 'value', 'index'));
    }

    public function edit_hoadon(Request $request, $id)
    {
        $data = Order::find($id);

        $value = $request->validate([
            'ngaydat' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'tongtien' => 'required',
            'user_id' => 'required',
            'trangthai_id' => 'required',
            'payment_status' => 'required',
        ]);

        $data->update($value);

        return redirect()->back()->with('message', 'Cập Nhật Hóa Đơn Thành Công');
    }

    public function add_cthd()
    {
        $data = Order::all();
        $index = Product::all();
        return view('admin.add_cthd', compact('data', 'index'));
    }

    public function add_cthoadon(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required',
            'hoadon_id' => 'required',
            'Product_id' => 'required',

        ]);

        $product = Product::find($data['Product_id']);
        $data['price'] = $data['quantity'] * $product->price;

        chiTietHD::create($data);

        return redirect()->back()->with('message', 'Thêm Chi Tiết Hóa Đơn Thành Công');
    }

    public function update_cthoadon($id)
    {
        $data = chiTietHD::find($id);
        $value = Order::all();
        $index = Product::all();
        return view('admin.update_cthd', compact('data', 'value', 'index'));
    }

    public function edit_cthoadon(Request $request, $id)
    {
        $data = chiTietHD::find($id);

        $value = $request->validate([
            'quantity' => 'required',
            'hoadon_id' => 'required',
            'Product_id' => 'required',
        ]);

        $product = Product::find($value['Product_id']);
        $value['price'] = $value['quantity'] * $product->price;

        $data->update($value);

        return redirect()->back()->with('message', 'Cập Nhật Hóa Đơn Thành Công');
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function create_user(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'usertype' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->back()->with('message', 'Thêm User Thành Công');
    }

    public function update_user($id)
    {
        $data = User::find($id);
        return view('admin.update_user', compact('data'));
    }

    public function edit_user(Request $request, $id)
    {
        $data = User::find($id);

        $value = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($data)],
            'usertype' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        $value['password'] = bcrypt($value['password']);

        $data->update($value);

        return redirect()->back()->with('message', 'Cập Nhập User Thành Công');
    }

    public function detail_hoadon($id)
    {
        $data = chiTietHD::where('hoadon_id', $id)->get();
        return view('admin.detail_hoadon', compact('data'));
    }

    public function baocao(Request $request)
    {
        if ($request->baocao != null) {
            $oldvalue = $request->baocao;
            $item = Order::all();
            $value = Order::where([['id', '=', $request->baocao], ['payment_status', 'like', '%Đã thanh toán%']])->get();
            if($value->count() > 0) {
                $data = chiTietHD::where('hoadon_id', '=', $request->baocao)->get();
                return view('admin.baocao', compact('value', 'data', 'item', 'oldvalue'));
            }
            return view('admin.baocao', compact('value', 'item', 'oldvalue'))->with('message', 'Không có hóa đơn đã thanh toán ứng với mã hóa đơn này');
        } else {
            $item = Order::all();
            return view('admin.baocao', compact('item'));
        }
    }

    public function khue()
    {
        return view('admin.khue');
    }

    
    public function thongtincanhan()
    {
        return view('admin.thongtincanhan');
    }
}