<?php

namespace Onepix\BusrouteApiClient\Model;

use Onepix\BusrouteApiClient\Enum\ActionEnum;

trait RequestModelTrait
{
    protected ActionEnum $action;

    /**
     * @return ActionEnum
     */
    public function getAction(): ActionEnum
    {
        return $this->action;
    }

    /**
     * @param ActionEnum $action
     *
     * @return static
     */
    public function setAction(ActionEnum $action): static
    {
        $this->action = $action;

        return $this;
    }

    public static function fromArrayRequest(array $response): static
    {
        $model = new static();

        return $model->setAction($response['action']);
    }

    public function toArrayRequestData(): array
    {
        return [
            'action' => $this->getAction()
        ];
    }
}
