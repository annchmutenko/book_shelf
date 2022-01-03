<?php


namespace App\Http\Controllers\Api;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BookController
{
    protected Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if(!$query)
            return response()->json(['result' => []]);
        $books = Book::query()->where('title', 'like', '%'.$query.'%')->limit(5)->get();
        return response()->json(['result' => BookResource::collection($books)]);
    }

    public function addToCart(Request $request, User $user)
    {
        $book = $request->book;
        if(!$book)
            abort(404);
        try {
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $book,
            ]);
        } catch (QueryException $exception) {
            return response()->json('Already exists');
        }
        return response()->json('ok');
    }

    public function deleteFromCart(Request $request, Cart $cart)
    {
        $cart->delete();
        return response()->json('ok');
    }
}
