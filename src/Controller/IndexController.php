<?php

namespace App\Controller;

use App\Service\MyVeryImportantService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private LoggerInterface $fooLogger;
    private LoggerInterface $barLogger;

    public function __construct(
        LoggerInterface $fooLogger,
        LoggerInterface $barLogger,
    ) {
        $this->fooLogger = $fooLogger;
        $this->barLogger = $barLogger;
    }

    #[Route('/', name: 'app_index')]
    public function index(
        LoggerInterface $logger
    ): Response {
        // Default logger has been pass as a parameter of my index method,
        //   so the channel is app
        $logger->info("My awesome controller has been called!");

        // We can use our class properties to which the wiring have been declared in /config/services.yaml
        // And the properties have been instantiated in the __construct method.
        $this->fooLogger->info('This log should be in the foo channel');
        $this->barLogger->info('This log should be under the bar channel');

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/servicelog', name: 'app_service_log')]
    public function logFromService(
        MyVeryImportantService $myVeryImportantService
    ) {
        $myVeryImportantService->log('Some logs');

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
