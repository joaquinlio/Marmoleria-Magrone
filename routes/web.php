<?
Route::get('/', function () {
    return view('index');
})->name('index');//->middleware('auth');

Route::get('/login','\App\Http\Controllers\Auth\LoginController@login')->name('login')->middleware('auth');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('auth');

Route::get('/usuarios', 'UserController@index')->name('users.index');//->middleware('auth');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '[0-9]+')
    ->name('users.show');//->middleware('auth');
    
Route::get('/usuarios/nuevo','UserController@create')->name('users.create');//->middleware('auth');

Route::post('/usuarios/crear','UserController@store')->name('users.store');//->middleware('auth');

Route::get('/usuarios/{user}/editar','UserController@edit')->name('users.edit');//->middleware('auth');

Route::put('/usuarios/{user}','UserController@update')->name('users.update');//->middleware('auth');

Route::delete('/usuarios/{user}','UserController@destroy')->name('users.destroy');//->middleware('auth');

// ABM PRODUCTO

Route::get('/productos', 'ProductosController@index')->name('productos.index');//->middleware('auth');

Route::get('/productos/nuevo','ProductosController@create')->name('productos.create');//->middleware('auth');

Route::post('/productos/crear','ProductosController@store')->name('productos.store');//->middleware('auth');

Route::put('/productos/update','ProductosController@update')->name('productos.update');//->middleware('auth');

Route::delete('/productos/delete','ProductosController@destroy')->name('productos.destroy');//->middleware('auth');

Route::get('productos/autocomplete','ProductosController@autocomplete')->name('productos.autocomplete');//->middleware('auth');

Route::get('productos/buscador','ProductosController@indexBuscador')->name('productos.buscador');//->middleware('auth');

Route::post('obtenerdetalles','ProductosController@obtenerdetalles')->name('productos.obtenerdetalles');//->middleware('auth');

// ABM Solicitudes

Route::get('/solicitudes', 'SolicitudController@index')->name('solicitudes.index');//->middleware('auth');

Route::get('/solicitudes/pto', 'SolicitudController@indexPto')->name('presupuestos.index');//->middleware('auth');

Route::get('/solicitudes/ped', 'SolicitudController@indexPed')->name('pedidos.index');//->middleware('auth');

Route::get('/solicitudes/{id}', 'SolicitudController@show')
    ->where('id', '[0-9]+')
    ->name('solicitudes.show');//->middleware('auth');

Route::get('/solicitudes/pto/{estado}', 'SolicitudController@indexPtoEstado')->name('ptoEstado.index');//->middleware('auth');

Route::get('/solicitudes/ped/{estado}', 'SolicitudController@indexPedEstado')->name('pedEstado.index');//->middleware('auth');
    
Route::get('solicitudes/pto/pdf/{id}', 'SolicitudController@pdfPto')->name('solicitudes.pto');//->middleware('auth');

Route::get('solicitudes/ped/pdf/{id}', 'SolicitudController@pdfPed')->name('solicitudes.ped');//->middleware('auth');

Route::get('solicitudes/ped/img/{id}', 'SolicitudController@imgPed')->name('solicitudes.pedImg');//->middleware('auth');

Route::get('/solicitudes/nuevo','SolicitudController@create')->name('solicitudes.create');//->middleware('auth');

Route::post('/solicitudes/crear','SolicitudController@store')->name('solicitudes.store');//->middleware('auth');

Route::get('/solicitudes/edit/{solicitud}','SolicitudController@edit')->name('solicitudes.edit');//->middleware('auth');

Route::post('/solicitudes/updatePedido','SolicitudController@updatePedido')->name('solicitudes.updatePedido');//->middleware('auth');

Route::post('/solicitudes/updatePresupuesto','SolicitudController@updatePresupuesto')->name('solicitudes.updatePresupuesto');//->middleware('auth');

Route::delete('/solicitudes/delete','SolicitudController@destroy')->name('solicitudes.destroy');//->middleware('auth');

Route::post('/solicitudes/insertarPresupuesto','SolicitudController@insertarPresupuesto')->name('solicitudes.insertarPresupuesto');//->middleware('auth');

Route::get('solicitudes/buscador','SolicitudController@buscador')->name('solicitudes.buscador');//->middleware('auth');

Route::post('/solicitudes/insertarPedido','SolicitudController@insertarPedido')->name('solicitudes.insertarPedido');//->middleware('auth');
// ABM Cliente

Route::get('/clientes', 'ClienteController@index')->name('clientes.index');//->middleware('auth');

Route::get('/clientes/nuevo','ClienteController@create')->name('clientes.create');//->middleware('auth');

Route::post('/clientes/crear','ClienteController@store')->name('clientes.store');//->middleware('auth');

Route::put('/clientes/update','ClienteController@update')->name('clientes.update');//->middleware('auth');

Route::delete('/clientes/delete','ClienteController@destroy')->name('clientes.destroy');//->middleware('auth');

Route::get('clientes/autocomplete','ClienteController@autocomplete')->name('clientes.autocomplete');//->middleware('auth');

Route::get('clientes/buscador','ClienteController@indexBuscador')->name('clientes.buscador');//->middleware('auth');

Route::post('clientes/obtenerdetalles','ClienteController@obtenerdetalles')->name('clientes.obtenerdetalles');//->middleware('auth');

// ABM profesionales

Route::get('/profesionales', 'profesionalController@index')->name('profesionales.index');//->middleware('auth');

Route::get('/profesionales/nuevo','profesionalController@create')->name('profesionales.create');//->middleware('auth');

Route::post('/profesionales/crear','profesionalController@store')->name('profesionales.store');//->middleware('auth');

Route::put('/profesionales/update','profesionalController@update')->name('profesionales.update');//->middleware('auth');

Route::delete('/profesionales/delete','profesionalController@destroy')->name('profesionales.destroy');//->middleware('auth');

Route::get('profesionales/autocomplete','profesionalController@autocomplete')->name('profesionales.autocomplete');//->middleware('auth');

Route::get('profesionales/buscador','profesionalController@indexBuscador')->name('profesionales.buscador');//->middleware('auth');

Route::post('profesionales/obtenerdetalles','profesionalController@obtenerdetalles')->name('profesionales.obtenerdetalles');//->middleware('auth');

// ABM Vendedores

Route::get('/vendedores', 'VendedorController@index')->name('vendedores.index');//->middleware('auth');

Route::get('/vendedores/nuevo','VendedorController@create')->name('vendedores.create');//->middleware('auth');

Route::post('/vendedores/crear','VendedorController@store')->name('vendedores.store');//->middleware('auth');

Route::put('/vendedores/update','VendedorController@update')->name('vendedores.update');//->middleware('auth');

Route::delete('/vendedores/delete','VendedorController@destroy')->name('vendedores.destroy');//->middleware('auth');

Route::get('vendedores/autocomplete','VendedorController@autocomplete')->name('vendedores.autocomplete');//->middleware('auth');

Route::post('vendedores/obtenerdetalles','VendedorController@obtenerdetalles')->name('vendedores.obtenerdetalles');//->middleware('auth');

// ABM Canaldeventa

Route::get('/canalesdeventa', 'CanaldeventaController@index')->name('canalesdeventa.index');//->middleware('auth');

Route::get('/canalesdeventa/nuevo','CanaldeventaController@create')->name('canalesdeventa.create');//->middleware('auth');

Route::post('/canalesdeventa/crear','CanaldeventaController@store')->name('canalesdeventa.store');//->middleware('auth');

Route::put('/canalesdeventa/update','CanaldeventaController@update')->name('canalesdeventa.update');//->middleware('auth');

Route::delete('/canalesdeventa/delete','CanaldeventaController@destroy')->name('canalesdeventa.destroy');//->middleware('auth');

//Panel de control

Route::get('paneldecontrol', function()
{
    return view('paneldecontrol.index');
})->name('paneldecontrol.index');//->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
