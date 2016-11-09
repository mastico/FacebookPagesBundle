<?php

namespace FL\FacebookPagesBundle\Action\Webhook;

use FL\FacebookPagesBundle\Storage\PageRatingStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingNew
{
    /**
     * @var PageRatingStorageInterface
     */
    private $pageRatingsStorage;

    /**
     * @param PageRatingStorageInterface $pageRatingsStorage
     */
    public function __construct(PageRatingStorageInterface $pageRatingsStorage)
    {
        $this->pageRatingsStorage = $pageRatingsStorage;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        // todo get rating from Request and persist
        $jsonObject = json_decode($request->getContent(), true);

        if (! array_key_exists('entry.time', $jsonObject)) {
            return new JsonResponse('{}', 400);
        }

        return new JsonResponse([$jsonObject['entry.time']], 200);
    }
}
