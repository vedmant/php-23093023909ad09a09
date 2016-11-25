<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cleaner;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Submit new booking request
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBook(Request $request)
    {
        $this->validate($request, [
            'city'         => 'required|exists:cities,id',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'phone_number' => 'required',
            'date'         => 'required|date',
            //'time'         => 'required', // TODO
            //'hours'        => 'required', // TODO
        ]);

        $customer = Customer::where('phone_number', $request->get('phone_number'))->first();

        if ( ! $customer) {
            $customer = Customer::create($request->only('first_name', 'last_name', 'phone_number'));
        } else {
            $customer->update($request->only('first_name', 'last_name'));
        }

        $cleaner = Cleaner::whereHas('cities', function ($query) use ($request) {
                $query->where('cities.id', '=', $request->get('city'));
            })
            ->whereHas('bookings', function ($query) use ($request) {
                $query->where('bookings.date', '=', $request->get('date'));
            }, '=', 0)->first();

        if ($cleaner) {
            $booking = Booking::create([
                'date'        => Carbon::parse($request->get('date'))->toDateString(),
                'customer_id' => $customer->id,
                'cleaner_id'  => $cleaner->id,
            ]);

            session(['booking' => $booking]);
            return redirect('/booked');
        }

        return redirect()->back()->withErrors('Sorry, there is no free cleaners for that day')->withInput();;
    }

    /**
     * Show booking successfull page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function booked()
    {
        return view('booked', ['booking' => session('booking')]);
    }
}
