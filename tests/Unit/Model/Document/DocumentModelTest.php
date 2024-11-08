<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Document;

use Exception;
use Onepix\BusrouteApiClient\Model\Document\DocumentModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class DocumentModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(DocumentModel::getClassName());
        $model = DocumentModel::fromString($json);
        $this::assertSame("Паспорт РФ", $model->getName());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(DocumentModel::getClassName());
        $model = DocumentModel::fromString($json);
        $this::assertSame("Паспорт РФ", $model->getName());
    }
}
