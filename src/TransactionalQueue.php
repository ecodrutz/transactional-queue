<?php

namespace Queue;

class TransactionalQueue extends Queue implements TransactionableInterface
{
    protected $snapShots = [];

    /**
     * @inheritdoc
     */
    public function start(): void
    {
        $this->snapShots[] = [$this->front, $this->rear];
    }

    /**
     * @inheritdoc
     */
    public function rollback(): bool
    {
        if (count($this->snapShots) < 1) {
            return false;
        }
        [$this->front, $this->rear] = array_pop($this->snapShots);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function commit(): bool
    {
        if (count($this->snapShots) < 1) {
            return false;
        }
        array_pop($this->snapShots);

        return true;
    }
}
