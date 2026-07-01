<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::latest()->get();

        return view(
            'cards.index',
            compact('cards')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'uid'=>'required|unique:cards',

            'owner_name'=>'required|max:100',

            'owner_type'=>'required',

            'expired_at'=>'nullable|date',

        ]);

        Card::create($validated);

        return back()->with(
            'success',
            'Card berhasil ditambahkan.'
        );
    }
    public function edit(Card $card)
    {
        return view(
            'cards.edit',
            compact('card')
        );
    }

    public function update(
        Request $request,
        Card $card
    )
    {
        $validated = $request->validate([

            'owner_name'=>'required',

            'owner_type'=>'required',

            'expired_at'=>'nullable|date',

            'status'=>'required|boolean',

        ]);

        $card->update($validated);

        return redirect()
            ->route('cards.index')
            ->with(
                'success',
                'Card berhasil diperbarui.'
            );
    }
    public function destroy(Card $card)
    {
        $card->delete();

        return back()->with(
            'success',
            'Card berhasil dihapus.'
        );
    }
    public function toggle(Card $card)
    {
        $card->update([

            'status'=>!$card->status

        ]);

        return back();
    }
}
