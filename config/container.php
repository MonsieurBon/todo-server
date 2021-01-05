<?php

declare(strict_types=1);

use PJS\JsonSerializer;
use Todo\Command\CommandHandlerFactory;
use Todo\Command\RegisterUser;
use Todo\Command\RegisterUserHandler;
use Todo\Command\RequestClassResolver;
use Todo\Infrastructure\Repository\EventStoreUserCollection;
use Todo\Model\User\UserCollection;
use Todo\StreamName;

return [
    'serializer.config' => '../config/serializer.yml',

    'request.name.map' => [
        'registerUser' => RegisterUser::class
    ],

    'command.handler.map' => [
        RegisterUser::class => DI\get(RegisterUserHandler::class)
    ],

    'user.stream.name' => DI\factory([StreamName::class, 'fromString'])
        ->parameter('name', 'user_stream'),

    JsonSerializer::class => DI\autowire()
        ->method('configure', DI\get('serializer.config')),

    CommandHandlerFactory::class => DI\autowire()
        ->constructor(DI\get('command.handler.map')),

    RequestClassResolver::class => DI\autowire()
        ->constructor(DI\get('request.name.map')),

//    EventStore::class => DI\autowire(MySqlEventStore::class),

    UserCollection::class => DI\autowire(EventStoreUserCollection::class)
        ->constructorParameter('streamName', DI\get('user.stream.name'))
];