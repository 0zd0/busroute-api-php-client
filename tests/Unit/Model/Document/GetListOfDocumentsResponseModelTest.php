<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Document;

use Exception;
use Onepix\BusrouteApiClient\Model\Document\DocumentModel;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsResponseModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfDocumentsResponseModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(GetListOfDocumentsResponseModel::getClassName());
        $model = GetListOfDocumentsResponseModel::fromArray($json);

        $this::assertNull($model->getSingleReturn());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(GetListOfDocumentsResponseModel::getClassName());
        $model = GetListOfDocumentsResponseModel::fromArray($json);

        $this::assertContainsOnlyInstancesOf(DocumentModel::class, $model->getMultipleReturns());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
