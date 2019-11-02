<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Mail\LeaveApplication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    protected static $folder = 'leave.';
    protected static $link = 'leave';
    protected static $mainTitle = 'Leaves';
    protected static $message = 'Recored created';

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
        return view(self::$folder . 'add')->withTitle(self::$mainTitle)->with('link', self::$link);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manger = User::where('role', 'manager')->first();
        $maxDurationDays = '20';

        $this->validate($request, [
            'duration_days' => 'required',
            'startDay' => 'required',

            'reason' => 'required',

        ]);
        $startDate = $request->startDay;
        $durationDay = $request->duration_days;
        $expectedEndDate = date('Y-m-d', strtotime($startDate . "+$durationDay days"));

        if ($request->duration_days > $maxDurationDays) {
            return back()->with([
                'flash_error' => 'The maximun duration days is 20days',
            ]);
        }
        $leave = new Leave();
        $leave->user_id = auth()->id();
        $leave->leave_start_day = $request->startDay;
        $leave->leave_end_day = $expectedEndDate;
        $leave->reason = $request->reason;
        $leave->status = 'pending';
        $leave->duration_days = $request->duration_days;
        $leave->save();
        Mail::to($manger->email)->send(new LeaveApplication($manger));
        return redirect('/home')->with([
            'flash_message' => self::$message,
        ]);

    }

    public function approve()
    {
        $leave = Leave::where('user_id', '!=', auth()->id())->get();
        return view(self::$folder . 'approve', compact('leave'));
    }

    public function approveRequest($id)
    {
        // $leave = Leave::find($id);
        Leave::where('id', $id)->update([
            'status' => 'Approved',
            'updated_at' => now(),
        ]);

        return back()->with([
            'flash_message' => 'Leave Approved Successfully',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
