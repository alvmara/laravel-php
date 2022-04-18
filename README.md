

El deploy del backend se ha realizado en heroku: https://laravel-l.herokuapp.com


Route::post('/register', [AuthController::class, "userRegister"]);

Route::post('/login', [AuthController::class, "userLogin"]);

Route::post('/logout', [AuthController::class, "userLogout"]);



Route::get('/profile', [AuthController::class, 'profile']);

Route::get('/users', [UserController::class, 'allUsers']);

Route::get('/users/{id}', [UserController::class, 'userByID']);

Route::get('/users/name/{name}', [UserController::class, 'userByName']);

Route::put('/users/{id}', [UserController::class, 'updateUser']);

Route::delete('/users/{id}', [UserController::class, 'deleteUser']);




Route::get('/games', [GameController::class, "gamesAll"]);

Route::post('/games', [GameController::class, "gamesAdd"]);

Route::post('/games/{id}', [GameController::class, "gameByID"]);

Route::put('/games/{id}', [GameController::class, "updateGame"]);

Route::delete('/games/{id}', [GameController::class, "deleteGame"]);


Route::get('/parties', [PartyController::class, "partiesAll"]);

Route::post('/parties', [PartyController::class, "newParty"]);

Route::post('/parties/{id}', [PartyController::class, "partyByGameID"]);

Route::post('/parties/{id}', [PartyController::class, "updateParty"]);

Route::put('/parties/{id}', [PartyController::class, "deleteParty"]);

Route::delete('/parties/game/{id}', [PartyController::class, "partiesByGameID"]);


Route::get('/messages', [MessageController::class, 'allMessages']);

Route::post('/messages', [MessageController::class, 'newMessage']);

Route::get('/messages/{id}', [MessageController::class, 'messageByID']);

Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);

Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage']);

Route::post('/message/party/{id}', [MessageController::class, "messagesByPartyID"]);


Route::get('/members', [MemberController::class, 'allMembers']);

Route::post('/members', [MemberController::class, 'newMember']);

Route::get('/members/{id}', [MemberController::class, 'memberByID']);

Route::put('/members/{id}', [MemberController::class, 'updateMember']);

Route::delete('/members/{id}', [MemberController::class, 'deleteMember']);

Route::post('/member/party/{id}', [MemberController::class, "membersByPartyID"]);
