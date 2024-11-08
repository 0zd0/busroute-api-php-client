<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Document;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;
use Onepix\BusrouteApiClient\Model\Document\GetListOfDocumentsParametersModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class GetListOfDocumentsParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(GetListOfDocumentsParametersModel::getClassName());
        $model = GetListOfDocumentsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_DOCUMENTS, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(GetListOfDocumentsParametersModel::getClassName());
        $model = GetListOfDocumentsParametersModel::fromArray($json);

        $this::assertSame(ActionEnum::GET_LIST_OF_DOCUMENTS, $model->getAction());

        $toApi = $model->toArray();
        $this::assertArraysAreEqual($json, $toApi);
    }
}
