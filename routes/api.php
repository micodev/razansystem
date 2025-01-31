<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\NotificationsEvent;
//TODO:: order retreived by id if it is user not admin.
//TODO:: اذا سويت كاست فسوي انكليزي و بلحروف صغيره.
//TODO:: Arabic for country and Airports
//TODO:: Seed notification please
//TODO:: ticket by order route not work
//TODO:: birth_day suggest add to passenger
route::post('registerguest', [\App\Http\Controllers\AuthCountroller::class, 'registerguest']);
route::middleware(['auth:api'])->group(function () {
    route::post('register', [\App\Http\Controllers\AuthCountroller::class, 'register'])->middleware('guest');
    route::post('login', [\App\Http\Controllers\AuthCountroller::class, 'login']);

    route::get('alluser', [\App\Http\Controllers\UserController::class, 'alluser'])->middleware('admin');
    route::get('user', [\App\Http\Controllers\UserController::class, 'currentuser']);
    route::put('user', [\App\Http\Controllers\UserController::class, 'update']);
    route::delete('user', [\App\Http\Controllers\UserController::class, 'delete'])->middleware('admin');

    route::get('flightline', [\App\Http\Controllers\flightlineController::class, 'Get']); //->middleware('admin');
    route::post('flightline', [\App\Http\Controllers\flightlineController::class, 'store'])->middleware('admin');
    route::put('flightline', [\App\Http\Controllers\flightlineController::class, 'update'])->middleware('admin');
    route::delete('flightline', [\App\Http\Controllers\flightlineController::class, 'delete'])->middleware('admin');

    route::get('order', [\App\Http\Controllers\OrderController::class, 'get']);
    route::post('order', [\App\Http\Controllers\OrderController::class, 'store']);
    route::put('order', [\App\Http\Controllers\OrderController::class, 'update']);
    route::delete('order', [\App\Http\Controllers\OrderController::class, 'delete'])->middleware('admin');

    route::get('passengers', [\App\Http\Controllers\passengersController::class, 'get'])->middleware('admin');
    route::get('passengers_soft', [\App\Http\Controllers\passengersController::class, 'getsoft'])->middleware('admin');
    route::post('passengers', [\App\Http\Controllers\passengersController::class, 'restore'])->middleware('admin');
    route::put('passengers', [\App\Http\Controllers\passengersController::class, 'update']);
    route::delete('passengers', [\App\Http\Controllers\passengersController::class, 'delete'])->middleware('admin');

    route::get('allflightplan', [\App\Http\Controllers\flightplanController::class, 'get']);
    route::get('flightplan', [\App\Http\Controllers\flightplanController::class, 'getselected'])->middleware('admin');
    route::put('flightplan', [\App\Http\Controllers\flightplanController::class, 'selected']);
    route::post('flightplan', [\App\Http\Controllers\flightplanController::class, 'store'])->middleware('admin');

    route::post('notifications', [\App\Http\Controllers\notificationController::class, 'store']);
    route::get('notifications', [\App\Http\Controllers\notificationController::class, 'get']);

    route::get('notifications', [\App\Http\Controllers\notificationController::class, 'get']);
    route::post('notificationsbrodcast', [\App\Http\Controllers\notificationController::class, 'sendall'])->middleware('admin');

    route::get('countary', [\App\Http\Controllers\CountaryController::class, 'get']);
    route::post('countary', [\App\Http\Controllers\CountaryController::class, 'store'])->middleware('throttle:1500,1');

    route::get('ticketall', [\App\Http\Controllers\TicketController::class, 'getall']); //->middleware('admin');
    route::get('ticket', [\App\Http\Controllers\TicketController::class, 'get']);
    route::post('ticket', [\App\Http\Controllers\TicketController::class, 'store']);

    route::get('discount', [\App\Http\Controllers\discountController::class, 'get']);
    route::post('discount', [\App\Http\Controllers\discountController::class, 'store'])->middleware('admin');
    route::delete('discount', [\App\Http\Controllers\discountController::class, 'delete'])->middleware('admin');
    route::get('discount_soft', [\App\Http\Controllers\discountController::class, 'getsoft'])->middleware('admin');

    route::get('posation', [\App\Http\Controllers\posationController::class, 'get']);
    route::post('posation', [\App\Http\Controllers\posationController::class, 'store'])->middleware('admin');
    route::delete('posation', [\App\Http\Controllers\posationController::class, 'delete'])->middleware('admin');
});

Route::get('/fire', function () {
    broadcast(new NotificationsEvent('test', 'it Works'));
    return 'fired';
});
