<?php namespace Config;
use Template;
use App\Models\Maplikasi;
use App\Models\Mmenu;
$this->Maplikasi= new Maplikasi();
$this->Mmenu= new Mmenu();
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Website');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
	// utama
   $d['classhead']= 'green';
   $d['aplikasi']= $this->Maplikasi->data();
   $app= $d['aplikasi']->getrow();
   $d['title']= "Home";
   $d['ogtitle']= $app->nama_app;
   $d['ogdescription']= $app->deskripsi_app;
   $d['ogimage']= base_url($app->logo_app);
   $d['ogurl']= base_url();
   $d['menu']= $this->Mmenu->dataparent();

   return Template::website('website/404',$d);
});
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Website::index');
$routes->get('/toadmin', 'Login::index');
$routes->post('/authlogin', 'Login::authlogin');
$routes->get('/logout', 'Login::logout');
$routes->get('/acara', 'Website::acara');
$routes->get('/lihat/(:any)', 'Website::lihatacara');
$routes->get('/artikel', 'Website::artikel');
$routes->get('/baca/(:any)', 'Website::lihatartikel');
$routes->get('/kategori/(:any)', 'Website::kategori');
$routes->get('/page/(:any)', 'Website::page');
$routes->get('/kontak', 'Website::kontak');
$routes->get('/sendemail', 'Setting::pesankontak');
$routes->post('/sendemail', 'Setting::pesankontak');
$routes->get('/foto', 'Website::foto');
$routes->get('/video', 'Website::video');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
