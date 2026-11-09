<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Activity;

class AppointmentController extends Controller
{
  public function index(Request $request)
  {
    $query = Appointment::with(['barber', 'service'])->orderBy('created_at', 'desc');

    if ($request->has('search') && !empty($request->search)) {
      $search = $request->search;
      $query->where(function ($q) use ($search) {
        $q->where('customer_name', 'like', '%' . $search . '%')
          ->orWhere('customer_phone', 'like', '%' . $search . '%');
      });
    }

    $appointments = $query->get();
    return view('admin.appointment.index', compact('appointments'));
  }

  public function create()
  {
    $barbers = Barber::all();
    $services = Service::all();
    return view('booking.create', compact('barbers', 'services'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'customer_name' => 'required|string|max:100',
      'customer_phone' => ['required', 'string', 'min:9', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
      'barber_id' => 'required|exists:barbers,id',
      'service_id' => 'required|exists:services,id',
      'booking_date' => 'required|date|after_or_equal:today',
      'booking_time' => 'required|in:09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00',
      'g-recaptcha-response' => 'required|captcha',
    ]);

    if ($request->booking_date === now()->toDateString()) {
      $selectedDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->booking_date . ' ' . $request->booking_time);
      if ($selectedDateTime->isPast()) {
        return redirect()->back()->with('error', 'Jam kedatangan yang dipilih untuk hari ini sudah terlewat. Silakan pilih jam berikutnya.')->withInput();
      }
    }

    $bookingTime = $request->booking_time . ':00';

    $isBooked = Appointment::where('barber_id', $request->barber_id)
      ->where('booking_date', $request->booking_date)
      ->where('booking_time', $bookingTime)
      ->whereIn('status', ['pending', 'konfirmasi'])
      ->exists();

    if ($isBooked) {
      return redirect()->back()->with('error', 'Pegawai yang dipilih sudah ada jadwal di jam tersebut. Pilih jam lain ya!')->withInput();
    }

    $isActiveBooking = Appointment::where('customer_phone', $request->customer_phone)
      ->whereIn('status', ['pending', 'konfirmasi'])
      ->exists();

    if ($isActiveBooking) {
      return redirect()->back()->with('error', 'Nomor anda masih memiliki reservasi yang aktif. Selesaikan atau batalkan dulu ya!')->withInput();
    }

    $data = $request->only([
      'customer_name',
      'customer_phone',
      'barber_id',
      'service_id',
      'booking_date',
    ]);
    $data['booking_time'] = $bookingTime;
    $data['status'] = 'pending';
    Appointment::create($data);

    return redirect()->back()->with('success', 'Booking berhasil! Cek status jadwal kamu. Kami tunggu kedatangannya.');
  }

  public function cekStatusForm()
  {
    return view('booking.cek-status'); // Tampilkan form input nomor HP
  }

  public function cekStatusResult(Request $request)
  {
    $request->validate([
      'customer_phone' => ['required', 'string', 'min:9', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
    ]);

    // Cari booking terakhir dari nomor HP tersebut
    $booking = Appointment::where('customer_phone', $request->customer_phone)
      ->latest()
      ->first();

    return view('booking.cek-status', compact('booking'));
  }


  public function updateStatus(Request $request, Appointment $appointment)
  {
    $request->validate([
      'status' => 'required|in:pending,konfirmasi,selesai,batal',
    ]);

    // Prevent changing status if already 'batal'
    if ($appointment->status == 'batal') {
      return back()->with('error', 'Status batal tidak dapat diubah.');
    }

    // Prevent changing from 'selesai' to other status
    if ($appointment->status == 'selesai') {
      return back()->with('error', 'Status selesai tidak dapat diubah.');
    }

    $oldStatus = strtoupper($appointment->status);
    $appointment->update(['status' => $request->status]);
    $newStatus = strtoupper($request->status);

    Activity::log("Update status {$appointment->customer_name}: $oldStatus -> $newStatus", "booking");

    return back()->with('success', 'Status jadwal berhasil diupdate!');
  }

  public function destroy($id)
  {
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();
    $customer = $appointment->customer_name;
    $date = $appointment->booking_date;

    Activity::log("Menghapus reservasi: $customer ($date)", "booking");

    return redirect()->route('booking.index')->with('success', 'Data reservasi berhasil dihapus');
  }
}
