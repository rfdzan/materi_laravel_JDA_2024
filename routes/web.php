<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::method('uri', callback/array/string)
// Route::get('/detail', function () {
//     return 'hello world';
// });

// schema://{host}:{port}/{route}?{query}
Route::any("/detail", function () {
    $users = [
        [
            "id" => 1,
            "name" => "Fulan",
            "age" => 30
        ],
        [
            "id" => 2,
            "name" => "Fulanah",
            "age" => 25,
        ]
    ];
    // get url.com?id=123 <- this number
    $id = request()->get("id");
    // return $users;
    return $id;
});
// route params
// http://localhost:8000/user/45/mbak <- '45', 'mbak'
// pretty straightforward, url -> pass to callback  
Route::get("/user/{id}/{nama}", function ($id, $nama) {
    // return [
    //     "id" => $id,
    //     "nama" => $nama,
    // ];
    return "{$id}, {$nama}";
});
Route::get("/home", function () {
    // return request(); 
    return request()->query();
});
// check route grouping + named route + route prefix
// parent punya prefix + name, child tinggal route sendiri aja.

// parent groupnya "admin", kasih prefix "/admin"
// nanti child tinggal "/route_name" -> implicitly "/admin/route_name"
Route::get("/blade_welcome", function () {
    return view("welcome");
});
Route::get("/test_view", function () {
    // return Blade view. "test" -> refers to the blade file name?
    return view("test");
});
Route::get("/inner", function () {
    // dir.bladefilename
    // describes the path if blade files are in directories
    return view("mydir.inner");
});
// sending data to blade view
Route::get("/send_data", function () {
    // get query /send_data?query=<query>
    $query = request()->get("query");
    if (strln($query) == 0) {
        $query = "query kosong";
    }
    $user = [
        "nama" => "Fulan",
        "umur" => "26",
        "query" => $query,
        "kondisi" => false
    ];
    return view("test", [
        "user" => $user
    ]);
})->name("user.fulan");
