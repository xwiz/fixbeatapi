<?php

    // Controllers namespaces
    $controllers = [
        'user'   => 'Api\Controllers\UserController',
        'business'  => 'Api\Controllers\BusinessController',
        'proposal'     => 'Api\Controllers\ProposalController',
    ];

    // API routes
    Route::api(['version' => 'v1', 'prefix' => 'api/v1', 'protected' => true], function() use ($controllers)
    {
        /**
         * The API routes for retrieving user data
         * This is simple CRUD without delete part
         */
        Route::group(['prefix' => 'user'], function() use ($controllers)
        {
            Route::get('/', ['protected' => false, 'as' => 'users.index', 'uses' => $controllers['user'] . '@index']);
            Route::post('create', ['protected' => false, 'as' => 'users.create', 'uses' => $controllers['user'] . '@create']);
            Route::get('{user}', ['as' => 'users.show', 'uses' => $controllers['user'] . '@show']);
            Route::post('{user}', ['as' => 'users.update', 'uses' => $controllers['user'] . '@update']);
        });
        
        /**
        * The API Routes for retrieving business information
        * This is also simple CRUD operations API for businesses
        */
        Route::group(['prefix' => 'businesses'], function() use ($controllers)
        {
            Route::get('/', ['protected' => false, 'as' => 'business.index', 'uses' => $controllers['business'] . '@index']);
        });
        
                /**
        * The API Routes for retrieving business information
        * This is also simple CRUD operations API for businesses
        */
        Route::group(['prefix' => 'users'], function() use ($controllers)
        {
            Route::get('/', ['protected' => false, 'as' => 'user.index', 'uses' => $controllers['user'] . '@index']);
        });
        
        /**
        * The API Routes for retrieving business information
        * This is also simple CRUD operations API for businesses
        */
        Route::group(['prefix' => 'business'], function() use ($controllers)
        {
            Route::get('/', ['protected' => false, 'as' => 'business.index', 'uses' => $controllers['business'] . '@index']);
            Route::post('create', ['protected' => false, 'as' => 'business.create', 'uses' => $controllers['business'] . '@create']);
            Route::get('{business}', ['as' => 'business.show', 'uses' => $controllers['business'] . '@show']);
            Route::post('{business}', ['as' => 'business.update', 'uses' => $controllers['business'] . '@update']);
            Route::delete('{business}', ['as' => 'business.destroy', 'uses' => $controllers['business'] . '@destroy']);
        });
        
        /**
        * The API Routes for sending proposal or replying proposals and proposals messages
        * There is no update for proposals, once a proposal is sent, it's sent so there's only create
        * Once a business receives a proposal, they can reply to the proposal with a message, at which the user
        * receives a message with a link to the proposal        * 
        */
        Route::group(['prefix' => 'proposal'], function() use ($controllers)
        {
            Route::post('create', ['as' => 'proposal.create', 'uses' => $controllers['proposal'] . '@create']);
            Route::get('{proposal}', ['as' => 'proposal.show', 'uses' => $controllers['proposal'] . '@show']);
            Route::post('{proposal}/reply', ['as' => 'proposal.reply', 'uses' => $controllers['proposal'] . '@reply']);
            Route::post('{proposal}/accept', ['as' => 'proposal.accept', 'uses' => $controllers['proposal'] . '@accept']);
            Route::get('{proposal}/messages', ['as' => 'proposal.messages', 'uses' => $controllers['proposal'] . '@messages']);
        });

    });
