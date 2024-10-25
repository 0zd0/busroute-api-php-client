<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Ticket;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Enum\GenderEnum;
use Onepix\BusrouteApiClient\Enum\TicketTypeEnum;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class TicketModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(TicketModel::getClassName());
        $model = TicketModel::fromArray($json);
        $this::assertNull($model->getSurname());
        $this::assertNull($model->getFirstname());
        $this::assertNull($model->getPatronymic());
        $this::assertNull($model->getDocument());
        $this::assertNull($model->getDocumentSeries());
        $this::assertNull($model->getDocumentNumber());
        $this::assertNull($model->getDateOfBirth());
        $this::assertNull($model->getNationality());
        $this::assertNull($model->getGender());
        $this::assertNull($model->getTicketType());
        $this::assertNull($model->getTariff());
        $this::assertNull($model->getCommission());
        $this::assertNull($model->getServiceCharge());
        $this::assertNull($model->getAgentCharge());
        $this::assertNull($model->getAmount());
        $this::assertNull($model->getTicketSeries());
        $this::assertNull($model->getTicketNumber());
        $this::assertNull($model->getTicketBarcode());
        $this::assertNull($model->getStatus());
        $this::assertNull($model->getRefund());

        $toApi = $model->toArray();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(TicketModel::getClassName());
        $model = TicketModel::fromArray($json);
        $this::assertSame("Иванов", $model->getSurname());
        $this::assertSame("Василий", $model->getFirstname());
        $this::assertSame("Петрович", $model->getPatronymic());
        $this::assertSame("Паспорт РФ", $model->getDocument());
        $this::assertSame("4511", $model->getDocumentSeries());
        $this::assertSame("232425", $model->getDocumentNumber());
        $this::assertEquals(new DateTime("01.02.2008"), $model->getDateOfBirth());
        $this::assertSame("РОССИЯ", $model->getNationality());
        $this::assertSame(GenderEnum::MALE, $model->getGender());
        $this::assertSame(TicketTypeEnum::CHILD, $model->getTicketType());
        $this::assertSame(125, $model->getTariff());
        $this::assertSame(0.0, $model->getCommission());
        $this::assertSame(1.0, $model->getServiceCharge());
        $this::assertSame(8.75, $model->getAgentCharge());
        $this::assertSame(133.75, $model->getAmount());
        $this::assertSame("011777267797", $model->getTicketSeries());
        $this::assertSame("319880017", $model->getTicketNumber());
        $this::assertSame("772605009503", $model->getTicketBarcode());
        $this::assertSame("Возврат", $model->getStatus());
        $this::assertSame("267.5", $model->getRefund());

        $toApi = $model->toArray();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
