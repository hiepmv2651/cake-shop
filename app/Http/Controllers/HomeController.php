<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\chiTietHD;
use App\Models\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

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

            $previous_1sum_orders = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['payment_status', 'like', '%Đã thanh toán%']])->sum('tongtien');
            $previous_sum_orders = Order::where([['created_at', '<', $lastDayofMonth], ['payment_status', 'like', '%Đã thanh toán%']])->sum('tongtien');
            $now_sum_orders = Order::where([['created_at', '>=', $lastDayofMonth], ['payment_status', 'like', '%Đã thanh toán%']])->sum('tongtien');
            $sum_orders = Order::where('payment_status', 'like', '%Đã thanh toán%')->sum('tongtien');

            $previous_1devivered = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['trangthai_id', '=', '8']])->count();
            $previous_devivered = Order::where([['created_at', '<', $lastDayofMonth], ['trangthai_id', '=', '8']])->count();
            $now_devivered = Order::where([['created_at', '>=', $lastDayofMonth], ['trangthai_id', '=', '8']])->count();
            $total_devivered = Order::where('trangthai_id', '=', '8')->count();

            $previous_1processing = Order::where([['created_at', '<', $lastDayofMonth], ['created_at', '>=', $lastDayof2Month], ['trangthai_id', '=', '9']])->count();
            $previous_processing = Order::where([['created_at', '<', $lastDayofMonth], ['trangthai_id', '=', '9']])->count();
            $now_processing = Order::where([['created_at', '>=', $lastDayofMonth], ['trangthai_id', '=', '9']])->count();
            $total_processing = Order::where('trangthai_id', '=', '9')->count();

            return view('admin.home', compact(
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
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
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

    public function cash_order(Request $request)
    {
        $value = $request->get('ids');
        $user = Auth::user();

        $userId = $user->id;
        $data = DB::select('select * from carts where id in (' . implode(",", $value) . ') and user_id = ' . $userId);

        $order = new Order;
        $order->ngaydat = Carbon::now();

        $order->phone = $user->phone;
        $order->address = $user->address;
        $order->description = '';

        $order->user_id = $userId;
        $order->trangthai_id = 5;
        $order->tongtien = $request->thanhtoan;

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

        return redirect()->back()->with('message', 'We received your order successfully. We will connect with you soon.');
    }

    public function stripe(Request $request)
    {
        $totalprice = $request->thanhtoan;
        $data = implode(',', $request->get('ids'));

        if (Auth::id()) {
            return view('home.stripe', compact('totalprice', 'data'));
        } else {
            return redirect('login');
        }
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);

        $user = Auth::user();

        $userId = $user->id;
        $value = $request->data;
        $data = DB::select('select * from carts where id in (' . $value . ') and user_id = ' . $userId);

        $order = new Order;
        $order->ngaydat = Carbon::now();

        $order->phone = $user->phone;
        $order->address = $user->address;
        $order->description = '';

        $order->user_id = $userId;
        $order->trangthai_id = 5;
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

        return view('home.stripe');
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

    public function order_details($id)
    {
        $value = Order::find($id);
        return view('home.orders_detail', compact('value'));
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'You cancel the order';
        $order->save();

        return redirect()->back();
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