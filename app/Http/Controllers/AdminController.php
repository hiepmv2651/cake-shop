<?php

namespace App\Http\Controllers;

use Notification;
use Carbon\Carbon;

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
use Illuminate\Support\Facades\Storage;
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
        return redirect()->back()->with('message', 'Thêm danh mục thành công!');
    }

    public function update_category($id)
    {
        $data = category::find($id);
        $value = category::all();
        return view('admin.update_category', compact('data', 'value'));
    }

    public function edit_category(Request $request, $id)
    {
        $data = category::find($id);

        $value = $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $id,
        ]);

        $data->update($value);
        return redirect('view_category')->with('message', 'Cập nhật danh mục thành công!');
    }

    public function delete_category($id)
    {
        if (auth::user()->usertype == '1') {
            $data = category::find($id);
            Product::where('category', $data->category_name)->delete();
            $data->delete();
            return redirect()->back()->with('message', 'Xóa danh mục thành công!');
        }
        abort(403);
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

        return redirect('show_product')->with('message', 'Cập nhật sản phẩm thành công!');
    }

    public function delete_product($id)
    {
        if (auth::user()->usertype == '1') {
            $data = product::find($id);
            Storage::delete($data->image);
            $data->delete();
            chiTietHD::where('Product_id', $id)->delete();
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công!');
        }
        abort(403);
    }

    public function add_hd()
    {
        $data = User::all();
        $index = TrangThai::all();
        return view('admin.add_hd', compact('data', 'index'));
    }

    public function send_email($id)
    {
        $user = User::find($id);
        return view('admin.email_info', compact('user'));
    }

    public function send_user_email(Request $request, $id)
    {
        $user = User::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline
        ];

        Notification::send($user, new SendEmailNotification($details));

        return redirect()->back();
    }

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

        return redirect()->back()->with('message', 'Thêm trạng thái thành công!');
    }

    public function delete_status($id)
    {
        if (auth::user()->usertype == '1') {
            $data = TrangThai::find($id);
            Order::where('trangthai_id', $id)->delete();
            $data->delete();
            return redirect()->back()->with('message', 'Xóa thành công trạng thái!');
        }
        abort(403);
    }

    public function update_status($id)
    {
        $data = TrangThai::find($id);
        $value = TrangThai::all();
        return view('admin.update_status', compact('data', 'value'));
    }

    public function edit_status(Request $request, $id)
    {
        $data = TrangThai::find($id);

        $value = $request->validate([
            'name' => 'required|unique:trang_thais,name,' . $id,
        ]);

        $data->update($value);
        return redirect('view_status')->with('message', 'Cập nhật trạng thái thành công!');
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
        if (auth::user()->usertype == '1') {
            $data = User::find($id);
            if ($data->usertype == 1 && User::where('usertype', 1)->count() == 1)
                return redirect()->back()->with('message', 'Hãy thêm một admin khác trước khi xóa!');

            if (!is_null($data->profile_photo_path))
                Storage::delete($data->profile_photo_path);

            if (Order::where('user_id', $id)->count() > 0) {
                $orderId = Order::where('user_id', $id)->get();
                chiTietHD::where('hoadon_id', $orderId->id)->delete();
                Order::where('user_id', $id)->delete();
            }

            if (Cart::where('user_id', $id)->count() > 0) {
                Storage::delete(Cart::where('user_id', $id)->image);
                Cart::where('user_id', $id)->delete();
            }


            $data->delete();
            return redirect()->back()->with('message', 'Xóa thành công user!');
        }
        abort(403);
    }

    public function view_cart()
    {
        $data = Cart::all();

        return view('admin.show_cart', compact('data'));
    }

    public function delete_gh($id)
    {
        if (auth::user()->usertype == '1') {
            $data = Cart::find($id);
            Storage::delete($data->image);
            $data->delete();
            return redirect()->back()->with('message', 'Xóa giỏ hàng thành công!');
        }
        abort(403);
    }

    public function show_hd()
    {
        $data = Order::all();
        return view('admin.show_hd', compact('data'));
    }

    public function delete_hd($id)
    {
        if (auth::user()->usertype == '1') {
            $data = Order::find($id);
            chiTietHD::where('hoadon_id', $id)->delete();
            $data->delete();
            return redirect()->back()->with('message', 'Xóa đơn hàng thành công!');
        }
        abort(403);
    }

    public function show_cthd()
    {
        $data = chiTietHD::all();
        return view('admin.show_cthd', compact('data'));
    }

    public function delete_cthd($id)
    {
        if (auth::user()->usertype == '1') {
            $data = chiTietHD::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Xóa chi tiết đơn hàng thành công!');
        }
        abort(403);
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

        return redirect('show_hd')->with('message', 'Cập Nhật Hóa Đơn Thành Công');
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

        return redirect('show_cthd')->with('message', 'Cập Nhật Hóa Đơn Thành Công');
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
        if (auth::user()->usertype == '1') {
            $data = User::find($id);
            return view('admin.update_user', compact('data'));
        }
        abort(403);
    }

    public function edit_user(Request $request, $id)
    {
        if (auth::user()->usertype == '1') {
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
            if ($data->usertype == 0)
                return redirect('show_kh')->with('message', 'Cập Nhập Khách Hàng Thành Công');

            return redirect('show_nv')->with('message', 'Cập Nhập Nhân Viên Thành Công');
        }
        abort(403);
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
            $value = Order::where('id', '=', $request->baocao)->get();
            if ($value->count() > 0) {
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

    public function thongke()
    {
        $lastDayofMonth = Carbon::now()->startOfMonth()->toDateString();
        $lastDayof2Month = Carbon::now()->startOfMonth()->subMonth(1);

        $previous_products = Product::where('created_at', '<', $lastDayofMonth)->count();
        $previous_1products = Product::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month]])->count();
        $now_products = Product::where('created_at', '>=', $lastDayofMonth)->count();
        $total_products = Product::all()->count();

        $previous_orders = Order::where('created_at', '<', $lastDayofMonth)->count();
        $previous_1orders = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month]])->count();
        $now_orders = Order::where('created_at', '>=', $lastDayofMonth)->count();
        $total_orders = Order::all()->count();

        $previous_users = User::where([['created_at', '<', $lastDayofMonth], ['usertype', '=', 0]])->count();
        $previous_1users = User::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['usertype', '=', 0]])->count();
        $now_users = User::where([['created_at', '>=', $lastDayofMonth], ['usertype', '=', 0]])->count();
        $total_users = User::all()->where('usertype', '=', 0)->count();

        $previous_1sum_orders = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['payment_status', 'like', '%đã thanh toán%']])->sum('tongtien');
        $previous_sum_orders = Order::where([['created_at', '<', $lastDayofMonth], ['payment_status', 'like', '%đã thanh toán%']])->sum('tongtien');
        $now_sum_orders = Order::where([['created_at', '>=', $lastDayofMonth], ['payment_status', 'like', '%đã thanh toán%']])->sum('tongtien');
        $sum_orders = Order::where('payment_status', 'like', '%đã thanh toán%')->sum('tongtien');

        $previous_1devivered = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['trangthai_id', '=', '4']])->count();
        $previous_devivered = Order::where([['created_at', '<', $lastDayofMonth], ['trangthai_id', '=', '4']])->count();
        $now_devivered = Order::where([['created_at', '>=', $lastDayofMonth], ['trangthai_id', '=', '4']])->count();
        $total_devivered = Order::where('trangthai_id', '=', '4')->count();

        $previous_1processing = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['trangthai_id', '=', '5']])->count();
        $previous_processing = Order::where([['created_at', '<', $lastDayofMonth], ['trangthai_id', '=', '5']])->count();
        $now_processing = Order::where([['created_at', '>=', $lastDayofMonth], ['trangthai_id', '=', '5']])->count();
        $total_processing = Order::where('trangthai_id', '=', '5')->count();

        return view('admin.thongke', compact(
            'total_products',
            'previous_products',
            'now_products',
            'previous_1products',

            'total_users',
            'previous_users',
            'now_users',
            'previous_1users',

            'previous_orders',
            'total_orders',
            'now_orders',
            'previous_1orders',

            'previous_sum_orders',
            'sum_orders',
            'now_sum_orders',
            'previous_1sum_orders',

            'previous_devivered',
            'total_devivered',
            'now_devivered',
            'previous_1devivered',

            'previous_processing',
            'total_processing',
            'now_processing',
            'previous_1processing'
        ));
    }
}