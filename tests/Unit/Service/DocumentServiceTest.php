<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Service;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Onepix\BusrouteApiClient\Model\Document\DocumentModel;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsParametersModel;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsResponseModel;

class DocumentServiceTest extends AbstractServiceHelper
{
    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function testGetListOfDocuments()
    {
        $this->setMockJsonModel(GetListOfDocumentsResponseModel::getClassName(), true);

        $stations = $this->document->getListOfDocuments(
            GetListOfDocumentsParametersModel::fromArray(
                $this::getStubJsonModelWithRequiredFields(GetListOfDocumentsParametersModel::getClassName())
            )
        );

        $this::assertInstanceOf(GetListOfDocumentsResponseModel::class, $this->document->getLastResult());

        $this::assertContainsOnlyInstancesOf(DocumentModel::class, $stations);
    }
}
