<?php

use App\Models\Theme;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/intern', '/admin/events');
Route::permanentRedirect('/admin', '/admin/events');
Route::permanentRedirect('/events', '/');

$staticPages = collect([]);
$pathStaticPages = collect(config('view.paths'))->map(function($path) use (&$staticPages) {
    $path = $path . '/public/static';
    if(is_dir($path)) {
        foreach(scandir($path) as $item) {
            if(false !== strrpos($item, '.blade.php')) {
                $staticPages = $staticPages->merge(basename($item,'.blade.php'));
            }
        }
    }
});
if($staticPages->count() > 0)  {
    $staticPages->each(function($slug){
        Route::get("/static/$slug", 'StaticPageController@get')->name("public.static.$slug");
    });
}

Route::get('/feed', 'EventController@feed')->name('public.feed');
Route::get('/ical', 'EventController@ical')->name('public.ical');
Route::get('/', 'EventController@getActualMergedEvents')->name('public.events');
Route::get('show/{date}', 'EventController@show')->name('public.event.eventsShow');
//Route::get('calendar/{year}/{month}', 'EventController@calendar')->name('public.eventCalendar');
Route::get('calendar', 'EventController@calendar')->name('public.eventCalendar');

//Route::post('/events/lazy/{date}', 'EventController@lazy')->name('public.eventLazy');
//Route::post('/events/lazyByCategory/{category}/{date}', 'EventController@lazyByCategory')->name('public.eventLazyByCategory');
//Route::post('/events/lazyByTheme/{theme}/{date}', 'EventController@lazyByTheme')->name('public.eventLazyByTheme');

$categories = Category::where('is_published', 1)->get();
foreach($categories as $item) {
	Route::get('/events/category/'.$item->slug, 'EventController@getActualMergedEventsByCategory')->name('public.eventsByCategory.' . $item->slug);
}
$themes = Theme::where('is_published', 1)->get();
foreach($themes as $item) {
	Route::get('/theme/'.$item->slug, 'EventController@getActualMergedEventsByTheme')->name('public.eventsByTheme.'. $item->slug);
}
Route::get('/page/{slug}', 'PageController@get')->name('public.page');

Route::group([
    'prefix'    => 'contact',
    'as'        => 'public.',
], function () {
    Route::resource('message', 'BandMessageController')->only(['create','store']);
    Route::resource('newsletter', 'NewsletterController')->only(['create','store']);
});

Route::get('/logout', function() {
    Auth::logout();
    Session::invalidate();
    return redirect()->route('public.events');
});
if(app()->environment('local')) {
    Route::get('myi', fn() => phpinfo());
}
Route::fallback(function () {
    return redirect()->route('public.events');
});
