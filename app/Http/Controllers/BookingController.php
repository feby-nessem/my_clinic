<?php

namespace App\Http\Controllers;
use App\Models\appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Vtiful\Kernel\Format;
class BookingController extends Controller
{
    public function index()
    {
        $appointments = appointment::all();
        return view('all_bookings',compact('appointments'));
    }
    public function create(Request $request)
    {
    $date = $request->appointment_date ?? session('appointment_date'); ;
    $allTimes = [
        '16:00:00' => '4:00 pM',
        '17:00:00' => '5:00 PM',
        '18:00:00' => '6:00 PM',
        '19:00:00' => '7:00 PM',
    ];
    $bookedTimes =[];
    if ($date)
    {
      $bookedTimes= appointment::whereDate('appointment_datetime', $date)
      ->pluck('appointment_datetime')
      ->map(fn($t) =>Carbon::parse($t)->format('H:i:s'))
      ->toArray();
    }
    return view('booking', ['date' => $date , 'allTimes' => $allTimes, 'bookedTimes' => $bookedTimes]);
    }
  public function store(Request $request)
  {
   $request->validate([
      'name' => 'required|string|max:255',
      'phone' => 'required|string|max:11',
      'appointment_date' => 'required|date',
      'appointment_time' => 'required',
    ],
    [
      'name.required' => 'الرجاء ادخال الاسم',
      'phone.required' => 'الرجاء ادخال رقم الهاتف',
      'appointment_date.required' => 'الرجاء ادخال تاريخ الموعد',
      'appointment_time.required' => 'الرجاء ادخال وقت الموعد',
    ]);

    $appointmentDateTime = Carbon::parse(
      $request->appointment_date  . ' ' . $request->appointment_time

    );
    if ( appointment::where('appointment_datetime', $appointmentDateTime)
        ->exists()
    ) {
      return redirect()->route('booking.create')
      ->with([
        'error' => 'هذا الموعد محجوز بالفعل. الرجاء اختيار وقت آخر.',
        'appointment_date' => $request->appointment_date,
      ]);
    }
     appointment::create([
      'name' => $request->name,
      'phone' => $request->phone,
      'appointment_datetime' => $appointmentDateTime,
    ]);
    $appointments = appointment::all();
    return redirect()->route('booking.index', compact('appointments'));
  }
    public function show()
    {
        $appointments = appointment::all();
     return view("all_bookings",compact('appointments'));
    }
    public function destroy ($id)
    {
        $appointment = appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back();
    }
    public function edit ($id)
    {
    $times = [
      '15:00:00' => '3:00 PM',
      '16:00:00' => '4:00 PM',
      '17:00:00' => '5:00 PM',
      '18:00:00' => '6:00 PM',
    ];
    $appointment = appointment::findOrFail($id);
    //  $appointment->appointment_time = Carbon::parse($appointment->appointment_time)->format('g:i A');
      return view('edit_booking',compact('appointment','times'));

    }
    public function update (request $request,$id)
    {

    $name = $request->name;
    $phone = $request->phone;
    $appointment_date = $request->appointment_date;
    $appointment_time = $request->appointment_time;
    
      $updated_appointment = appointment::findOrFail($id);
      $updated_appointment->update([
        'name'=>$name,
        'phone'=>$phone,
        'appointment_date'=>$appointment_date,
        'appointment_time'=>Carbon::parse($appointment_time)->format('H:i:s'),
      ]);
    return redirect()->route('booking.index')->with('success', 'تم تحديث الموعد بنجاح');

  }
    
   
    
}
