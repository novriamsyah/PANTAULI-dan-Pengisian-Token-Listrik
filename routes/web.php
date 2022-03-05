<?php

use Illuminate\Support\Facades\Route;
use App\Events\CobaEvent;

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

Route::get('/', function () {
	
	return view('darat');
});

Route::get('/first', function () {
	
		return view('pertama');
	});

//======================================GET data Arduino=============================================
//mengambil data triger dari TCP/IP
Route::get('/espo/{tegangan}/{arus}/{pf}/{pf_sudah}/{dy_aktif}/{dy_reaktif}/{dy_semu}/{sisa_pulsa}/{total_kwh}', 'SensorController@dataArduino');

Route::get('/suhu/{temperature}/{humidity}', 'SensorController@masuk');


//===================ruang akses API data dari Route===============================================
Route::get('/chart_dy', 'ChartController@send_dy')->name('chart_dy');
Route::get('/chart', 'ChartController@send')->name('chart');
Route::get('/chartt', 'ChartController@kirim')->name('chartt');
Route::get('/charttt', 'ChartController@tabel')->name('charttt');
Route::get('/chartttt', 'ChartController@tabel2')->name('chartttt');
Route::get('/chart_wh', 'ChartController@tabel3')->name('chart_wh');

Route::get('/arduinoAPI', 'ArduinoController@dapat')->name('arduino');

//==================================================================================================


// ========================================== SISTEM LOGIN =========================================
Route::post('/registrasi_awal', 'SistemLoginController@registrasiAwal');
Route::get('/login', 'SistemLoginController@halamanLogin')->name('login');
Route::post('/login_verifikasi', 'SistemLoginController@verifikasiLogin');
Route::get('/logout', 'SistemLoginController@prosesLogout');
// =================================================================================================

// =============================== AKSES ADMIN ===============================
Route::group(['middleware' => ['auth', 'checkRole:admin,admin_low,non_member,member,user1']], function(){
	// => Fitur Cari Halaman
	Route::get('/cari_halaman/{kata}', 'FiturCariController@cariHalaman');
	// => Halaman Dashboard
	Route::get('/dashboard', 'HalDashboardController@halamanDashboard');
});
// =================================================================================================

// ===================================== AKSES ADMIN =====================================
Route::group(['middleware' => ['auth', 'checkRole:admin,admin_low']], function(){
// => Halaman Profil
	Route::get('/kelola_profil', 'HalProfilController@halamanProfil');
	Route::post('/update_profil', 'HalProfilController@updateProfil');
	Route::post('/ubah_password/{id}', 'HalProfilController@ubahPassword');

});
// =================================================================================================

// ========================================== AKSES ADMIN ==========================================
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){

	Route::get('/dashboarduser1', 'HalDashboardController@halamanDashboard1');
	Route::get('/dashboarduser2', 'HalDashboardController@halamanDashboard2');
// => Halaman Pengguna
	Route::get('/kelola_pengguna', 'HalPenggunaController@halamanPengguna');
	Route::get('/tambah_pengguna', 'HalPenggunaController@tambahPengguna');
	Route::post('/simpan_pengguna', 'HalPenggunaController@simpanPengguna');
	Route::get('/lihat_pengguna/{id}', 'HalPenggunaController@lihatPengguna');
	Route::get('/edit_pengguna/{id}', 'HalPenggunaController@editPengguna');
	Route::post('/update_pengguna/{id}', 'HalPenggunaController@updatePengguna');
	Route::get('/hapus_pengguna/{id}', 'HalPenggunaController@hapusPengguna');
// => halaman kontrol
	Route::get('/device', 'DeviceControlle@halamankontrol');
	Route::get('/status', 'DeviceControlle@status_kontrol')->name('status');
	Route::get('/status_kontrol', 'DeviceControlle@tabel_kontrol')->name('status_kontrol');
// => pulsa
	Route::get('/kelola_pulsa', 'HalPulsaController@halamanPulsa');
	Route::get('/tambah_pulsa', 'HalPulsaController@tambahPulsa');
	Route::post('/simpan_pulsa', 'HalPulsaController@simpanPulsa');
	Route::get('/lihat_pulsa/{id}', 'HalPulsaController@lihatPulsa');
	Route::get('/edit_pulsa/{id}', 'HalPulsaController@editPulsa');
	Route::post('/update_pulsa/{id}', 'HalPulsaController@updatePulsa');
	Route::get('/hapus_pulsa/{id}', 'HalPulsaController@hapusPulsa');

	// => Halaman Laporan

	Route::get('/laporan_pf', 'HalLaporanController@halamanLaporanPf');
	Route::post('/filter_laporan_pf', 'HalLaporanController@filterLaporanpf');
	Route::post('/pdf_laporan_pf', 'HalLaporanController@pdfLaporanpf');
	Route::get('/laporan_daya', 'HalLaporanController@halamanLaporanDaya');
	Route::post('/filter_laporan_daya', 'HalLaporanController@filterLaporandaya');
	Route::post('/pdf_laporan_daya', 'HalLaporanController@pdfLaporandaya');
	Route::get('/laporan_energi', 'HalLaporanController@halamanLaporanenergi');
	Route::post('/filter_laporan_energi', 'HalLaporanController@filterLaporanenergi');
	Route::post('/pdf_laporan_energi', 'HalLaporanController@pdfLaporanenergi');
	
	Route::get('/hapus_halaman', 'HalLaporanController@halamanHapus');
	Route::post('/filter_hapus_energi', 'HalLaporanController@filterHapusEnergi');

	

	//=> Buat Laporan
	// Route::get('/lapor_pf', 'HalLaporController@halamanLaporpf');
	// Route::post('/pdf_Pf', 'HalLaporController@pdfpf');

});

// =============================== AKSES USER 1 ===============================
Route::group(['middleware' => ['auth', 'checkRole:admin,user1']], function(){
	// => Fitur Cari Halaman
		Route::get('/cari_halaman/{kata}', 'FiturCariController@cariHalaman');
	// => Halaman Dashboard
		Route::get('/dashboarduser1', 'HalDashboardController@halamanDashboard1');
	});

// =============================== AKSES USER 1 ===============================
Route::group(['middleware' => ['auth', 'checkRole:admin,admin_low']], function(){
	// => Fitur Cari Halaman
		Route::get('/cari_halaman/{kata}', 'FiturCariController@cariHalaman');
	// => Halaman Dashboard
		Route::get('/dashboardadm1', 'HalDashboardController@halamanDashboard2');


		// => halaman kontrol
		Route::get('/device', 'DeviceControlle@halamankontrol');
		Route::get('/status', 'DeviceControlle@status_kontrol')->name('status');
		Route::get('/status_kontrol', 'DeviceControlle@tabel_kontrol')->name('status_kontrol');
		// => pulsa
		Route::get('/kelola_pulsa', 'HalPulsaController@halamanPulsa');
		Route::get('/tambah_pulsa', 'HalPulsaController@tambahPulsa');
		Route::post('/simpan_pulsa', 'HalPulsaController@simpanPulsa');
		Route::get('/lihat_pulsa/{id}', 'HalPulsaController@lihatPulsa');
		Route::get('/edit_pulsa/{id}', 'HalPulsaController@editPulsa');
		Route::post('/update_pulsa/{id}', 'HalPulsaController@updatePulsa');
		Route::get('/hapus_pulsa/{id}', 'HalPulsaController@hapusPulsa');

		// => Halaman Laporan

		Route::get('/laporan_pf', 'HalLaporanController@halamanLaporanPf');
		Route::post('/filter_laporan_pf', 'HalLaporanController@filterLaporanpf');
		Route::post('/pdf_laporan_pf', 'HalLaporanController@pdfLaporanpf');
		Route::get('/laporan_daya', 'HalLaporanController@halamanLaporanDaya');
		Route::post('/filter_laporan_daya', 'HalLaporanController@filterLaporandaya');
		Route::post('/pdf_laporan_daya', 'HalLaporanController@pdfLaporandaya');
		Route::get('/laporan_energi', 'HalLaporanController@halamanLaporanenergi');
		Route::post('/filter_laporan_energi', 'HalLaporanController@filterLaporanenergi');
		Route::post('/pdf_laporan_energi', 'HalLaporanController@pdfLaporanenergi');



	});


