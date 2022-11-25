<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\Cart;

use App\Models\Order;
use App\Models\Product;
use App\Models\chiTietHD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public $show = false;
    //TODO: Trang chu
    public function index()
    {
        $product = Product::paginate(6);
        return view('home.userpage', compact('product'));
    }

    //TODO: Trang ca nha
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1' || $usertype == '2') {
            $mytime = now()->format('d');
            $lastDayofMonth = Carbon::now()->startOfMonth()->toDateString();
            $lastDayof2Month = Carbon::now()->startOfMonth()->subMonth(1);

            $dtngay = Order::whereDate('created_at', Carbon::today())->sum('tongtien');

            $dhngay = Order::whereDate('created_at', Carbon::today())->where('trangthai_id', '1')->count();

            $now_sum_orders = Order::where([['created_at', '>=', $lastDayofMonth], ['payment_status', 'like', '%đã thanh toán%']])->sum('tongtien');

            $now_don_duyet = Order::where([['created_at', '>=', $lastDayofMonth], ['trangthai_id', '2'], ['payment_status', 'like', '%đã thanh toán%']])->sum('tongtien');;

            return view('admin.home', compact(
                'dtngay',
                'dhngay',
                'now_sum_orders',
                'now_don_duyet',
            ));
        } else {
            $product = Product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }

    public function products_detail($id)
    {
        $value = Product::find($id);
        return view('home.products_detail', compact('value'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            if (Cart::where('user_id', $userId)->count() > 10) {
                Alert::warning('Đã đạt giới hạn của giỏ hàng!', 'Hãy xóa để thêm sản phẩm mới.');
                return redirect()->back();
            }

            $product = Product::find($id);

            $product_exist_id = Cart::where('Product_id', $id)->where('user_id', $userId)->get('id')->first();

            if ($product_exist_id) {
                $cart = Cart::find($product_exist_id)->first();
                $cart->quantity += $request->quantity;
                if ($cart->quantity > 20) {
                    Alert::warning('Hãy thanh toán để tiếp tục', 'Nếu bạn thêm thì số lượng bánh đã vượt 20');
                    return redirect()->back();
                }

                $cart->price = $product->price * $cart->quantity;
                $cart->save();

                Alert::success('Sản phẩm thêm thành công', 'Chúng tôi đã thêm sản phẩm của bạn vào giỏ hàng');

                return redirect()->back();
            } else {
                $cart = new Cart();

                $cart->user_id = $user->id;
                $cart->price = $product->price * $request->quantity;
                $cart->Product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->image = $product->image;

                $cart->save();
                Alert::success('Sản phẩm thêm thành công', 'Chúng tôi đã thêm sản phẩm của bạn vào giỏ hàng');

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $show = $this->show;
            $id = Auth::user()->id;
            $cart = Cart::orderBy('id', 'ASC')->where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart', 'show'));
        } else {
            return redirect('login');
        }
    }

    public function delete_cart($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function delete_select(Request $request)
    {

        $data = $request->get('ids');

        DB::delete('delete from carts where id in (' . implode(",", $data) . ')');
        return redirect()->back();
    }

    public function capnhat_cart($id, Request $request, $quantity)
    {
        $data = Cart::find($id);
        $data->price = $data->price / $data->quantity * $request->quantity[$quantity];
        $data->quantity = $request->quantity[$quantity];
        $data->save();

        return redirect()->back()->with('message', 'Cập Nhập Số Lượng Sản Phẩm Thành Công');
    }

    public function cash_order(Request $request)
    {
        if (is_null($request->address) || is_null($request->phone)) {
            Alert::warning('Thiếu thông tin', 'Vui lòng nhập đủ số điện thoại và địa chỉ.');
            return redirect()->back();
        }

        $value = $request->get('ids');

        $user = Auth::user();

        $userId = $user->id;
        $data = DB::select('select * from carts where id in (' . implode(",", $value) . ') and user_id = ' . $userId);

        $order = new Order;
        $order->phone = $request->phone;

        $order->address = $request->address;
        $order->ngaydat = Carbon::now();

        $order->description = '';

        $order->user_id = $userId;
        $order->trangthai_id = 1;


        $order->payment_status = 'Chưa thanh toán';
        $order->save();


        foreach ($data as $data) {
            $cthd = new chiTietHD;
            $cthd->price = $data->price;

            $cthd->quantity = $data->quantity;
            $cthd->hoadon_id = json_decode(Order::where('user_id', $userId)->get('id')->last())->id;
            $cthd->Product_id = $data->Product_id;

            $cthd->save();

            $cartId = $data->id;
            $cart = cart::find($cartId);

            $cart->delete();
        }
        $id1 = json_decode(Order::where('user_id', $userId)->get('id')->last())->id;
        $order1 = Order::find($id1);
        $order1->tongtien = chiTietHD::where('hoadon_id', $id1)->sum('price');
        $order1->save();


        return redirect('show_order')->with('message', 'Cảm ơn bạn, chúng tôi sẽ liên hệ đến bạn trong thời gian sớm nhất');
    }

    public function stripe(Request $request)
    {
        if (is_null($request->address) || is_null($request->phone)) {
            Alert::warning('Thiếu thông tin', 'Vui lòng nhập đủ số điện thoại và địa chỉ.');
            return redirect()->back();
        }
        $totalprice = $request->thanhtoan;
        $data = implode(',', $request->get('ids'));
        $address = $request->address;
        $phone = $request->phone;

        if (Auth::id()) {
            return view('home.stripe', compact('totalprice', 'data', 'address', 'phone'));
        } else {
            return redirect('login');
        }
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice,
            "currency" => "vnd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);

        $user = Auth::user();

        $userId = $user->id;
        $value = $request->data;
        $data = DB::select('select * from carts where id in (' . $value . ') and user_id = ' . $userId);

        $order = new Order;
        $order->ngaydat = Carbon::now();

        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->description = '';

        $order->user_id = $userId;
        $order->trangthai_id = 1;
        $order->tongtien = $totalprice;

        $order->payment_status = 'Đã thanh toán';

        $order->save();

        foreach ($data as $data) {
            $cthd = new chiTietHD;
            $cthd->price = $data->price;

            $cthd->quantity = $data->quantity;
            $cthd->hoadon_id = json_decode(Order::where('user_id', $userId)->get('id')->last())->id;
            $cthd->Product_id = $data->Product_id;

            $cthd->save();

            $cartId = $data->id;
            $cart = cart::find($cartId);

            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return redirect('show_order')->with('message', 'Cảm ơn bạn, chúng tôi sẽ liên hệ đến bạn trong thời gian sớm nhất');
    }

    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $order = Order::where('user_id', $userId)->latest()->get();
            return view('home.order', compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function history_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $history = Order::where([['user_id', $userId], ['trangthai_id', 4], ['payment_status', 'like', '%đã thanh toán%']])->latest()->get();

            return view('home.history_order', compact('history'));
        } else {
            return redirect('login');
        }
    }

    public function order_details($id)
    {
        $orderde = chiTietHD::where('hoadon_id', $id)->get();
        return view('home.orders_detail', compact('orderde'));
    }

    public function product_search(Request $request)
    {
        $search_text = $request->search;
        $product = Product::where('title', 'like', "%$search_text%")
            ->orwhere('category', 'like', "%$search_text%")
            ->paginate(10);
        return view('home.userpage', compact('product'));
    }

    public function product()
    {
        $product = Product::paginate(6);
        return view('home.all_product', compact('product'));
    }

    public function search_product(Request $request)
    {
        $search_text = $request->search;
        $product = Product::where('title', 'like', "%$search_text%")
            ->orwhere('category', 'like', "%$search_text%")
            ->paginate(10);
        return view('home.all_product', compact('product'));
    }

    public function lienhe()
    {
        return view('home.lienhe');
    }
}