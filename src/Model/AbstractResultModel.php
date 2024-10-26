<?php

namespace Onepix\BusrouteApiClient\Model;

use Exception;
use Onepix\BusrouteApiClient\Enum\ActionEnum;

abstract class AbstractResultModel extends AbstractModel
{
    public const RESULT_KEY      = 'results';
    public const COUNTER_KEY     = 'counter';
    public const ACTION_KEY      = 'action';
    public const ERROR_KEY       = 'error';
    public const DESCRIPTION_KEY = 'description';

    /**
     * Model class in return
     */
    public const RETURN_MODEL = '';

    public const ARRAY_MODELS = true;

    protected ?int $counter = null;
    protected ActionEnum $action;
    protected int $error;
    protected ?string $description = null;

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
     * @return ActionEnum
     */
    public function getAction(): ActionEnum
    {
        return $this->action;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
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
     * @param ActionEnum $action
     *
     * @return self
     */
    public function setAction(ActionEnum $action): self
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
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * @throws Exception
     */
    public function setReturn(array $return): AbstractModel
    {
        if (static::RETURN_MODEL === '') {
            return $this;
        }
        /**
         * @var AbstractModel $returnModel
         */
        $returnModel = static::RETURN_MODEL;

        if (static::ARRAY_MODELS) {
            $this->setMultipleReturns(array_map(
                function ($item) use ($returnModel) {
                    if ($returnModel::IS_ONE_FIELD) {
                        return $returnModel::fromString($item);
                    } elseif (is_array($item)) {
                        return $returnModel::fromArray($item);
                    }

                    throw new Exception("Invalid item type");
                },
                $return
            ));
        } else {
            $this->setSingleReturn($returnModel::fromArray($return));
        }

        return $this;
    }
    
    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function fromArray(array $response): static
    {
        $model = new static();

        $model
            ->setAction(ActionEnum::from($response[self::ACTION_KEY]))
            ->setError($response[self::ERROR_KEY])
            ->setCounter($response[self::COUNTER_KEY] ?? null)
            ->setDescription($response[self::DESCRIPTION_KEY] ?? null);

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
        if (static::ARRAY_MODELS) {
            $result = array_map(fn($item) => $item::IS_ONE_FIELD ? $item->toString() : $item->toArray(), $this->getMultipleReturns() ?? []);
            if (empty($result)) {
                $result = null;
            }
        } else {
            $result = $this->getSingleReturn()?->toArray() ?? null;
        }

        return array_filter(
            [
                self::RESULT_KEY      => $result,
                self::ERROR_KEY       => $this->getError(),
                self::ACTION_KEY      => $this->getAction()?->value,
                self::COUNTER_KEY     => $this->getCounter(),
                self::DESCRIPTION_KEY => $this->getDescription(),
            ],
            function ($value) {
                return $value !== null;
            }
        );
    }
}
