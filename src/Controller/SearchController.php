<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

declare(strict_types=1);

namespace App\Controller;

use App\Model\Attachment;
use App\Model\SearchResponse;
use App\Repository\ComicRepository;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Tebru\Gson\Gson;

class SearchController extends AbstractController
{
    /**
     * @var ComicRepository
     */
    private $comicRepository;

    /**
     * @var Gson
     */
    private $gson;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ComicRepository $comicRepository, Gson $gson, LoggerInterface $logger)
    {
        $this->comicRepository = $comicRepository;
        $this->gson = $gson;
        $this->logger = $logger;
    }

    /**
     * @Route("/search", methods={"POST"})
     *
     * @param Request $request
     * @return Response
     */
    public function searchAction(Request $request): Response
    {
        $query = $request->request->get('text');
        $comics = $this->comicRepository->search($query);

        $attachments = [];
        foreach ($comics as $comic) {
            $attachments[] = new Attachment(
                $comic->getText(),
                $comic->getId(),
                $comic->getImageUrl(),
                $query
            );
        }

        $searchResponse = new SearchResponse($attachments);

//        return new Response($this->gson->toJson($searchResponse), 200, ['content-type' => 'application/json']);
        return JsonResponse::fromJsonString($this->gson->toJson($searchResponse));
    }

    /**
     * @Route("/interact", methods={"POST"})
     *
     * @param Request $request
     * @return Response
     */
    public function interactAction(Request $request): Response
    {
        $payload = $request->request->get('payload');

        $callbackId = json_decode($payload, true)['callback_id'];
        $this->logger->log(Logger::INFO, 'interact', ['data' => $callbackId]);

        return new Response();
    }
}
