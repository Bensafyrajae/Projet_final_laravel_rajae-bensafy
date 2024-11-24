<?php



use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Chatify\Http\Controllers\Api\MessagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified', 'double-auth'])->group(function () {
    Route::get('/dashboard', function () {
        $data = ['id' => auth()->id(), 'type' => 'User'];
        return view('dashboard', compact('data'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name("tasks")->group(function () {
        Route::get('/tasks', [TaskController::class, 'index']);
        Route::get('/tasks/all/{id?}', [TaskController::class, 'all'])->name(".all");
        Route::get('/tasks/{team}', [TaskController::class, 'show'])->name(".show");
        Route::post('/tasks/{id}', [TaskController::class, 'store'])->name(".store");
        Route::put('/tasks/{id?}', [TaskController::class, 'update'])->name(".update");
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('.destroy');
        Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    });
   
    
    Route::middleware('auth')->group(function () {
        // Team routes
        Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
        Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
        Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
        Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
        Route::post('/teams/{team}/invite', [TeamController::class, 'invite'])->name('teams.invite');
        Route::post('/teams/{team}/kick', [TeamController::class, 'kick'])->name('teams.kick');
    
           // Subscription routes
    Route::get('/payment-options', [SubscriptionController::class, 'plans'])->name('payment.options');
    Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');
    Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');

    });
    

    Route::name("teams")->group(function () {
        Route::get('/teams', [TeamController::class, 'index']);
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('.show');
        Route::post('/teams', [TeamController::class, 'store'])->name(".store");
 
        Route::put('/invite/{team}', [TeamController::class, 'invite'])->name(".invite");
       


    });
});
Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');


Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');


Route::get('/payment-success', [StripeController::class, 'paymentSuccess'])->name('teams.success');
    Route::get('/payment-cancel', [StripeController::class, 'paymentCancel'])->name('teams.cancel');
    Route::post('/teams/stripe', [StripeController::class, 'store'])->name('teams.request');

Route::post('teams/store', [TeamController::class, 'store'])->middleware('check.team.limit');

Route::get('/messenger', [MessagesController::class, 'index'])->name('messenger');
Route::post('/messages/send', [MessagesController::class, 'sendMessage'])->name('messages.send');
Route::get('/messages/fetch', [MessagesController::class, 'fetchMessages'])->name('messages.fetch');
Route::post('/favorites/add', [MessagesController::class, 'addToFavorites'])->name('favorites.add');
Route::delete('/favorites/remove', [MessagesController::class, 'removeFromFavorites'])->name('favorites.remove');






Route::middleware(['auth'])->group(function () {
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

});





Route::get('/subscription/plans', [SubscriptionController::class, 'plans'])->name('subscription.plans');
Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');







Route::middleware('auth:sanctum')->group(function () {
    Route::post('/messages/send', [MessagesController::class, 'send'])->name('messages.send');
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
});


require __DIR__ . '/auth.php';