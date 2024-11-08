<?php

namespace Onepix\BusrouteApiClient\Test\Unit\Model\Payment;

use DateTime;
use Exception;
use Onepix\BusrouteApiClient\Model\Payment\PaymentModel;
use Onepix\BusrouteApiClient\Model\Ticket\TicketModel;
use Onepix\BusrouteApiClient\Test\TestCase;
use Onepix\BusrouteApiClient\Test\Util\StubTrait;

class PaymentModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PaymentModel::getClassName());
        $model = PaymentModel::fromArray($json);
        $this::assertNull($model->getTransaction());
        $this::assertNull($model->getId());
        $this::assertNull($model->getAmount());
        $this::assertNull($model->getTassOrderId());
        $this::assertNull($model->getDateOfPurchase());
        $this::assertNull($model->getCarrier());
        $this::assertNull($model->getBusname());
        $this::assertNull($model->getBarcode());
        $this::assertNull($model->getPlatnom());
        $this::assertNull($model->getMarshnom());
        $this::assertNull($model->getPvednom());
        $this::assertNull($model->getBuskat());
        $this::assertNull($model->getTickets());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PaymentModel::getClassName());
        $model = PaymentModel::fromArray($json);
        $this::assertSame('4791563', $model->getTransaction());
        $this::assertSame('231f324b6ed71f83ff51913d1301ee13', $model->getId());
        $this::assertSame(401.25, $model->getAmount());
        $this::assertSame('412498', $model->getTassOrderId());
        $this::assertEquals(new DateTime('31.01.2017'), $model->getDateOfPurchase());
        $this::assertSame('ИП Матвеева О.В.', $model->getCarrier());
        $this::assertSame('MERCEDES 49', $model->getBusname());
        $this::assertSame('00100000000203557726', $model->getBarcode());
        $this::assertSame('1', $model->getPlatnom());
        $this::assertSame('4630', $model->getMarshnom());
        $this::assertSame('02307420/03', $model->getPvednom());
        $this::assertSame('', $model->getBuskat());
        $this::assertContainsOnlyInstancesOf(TicketModel::class, $model->getTickets());
    }
}
