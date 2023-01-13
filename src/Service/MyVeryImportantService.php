<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class MyVeryImportantService
{
    private LoggerInterface $logger;
    private LoggerInterface $fooLogger;
    private LoggerInterface $barLogger;

    public function __construct(
        LoggerInterface $logger,
        LoggerInterface $fooLogger,
        LoggerInterface $barLogger,
    ) {

        $this->logger = $logger;
        $this->fooLogger = $fooLogger;
        $this->barLogger = $barLogger;
    }

    public function log(string $message, array $context = [])
    {
        $this->logger->info($message, $context);
        $this->fooLogger->info($message, $context);
        $this->barLogger->info($message, $context);
    }
}