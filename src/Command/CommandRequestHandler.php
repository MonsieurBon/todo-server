<?php

declare(strict_types=1);

namespace Todo\Command;

use PJS\JsonSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Todo\lib\CauseHolder;

class CommandRequestHandler
{
    private $serializer;

    private $requestClassResolver;

    private $commandHandlerFactory;

    private $causeHolder;

    public function __construct(JsonSerializer $serializer,
                                RequestClassResolver $requestClassResolver,
                                CommandHandlerFactory $commandHandlerFactory,
                                CauseHolder $causeHolder)
    {
        $this->serializer = $serializer;
        $this->requestClassResolver = $requestClassResolver;
        $this->commandHandlerFactory = $commandHandlerFactory;
        $this->causeHolder = $causeHolder;
    }

    public function handle(Request $request): Response
    {
        try {
            $command = $this->parseContentToCommand($request);
        } catch (\Exception $e) {
            $cause = $e->getPrevious() ?? $e;
            return new Response($cause->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $this->causeHolder->setCause($command);
        $this->handleCommand($command);

        return new Response();
    }

    /**
     * @param Request $request
     * @return Command
     * @throws \PJS\Exception\DeserializingException
     */
    private function parseContentToCommand(Request $request): Command
    {
        /** @var Command $command */
        $command = $this->serializer->deserialize($request->getContent(), function (&$array) {
            $commandName = $array['name'];
            unset($array['name']);
            return $this->requestClassResolver->getCommandClass($commandName);
        });
        return $command;
    }

    /**
     * @param Command $command
     */
    private function handleCommand(Command $command): void
    {
        $this->commandHandlerFactory
            ->getCommandHandler(get_class($command))
            ->handle($command);
    }
}