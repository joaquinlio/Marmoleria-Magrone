<?
Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', 'UserController@index')->name('users.index');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '[0-9]+')
    ->name('users.show');
    
Route::get('/usuarios/nuevo','UserController@create')->name('users.create');

Route::post('/usuarios/crear','UserController@store')->name('users.store');

Route::get('/usuarios/{user}/editar','UserController@edit')->name('users.edit');

Route::put('/usuarios/{user}','UserController@update')->name('users.update');

Route::delete('/usuarios/{user}','UserController@destroy')->name('users.destroy');

// ABM PRODUCTO

Route::get('/productos', 'ProductosController@index')->name('productos.index');

Route::get('/productos/nuevo','ProductosController@create')->name('productos.create');

Route::post('/productos/crear','ProductosController@store')->name('productos.store');

Route::put('/productos/update','ProductosController@update')->name('productos.update');

Route::delete('/productos/delete','ProductosController@destroy')->name('productos.destroy');

Route::get('productos/autocomplete','ProductosController@autocomplete')->name('productos.autocomplete');

Route::post('obtenerdetalles','ProductosController@obtenerdetalles')->name('productos.obtenerdetalles');

// ABM Presupuesto

Route::get('/presupuestos', 'PresupuestoController@index')->name('presupuestos.index');

Route::get('/presupuestos/{id}', 'PresupuestoController@show')
    ->where('id', '[0-9]+')
    ->name('presupuestos.show');

Route::get('presupuestos-pdf/{id}', 'PresupuestoController@pdf')->name('presupuestos.pdf');

Route::get('/presupuestos/nuevo','PresupuestoController@create')->name('presupuestos.create');

Route::post('/presupuestos/crear','PresupuestoController@store')->name('presupuestos.store');

Route::put('/presupuestos/update','PresupuestoController@update')->name('presupuestos.update');

Route::delete('/presupuestos/delete','PresupuestoController@destroy')->name('presupuestos.destroy');

Route::post('/presupuestos/insertar','PresupuestoController@insertar')->name('presupuestos.insertar');

// ABM Pedidos

Route::get('/pedidos', 'PedidoController@index')->name('pedidos.index');

Route::get('/pedidos/{id}', 'PedidoController@show')
    ->where('id', '[0-9]+')
    ->name('pedidos.show');
    
Route::get('pedidos-pdf/{id}', 'PedidoController@pdf')->name('pedidos.pdf');

Route::get('/pedidos/nuevo','PedidoController@create')->name('pedidos.create');

Route::post('/pedidos/crear','PedidoController@store')->name('pedidos.store');

Route::put('/pedidos/update','PedidoController@update')->name('pedidos.update');

Route::delete('/pedidos/delete','PedidoController@destroy')->name('pedidos.destroy');

Route::post('/pedidos/insertar','PedidoController@insertar')->name('pedidos.insertar');

// ABM Solicitudes

Route::get('/solicitudes', 'PedidoController@index')->name('solicitudes.index');

Route::get('/solicitudes/{id}', 'PedidoController@show')
    ->where('id', '[0-9]+')
    ->name('solicitudes.show');
    
Route::get('solicitudes-pdf/{id}', 'PedidoController@pdf')->name('solicitudes.pdf');

Route::get('/solicitudes/nuevo','PedidoController@create')->name('solicitudes.create');

Route::post('/solicitudes/crear','PedidoController@store')->name('solicitudes.store');

Route::put('/solicitudes/update','PedidoController@update')->name('solicitudes.update');

Route::delete('/solicitudes/delete','PedidoController@destroy')->name('solicitudes.destroy');

Route::post('/solicitudes/insertarPresupuesto','PedidoController@insertarPresupuesto')->name('solicitudes.insertarPresupuesto');

Route::post('/solicitudes/insertarPedido','PedidoController@insertarPedido')->name('solicitudes.insertarPedido');
// ABM Cliente

Route::get('/clientes', 'ClienteController@index')->name('clientes.index');

Route::get('/clientes/nuevo','ClienteController@create')->name('clientes.create');

Route::post('/clientes/crear','ClienteController@store')->name('clientes.store');

Route::put('/clientes/update','ClienteController@update')->name('clientes.update');

Route::delete('/clientes/delete','ClienteController@destroy')->name('clientes.destroy');

Route::get('clientes/autocomplete','ClienteController@autocomplete')->name('clientes.autocomplete');

Route::post('clientes/obtenerdetalles','ClienteController@obtenerdetalles')->name('clientes.obtenerdetalles');

// ABM Profecionales

Route::get('/profecionales', 'ProfecionalController@index')->name('profecionales.index');

Route::get('/profecionales/nuevo','ProfecionalController@create')->name('profecionales.create');

Route::post('/profecionales/crear','ProfecionalController@store')->name('profecionales.store');

Route::put('/profecionales/update','ProfecionalController@update')->name('profecionales.update');

Route::delete('/profecionales/delete','ProfecionalController@destroy')->name('profecionales.destroy');

Route::get('profecionales/autocomplete','ProfecionalController@autocomplete')->name('profecionales.autocomplete');

Route::post('profecionales/obtenerdetalles','ProfecionalController@obtenerdetalles')->name('profecionales.obtenerdetalles');

// ABM Vendedores

Route::get('/vendedores', 'VendedorController@index')->name('vendedores.index');

Route::get('/vendedores/nuevo','VendedorController@create')->name('vendedores.create');

Route::post('/vendedores/crear','VendedorController@store')->name('vendedores.store');

Route::put('/vendedores/update','VendedorController@update')->name('vendedores.update');

Route::delete('/vendedores/delete','VendedorController@destroy')->name('vendedores.destroy');

Route::get('vendedores/autocomplete','VendedorController@autocomplete')->name('vendedores.autocomplete');

Route::post('vendedores/obtenerdetalles','VendedorController@obtenerdetalles')->name('vendedores.obtenerdetalles');