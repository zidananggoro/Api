<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Quote;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::get();

        return QuoteResource::collection($quotes);
    }

    public function show($id)
    {
        $quote = Quote::find($id);

        return new QuoteResource($quote);
    }

    public function update(Request $request, Quote $quote)
    {
        $quote->update([
            'message' => $request->message
        ]);

        return new QuoteResource($quote);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'message' => 'required',
        ]);
        $quote = Quote::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
        
        return new QuoteResource($quote);
    }
}
