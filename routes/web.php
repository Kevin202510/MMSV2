<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorsconfigurationController;
use App\Http\Controllers\HumidityController;
use App\Http\Controllers\LightsController;
use App\Http\Controllers\Notifyusermmsstatus;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SoilmoistureController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaterlevelController;
use App\Http\Controllers\CarbonDioxideController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\SensorControlsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); })->name('noted');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/notify', 'Notifyusermmsstatus@sendEmail');
Route::get('/lockscreen', function () { return view('layouts.lockscreen'); })->name('lockscreen');
Route::get('/MmsSensorsData', function () { return view('MmsSensorsData'); });
Route::get('/video', function () { return view('video.index'); })->name('Video')->middleware('auth');
Route::prefix('/api/mushroomvar')->group(function() 
{
    Route::get('/', [SensorsconfigurationController::class,'index']);
});

Route::prefix('/api/getCurrentStatus')->group(function() 
{
    Route::get('/temperature', [TemperatureController::class,'currentTemperature']);
    Route::get('/humidity', [HumidityController::class,'currentTemperature']);
    Route::get('/lights', [LightsController::class,'currentTemperature']);
    Route::get('/co2', [CarbonDioxideController::class,'currentTemperature']);
});

Route::prefix('/api/sensorsconfigurationss')->group(function() 
{
    Route::get('/', [SensorsconfigurationController::class,'index1']);
});

Route::get('/export-user', [UserController::class,'export'])->name('ExportUser')->middleware('auth');

Route::middleware('admin')->group(function () {
    Route::get('/our_backup_database', [GlobalController::class,'our_backup_database'])->name('our_backup_database');
    Route::get('/users', function () { return view('users.index'); })->name('Users')->middleware('auth');
    Route::get('/roles', function () { return view('roles.index'); })->name('Roles')->middleware('auth');
    
    // API's

    Route::prefix('/api/humidity')->group(function() 
    {
        Route::post('/save', [HumidityController::class,'save']); 
    });

    Route::prefix('/api/carbondioxide')->group(function() 
    {
        Route::post('/save', [CarbonDioxideController::class,'save']); 
    });

    Route::prefix('/api/soil')->group(function() 
    {
        Route::post('/save', 'SoilmoistureController@save'); 
    });

    Route::prefix('/api/water')->group(function() 
    {
        Route::post('/save', 'WaterlevelController@save'); 
    });


    Route::prefix('/api/light')->group(function() 
    {
        Route::post('/save', [LightsController::class,'save']);  
    });


    Route::prefix('/api/temperature')->group(function() 
    {
        Route::post('/save', [TemperatureController::class,'save']); 
    });

    Route::prefix('/api/users')->group(function() 
    {
        Route::get('/', [UserController::class,'index']);
        Route::get('/deleteds', [UserController::class,'index1']);
        Route::get('/list', [UserController::class,'list']); 
        Route::post('/save', [UserController::class,'save']);
        Route::post('/checkpass', [UserController::class,'makeHashPass']); 
        Route::put('/{user}/updateProfile', [UserController::class,'updateProfile']); 
        Route::put('/{user}/updatePassword', [UserController::class,'updatePassword']); 
        Route::post('/upload/save', [UserController::class,'upload']); 
        Route::put('/{user}/update', [UserController::class,'update']);
        Route::put('/{user}/updatestatus', [UserController::class,'updatestatus']);
        Route::put('/{user}/updatestatusDisapproved', [UserController::class,'updatestatusDisapproved']);
        Route::delete('/{user}/destroy', [UserController::class,'destroy']);  
        Route::delete('/deleteds/{user}/recover', [UserController::class,'recover']);
    });

    Route::prefix('/api/roles')->group(function() 
    {
        Route::get('/', [RolesController::class,'index']);
        Route::post('/save', [RolesController::class,'save']); 
        Route::put('/{roles}/update', [RolesController::class,'update']);
        Route::delete('/{roles}/destroy', [RolesController::class,'destroy']);  
    });
});

Route::middleware('employeeOrAdmin')->group(function () {

    Route::get('/global', function () { return view('SystemConfiguration.generateAllReport'); })->middleware('auth');
    Route::get('/controldevices', function () { return view('sensorcontrols.index'); })->name('Sensor Controls')->middleware('auth');
    Route::get('/sensorsconfiguration', function () { return view('sensors_configuration.index'); })->name('Sensor Configuration')->middleware('auth');
    Route::get('/notifications', function () { return view('notifications.index'); })->name('Notifications')->middleware('auth');
    Route::get('/sensorsconfigurationhistory', function () { return view('sensors_configuration.history'); })->name('Sensor Configuration History')->middleware('auth');
    Route::get('/temperature', function () { return view('temperature.index'); })->name('Temperature')->middleware('auth');
    Route::get('/humidity', function () { return view('humidity.index'); })->name('Humidity')->middleware('auth');
    Route::get('/light', function () { return view('lights.index'); })->name('Light')->middleware('auth');
    Route::get('/carbondioxide', function () { return view('carbondioxide.index'); })->name('CarbonDioxide')->middleware('auth');
    Route::get('/soil', function () { return view('soil.index'); })->name('SoilMoisture')->middleware('auth');
    Route::get('/water', function () { return view('water.index'); })->name('WaterLevel')->middleware('auth');
    Route::get('/export-temperature/{tempgeneratedata}', [TemperatureController::class,'export'])->name('Export')->middleware('auth');
    Route::get('/export-humidity', [HumidityController::class,'export'])->name('Export')->middleware('auth');
    Route::get('/export-carbondioxide', [CarbonDioxideController::class,'export'])->name('Export')->middleware('auth');
    Route::get('/export-lights', [LightsController::class,'export'])->name('Export')->middleware('auth');
    Route::get('/export-global', [GlobalController::class,'generateAllReports'])->name('GlobalExport')->middleware('auth');
    Route::get('/system-setting', function () { return view('SystemConfiguration.index'); })->name('System Setting')->middleware('auth');

    Route::prefix('/api/system-configurations')->group(function()  
    
    {
        Route::get('/', [GlobalController::class,'index']);
        Route::post('/resetDB', [GlobalController::class,'resetDB']);
    });

    Route::prefix('/api/controldevices')->group(function() 
    {
        Route::get('/', [SensorControlsController::class,'index']);
        Route::put('/{controldevices}/sprinklerchangestate', [SensorControlsController::class,'triggerSprinkler']);
        Route::put('/{controldevices}/lightschangestate', [SensorControlsController::class,'triggerLights']);
    });

    Route::prefix('/api/notifications')->group(function() 
    {
        Route::get('/', [NotificationController::class,'index']);
        Route::post('/save', [NotificationController::class,'save']);
    });
    
    Route::prefix('/api/exportglobal')->group(function() 
    {
        Route::post('/generatereport', [GlobalController::class,'generateAllReports']);
    });
    Route::prefix('/api/exporttemperature')->group(function() 
    {
        Route::post('/generatereport', [TemperatureController::class,'export']);
    });
    Route::prefix('/api/exporthumidity')->group(function() 
    {
        Route::post('/generatereport', [HumidityController::class,'export']);
    });
    Route::prefix('/api/exportcarbondioxide')->group(function() 
    {
        Route::post('/generatereport', [CarbonDioxideController::class,'export']);
    });
    Route::prefix('/api/exportlight')->group(function() 
    {
        Route::post('/generatereport', [LightsController::class,'export']);
    });

    Route::prefix('/api/humidity')->group(function() 
    {
        Route::get('/', [HumidityController::class,'index']);
        Route::get('/getNewVal', [HumidityController::class,'index2']);
    });

    Route::prefix('/api/carbondioxide')->group(function() 
    {
        Route::get('/', [CarbonDioxideController::class,'index']);
        Route::get('/getNewVal', [CarbonDioxideController::class,'index2']);
    });

    Route::prefix('/api/soil')->group(function() 
    {
        Route::get('/', 'SoilmoistureController@index');
        Route::get('/getNewVal', 'SoilmoistureController@index2');
    });

    Route::prefix('/api/water')->group(function() 
    {
        Route::get('/', 'WaterlevelController@index');
        Route::get('/getNewVal', 'WaterlevelController@index2');
    });


    Route::prefix('/api/light')->group(function() 
    {
        Route::get('/', [LightsController::class,'index']);
        Route::get('/getNewVal', [LightsController::class,'index2']);
    });


    Route::prefix('/api/temperature')->group(function() 
    {
        Route::get('/', [TemperatureController::class,'index']);
        Route::get('/getNewVal', [TemperatureController::class,'index2']);
    });

    Route::prefix('/api/sensorsconfigurations')->group(function() 
    {
        Route::get('/', [SensorsconfigurationController::class,'index1']);
        Route::get('/indexs', [SensorsconfigurationController::class,'index']);
        Route::put('/indexs/{sensorsconfiguration}/activate', [SensorsconfigurationController::class,'activate']);
        Route::post('/indexs/save', [SensorsconfigurationController::class,'save']); 
        Route::put('/{sensorsconfiguration}/update', [SensorsconfigurationController::class,'update']);
        Route::delete('/{sensorsconfiguration}/destroy', [SensorsconfigurationController::class,'destroy']);
    });

    Route::prefix('/api/histories')->group(function() 
    {
        Route::get('/', [SensorsconfigurationController::class,'index2']);
        Route::delete('/{sensorsconfiguration}/recover', [SensorsconfigurationController::class,'recover']);
    });

    Route::prefix('/api/users')->group(function() 
    {
        Route::post('/{user}/updateProfile', [UserController::class,'updateProfile']);
        Route::post('/checkpass', [UserController::class,'makeHashPass']);  
        Route::put('/{user}/updatePassword', [UserController::class,'updatePassword']); 
    });
});
