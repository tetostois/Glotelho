use App\Http\Controllers\UrlShortenerController;

Route::post('/shorten', [UrlShortenerController::class, 'shorten']);
Route::get('/stats/{short_code}', [UrlShortenerController::class, 'stats']); 