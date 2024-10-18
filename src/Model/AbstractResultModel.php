<?php

namespace Onepix\BusrouteApiClient\Model;

use Onepix\BusrouteApiClient\Enum\ActionEnum;

abstract class AbstractResultModel extends AbstractModel
{
    public const RESULT_KEY  = 'results';
    public const COUNTER_KEY = 'counter';
    public const ACTION_KEY  = 'action';
    public const ERROR_KEY   = 'error';

    /**
     * Model class in return
     */
    public const RETURN_MODEL = '';

    public const ARRAY_MODELS = true;

    protected ?int $counter;
    protected ?ActionEnum $action;
    protected int $error;

    /**
     * Single entity or null
     *
     * @var AbstractModel|null
     */
    protected ?AbstractModel $singleReturn = null;

    /**
     * List of entities or null
     *
     * @var AbstractModel[]|null
     */
    protected ?array $multipleReturns = null;

    /**
     * @return AbstractModel|null
     */
    public function getSingleReturn(): ?AbstractModel
    {
        return $this->singleReturn;
    }

    /**
     * @return AbstractModel[]|null
     */
    public function getMultipleReturns(): ?array
    {
        return $this->multipleReturns;
    }

    /**
     * @return ActionEnum|null
     */
    public function getAction(): ?ActionEnum
    {
        return $this->action;
    }

    /**
     * @return int|null
     */
    public function getCounter(): ?int
    {
        return $this->counter;
    }

    /**
     * @return int
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * @param ActionEnum|null $action
     *
     * @return self
     */
    public function setAction(?ActionEnum $action): self
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @param int|null $counter
     *
     * @return self
     */
    public function setCounter(?int $counter): self
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * @param int $error
     *
     * @return self
     */
    public function setError(int $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param AbstractModel[]|null $multipleReturns
     *
     * @return self
     */
    public function setMultipleReturns(?array $multipleReturns): self
    {
        $this->multipleReturns = $multipleReturns;

        return $this;
    }

    /**
     * @param AbstractModel|null $singleReturn
     *
     * @return self
     */
    public function setSingleReturn(?AbstractModel $singleReturn): self
    {
        $this->singleReturn = $singleReturn;

        return $this;
    }

    /**
     * @param array $return
     *
     * @return AbstractModel
     */
    public function setReturn(array $return): AbstractModel
    {
        /**
         * @var AbstractModel $returnModel
         */
        $returnModel = static::RETURN_MODEL;

        if (static::ARRAY_MODELS) {
            $this->multipleReturns = array_map(
                function ($item) use ($returnModel) {
                    if (is_string($item)) {
                        return $returnModel::fromString($item);
                    } elseif (is_array($item)) {
                        return $returnModel::fromArray($item);
                    }

                    return $item;
                },
                $return
            );
        } else {
            $this->singleReturn = static::RETURN_MODEL::fromArray($return);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): static
    {
        $model = new static();

        $model
            ->setAction(ActionEnum::tryFrom($response[self::ACTION_KEY ?? '']))
            ->setError($response[self::ERROR_KEY])
            ->setCounter($response[self::COUNTER_KEY] ?? null);

        if (isset($response[self::RESULT_KEY])) {
            $model->setReturn($response[self::RESULT_KEY]);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter(
            [
                self::RESULT_KEY  => ! self::ARRAY_MODELS
                    ? $this->getSingleReturn()?->toArray()
                    : array_map(fn($item) => $item->toArray(), $this->getMultipleReturns() ?? []),
                self::ERROR_KEY   => $this->getError(),
                self::ACTION_KEY  => $this->getAction()?->value,
                self::COUNTER_KEY => $this->getCounter(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
