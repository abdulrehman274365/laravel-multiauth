<?php

namespace App\Http\Controllers;

use App\Models\BoardArea;
use Illuminate\Http\Request;
use App\Services\ActivityLogger;


class BoardAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workspace = session()->get('workspace');
        $board_areas = BoardArea::with([
            'tickets' => function ($query) {
                $query->orderBy('rank', 'asc'); // lowest → highest
            }
        ])
            ->where('workspace_id', $workspace->id)
            ->orderBy('area_order', 'asc')
            ->get();
        return view('workspaces.v1.Board.v1.index', compact('board_areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workspace = session()->get('workspace');
        $last_board = BoardArea::where('workspace_id', $workspace->id)->orderBy('area_order', 'desc')->first();
        return view('workspaces.v1.Board.v1.create', compact('last_board'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function hexToRgbString($hex)
    {
        $hex = str_replace('#', '', $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
            $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
            $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return "$r,$g,$b";
    }
    public function store(Request $request)
    {

        $newBoardArea = BoardArea::create([
            'area_name' => $request->area_name,
            'workspace_id' => $request->workspace_id,
            'user_id' => $request->user_id,
            'area_order' => $request->area_order,
            'status' => 1,
            'done_stage' => $request->done_stage ?? 0,
            'background_color' => $this->hexToRgbString($request->background_color)
        ]);
        ActivityLogger::store([
            'model' => 'BoardArea',
            'log_title' => 'Board Area Created',
            'function' => 'createBoardArea',
            'user_log' => 'You created a new board area: ' . $newBoardArea->area_name,
            'owner_log' => auth()->user()->name . ' created a new board area ID (' . $newBoardArea->id . ').',
            'general_log' => 'User ID (' . auth()->user()->id . ') created a new board area ID (' . $newBoardArea->id . ').',
            'log_icon' => 'ri-building-2-line',
            'log_style' => [
                'color' => '#0dcaf0',
                'backgroundColor' => '#cff4fc',
            ],
        ]);

        return redirect()->route('board.index')->with('success', 'Board created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardArea  $boardArea
     * @return \Illuminate\Http\Response
     */
    public function show(BoardArea $boardArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardArea  $boardArea
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardArea $boardArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardArea  $boardArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoardArea $boardArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardArea  $boardArea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $column = BoardArea::findOrFail($id);
            $column->delete();
            ActivityLogger::store([
                'model' => 'BoardArea',
                'log_title' => 'Board Area Deleted',
                'function' => 'deleteBoardArea',
                'user_log' => 'You deleted a board area: ' . $column->area_name,
                'owner_log' => auth()->user()->name . ' deleted a board area ID (' . $column->id . ').',
                'general_log' => 'User ID (' . auth()->user()->id . ') deleted a board area ID (' . $column->id . ').',
                'log_icon' => 'ri-building-2-line',
                'log_style' => [
                    'color' => '#860309',
                    'backgroundColor' => '#cff4fc',
                ],
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Column deleted successfully'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Failed to delete column'
            ], 500);
        }
    }
}
