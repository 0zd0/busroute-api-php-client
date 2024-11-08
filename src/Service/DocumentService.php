<?php

namespace Onepix\BusrouteApiClient\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Enum\ApiRouteEnum;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsParametersModel;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsResponseModel;
use Onepix\BusrouteApiClient\Model\Station\StationModel;

class DocumentService extends AbstractService
{
    /**
     * @param GetListOfDocumentsParametersModel $data
     *
     * @return StationModel[]|null
     * @throws GuzzleException
     * @throws Exception
     */
    public function getListOfDocuments(GetListOfDocumentsParametersModel $data): ?array
    {
        $url = $this::buildRoute(ApiRouteEnum::Default);

        $response = $this->getClient()->post(
            $url,
            $data->toArray()
        );
        $result   = GetListOfDocumentsResponseModel::fromArray($response);

        $this->setLastResult($result);

        return $result->getMultipleReturns();
    }
}
