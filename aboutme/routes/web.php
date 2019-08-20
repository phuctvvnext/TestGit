<?php

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
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');
Route::group(['namespace'=>'Aboutme'],function() {
	Route::get('',[
		'uses'=>'IndexController@index',
		'as'=>'aboutme.index.index'
	]);
	Route::get('news',[
		'uses'=>'NewsController@index',
		'as'=>'aboutme.news.index'
	]);
	Route::get('{slug}-{id}.html',[
		'uses'=>'NewsController@detail',
		'as'=>'aboutme.news.detail'
	]);
	Route::get('about',[
		'uses'=>'AboutControler@about',
		'as'=>'aboutme.about.about'
	]);
	Route::get('contact',[
		'uses'=>'ContactController@contact',
		'as'=>'aboutme.contact.contact'
	]);
	Route::get('project',[
		'uses'=>'ProjectsController@index',
		'as'=>'aboutme.project.index'
	]);
	Route::get('project/{slug}-{id}.html',[
		'uses'=>'ProjectsController@detail',
		'as'=>'aboutme.project.detail'
	]);
    Route::get('danhmuc/{id}',[
        'uses'=>'NewsController@getCat',
        'as'=>'aboutme.danhmuc.getCat'
    ]);

});
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {

	Route::get('/',[
		'uses'=>'IndexController@index',
		'as'=>'admin.index.index'
	]);
	Route::group(['prefix'=>'user'],function(){
		Route::get('/index',[
			'uses'=>'UserController@index',
			'as'=>'admin.user.index'
		]);
		Route::get('/add',[
        'uses'=>'UserController@getAdd',
        'as' =>'admin.user.add'
        ])->middleware('role:admindemo');
        Route::get('/edit/{id}',[
        'uses'=>'UserController@getEdit',
        'as' =>'admin.user.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'UserController@postEdit',
        'as' =>'admin.user.edit'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'UserController@getDel',
        'as' =>'admin.user.del'
        ])->middleware('role:admindemo');
        Route::post('/add',[
        'uses'=>'UserController@postAdd',
        'as' =>'admin.user.add'
        ]);

	});
	Route::prefix('lienhe')->group(function() {
        Route::get('/index',[
        'uses'=>'ContactController@index',
        'as' =>'admin.lienhe.index'
        ]);
        Route::get('/add',[
        'uses'=>'ContactController@getAdd',
        'as' =>'admin.lienhe.add'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'ContactController@getEdit',
        'as' =>'admin.lienhe.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'ContactController@postEdit',
        'as' =>'admin.lienhe.edit'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'ContactController@getDel',
        'as' =>'admin.lienhe.del'
        ]);
        Route::post('/add',[
        'uses'=>'ContactController@postAdd',
        'as' =>'admin.lienhe.add'
        ]);
    
    });
    Route::prefix('danhmuc')->group(function() {
        Route::get('/index',[
        'uses'=>'DanhMucController@index',
        'as' =>'admin.danhmuc.index'
        ]);
        Route::get('/add',[
        'uses'=>'DanhMucController@getAdd',
        'as' =>'admin.danhmuc.add'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'DanhMucController@getEdit',
        'as' =>'admin.danhmuc.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'DanhMucController@postEdit',
        'as' =>'admin.danhmuc.edit'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'DanhMucController@getDel',
        'as' =>'admin.danhmuc.del'
        ]);
        Route::post('/add',[
        'uses'=>'DanhMucController@postAdd',
        'as' =>'admin.danhmuc.add'
        ]);
    
    });
    Route::prefix('tintuc')->group(function() {
        Route::get('/index',[
        'uses'=>'TintucController@index',
        'as' =>'admin.tintuc.index'
        ]);
        Route::get('/index/{id}/{active}',[
        'uses'=>'TintucController@ajax',
        'as' =>'admin.tintuc.ajax'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'TintucController@getEdit',
        'as' =>'admin.tintuc.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'TintucController@postEdit',
        'as' =>'admin.tintuc.edit'
        ]);
        Route::get('/add',[
        'uses'=>'TintucController@getAdd',
        'as' =>'admin.tintuc.add'
        ]);
        Route::post('/add',[
        'uses'=>'TintucController@postAdd',
        'as' =>'admin.tintuc.add'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'TintucController@getDel',
        'as' =>'admin.tintuc.del'
        ]);
    });
    Route::prefix('comment')->group(function() {
        Route::get('/index',[
        'uses'=>'CommentController@index',
        'as' =>'admin.comment.index'
        ]);
        
        Route::get('/del/{id}',[
        'uses'=>'CommentController@getDel',
        'as' =>'admin.comment.del'
        ]);
    });
    Route::prefix('thongtin')->group(function() {
        Route::get('/index',[
        'uses'=>'ThongTinController@index',
        'as' =>'admin.thongtin.index'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'ThongTinController@getEdit',
        'as' =>'admin.thongtin.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'ThongTinController@postEdit',
        'as' =>'admin.thongtin.edit'
        ]);
        Route::get('/add',[
        'uses'=>'ThongTinController@getAdd',
        'as' =>'admin.thongtin.add'
        ]);
        Route::post('/add',[
        'uses'=>'ThongTinController@postAdd',
        'as' =>'admin.thongtin.add'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'ThongTinController@getDel',
        'as' =>'admin.thongtin.del'
        ]);
    });
    Route::prefix('kinang')->group(function() {
        Route::get('/index',[
        'uses'=>'KiNangController@index',
        'as' =>'admin.kinang.index'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'KiNangController@getEdit',
        'as' =>'admin.kinang.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'KiNangController@postEdit',
        'as' =>'admin.kinang.edit'
        ]);
        Route::get('/add',[
        'uses'=>'KiNangController@getAdd',
        'as' =>'admin.kinang.add'
        ]);
        Route::post('/add',[
        'uses'=>'KiNangController@postAdd',
        'as' =>'admin.kinang.add'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'KiNangController@getDel',
        'as' =>'admin.kinang.del'
        ]);
    });
    Route::prefix('duan')->group(function() {
        Route::get('/index',[
        'uses'=>'DuAnController@index',
        'as' =>'admin.duan.index'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'DuAnController@getEdit',
        'as' =>'admin.duan.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'DuAnController@postEdit',
        'as' =>'admin.duan.edit'
        ]);
        Route::get('/add',[
        'uses'=>'DuAnController@getAdd',
        'as' =>'admin.duan.add'
        ]);
        Route::post('/add',[
        'uses'=>'DuAnController@postAdd',
        'as' =>'admin.duan.add'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'DuAnController@getDel',
        'as' =>'admin.duan.del'
        ]);
    });
    Route::prefix('changduong')->group(function() {
        Route::get('/index',[
        'uses'=>'ChangDuongController@index',
        'as' =>'admin.changduong.index'
        ]);
        Route::get('/edit/{id}',[
        'uses'=>'ChangDuongController@getEdit',
        'as' =>'admin.changduong.edit'
        ]);
        Route::post('/edit/{id}',[
        'uses'=>'ChangDuongController@postEdit',
        'as' =>'admin.changduong.edit'
        ]);
        Route::get('/add',[
        'uses'=>'ChangDuongController@getAdd',
        'as' =>'admin.changduong.add'
        ]);
        Route::post('/add',[
        'uses'=>'ChangDuongController@postAdd',
        'as' =>'admin.changduong.add'
        ]);
        Route::get('/del/{id}',[
        'uses'=>'ChangDuongController@getDel',
        'as' =>'admin.changduong.del'
        ]);
    });
});
Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as' =>'auth.auth.login'
]);
Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as' =>'auth.auth.login'
]);
Route::get('/logout',[
    'uses'=>'AuthController@logout',
    'as' =>'auth.auth.logout'
]);
Route::get('/download', 'Controller@download');


Route::post('/admin/tintuc/index/{id}{active}',[
    'uses'=>'Controller@active',
    'as' =>'active'
]);
Route::post('/cmt/{id}',[
    'uses'=>'Controller@comment',
    'as' =>'comment'
]);
Route::post('/addlienhe',[
        'uses'=>'Admin\ContactController@postAddPublic',
        'as' =>'admin.lienhe.addpublic'
        ]);
Route::get('/errors', function(){
    return 'Ban khong co quyen thuc hien chuc nang nay';
});
Route::get('/search',[
    'uses'=>'Controller@getSearch',
    'as' =>'auth.search'
]);
Route::get('/admin/search',[
    'uses'=>'Controller@getSearchAdmin',
    'as' =>'auth.admin.search'
]);
test bash cho Git


