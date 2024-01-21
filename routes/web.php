<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('events.index');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

Route::get('/events/{eventId}/attendees', [EventController::class, 'showAttendees'])->name('events.show-attendees');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::post('/attendees/store/{eventId}', [AttendeeController::class, 'storeEvent'])->name('attendees.store');
Route::get('events/{event}/attendees/{attendee}/edit', [AttendeeController::class, 'edit'])->name('attendees.edit');
Route::get('events/{event}/attendees/{attendee}', [AttendeeController::class, 'update'])->name('attendees.update');
Route::delete('events/{event}/attendees/{attendee}', [AttendeeController::class, 'destroy'])->name('attendees.destroy');



