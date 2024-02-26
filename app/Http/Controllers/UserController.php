<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\PrintfulOrder;


class UserController extends Controller
{
	public function register(Request $request)
    {
        // Validate the incoming request with proper rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:8'
        ]);

        // Create a new user instance
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Optionally, you might want to automatically log in the user after registration
        // Auth::login($user);

        // Redirect to a success page or login page

        auth()->login($user);
        return redirect()->route('my_account')->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('my_account')->with('success', 'Login successful.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to home or login page after logout
        return redirect()->route('login');
    }

    public function product_slug(){
        // Retrieve all products
        $products = Products::all();

        // Array to keep track of existing slugs
        $existingSlugs = [];

        // Iterate through products
        foreach ($products as $product) {
            $originalSlug = $product->product_slug;
            $newSlug = $originalSlug;

            // Ensure uniqueness by appending a number if needed
            $counter = 1;
            while (in_array($newSlug, $existingSlugs)) {
                $newSlug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Update the product's slug and save changes
            $product->product_slug = $newSlug;
            $product->save();

            // Add the new slug to the existing slugs array
            $existingSlugs[] = $newSlug;
            
            // You might want to avoid duplicate slugs in the same batch:
            // $existingSlugs[] = $product->product_slug;
            
            // Or consider validating uniqueness of $existingSlugs before adding
            // $existingSlugs[] = $newSlug;
        }

        // Display the updated products
        foreach ($products as $product) {
            echo "Product Name: {$product->name} - Updated Slug: {$product->product_slug}\n";
        }
    }
    public function storeOrder(Request $request)
    {

        try {
            $_request = json_decode($request->getContent());
            $order = new PrintfulOrder();
            $order->printful_order_data = $_request->printful_order_data;
            $order->product_id = $_request->product_id;
            $order->payment_id = $request->payment_id;
            $order->printful_order_id = json_decode($_request->printful_order_data,true)['id'];
            $order->customer_email = json_decode($_request->printful_order_data,true)['recipient']['email'];

            if (auth()->check()) {
                $order->user_id = auth()->user()->id;
            }

            $order->save();
            return response($order)
                ->header('Content-Type', 'text/json');
        } catch (\Exception $e) {
            // Handling the exception
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(), // Retrieve the error message
                    'code' => $e->getCode(), // Retrieve the error code
                ]
            ], 500); // Internal Server Error status code
        }
    }
}
