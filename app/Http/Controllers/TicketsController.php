<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function getMiddleRank($prev = null, $next = null)
    {
        $base = 36;

        // convert rank → number
        $toNumber = function ($str) use ($base) {
            if (!$str)
                return null;
            return intval(base_convert($str, $base, 10));
        };

        // convert number → rank
        $toString = function ($num) use ($base) {
            return strtoupper(base_convert($num, 10, $base));
        };

        $prevNum = $toNumber($prev);
        $nextNum = $toNumber($next);

        // CASE 1: first item
        if ($prevNum === null && $nextNum === null) {
            return 'H'; // middle
        }

        // CASE 2: insert at top
        if ($prevNum === null) {
            return $toString($nextNum - 1);
        }

        // CASE 3: insert at bottom
        if ($nextNum === null) {
            return $toString($prevNum + 1);
        }

        // CASE 4: insert between
        if ($nextNum - $prevNum <= 1) {
            // fallback → expand space
            return $prev . 'H';
        }

        $mid = intval(($prevNum + $nextNum) / 2);

        return $toString($mid);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'board_area_id' => 'required',
            'priority_level' => 'required',
            'type' => 'required',
        ]);

        // Get last ticket in column by rank
        $lastTicket = Tickets::where('board_area_id', $request->board_area_id)
            ->orderBy('rank', 'desc')
            ->first();
        $rank = $this->getMiddleRank(
            $lastTicket?->rank,
            null
        );

        $ticket = Tickets::create([
            'title' => $request->title,
            'description' => $request->description,
            'board_area_id' => $request->board_area_id,
            'user_id' => auth()->id(),
            'priority_level' => $request->priority_level,
            'type' => $request->type,
            'rank' => $rank
        ]);

        return response()->json([
            'ticket' => $ticket,
            'status' => true
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        //
    }

    public function reorder(Request $request)
    {
        $newRank = $this->getMiddleRank(
            $request->prev_rank,
            $request->next_rank
        );

        Tickets::where('id', $request->ticket_id)
            ->update([
                'board_area_id' => $request->board_area_id,
                'rank' => $newRank
            ]);

        return response()->json(['status' => true]);
    }
}
