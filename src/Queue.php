<?php

namespace Queue;

class Queue implements QueueInterface
{
    /**
     * @var Node|null
     */
    protected $front, $rear;

    /**
     * @inheritdoc
     */
    public function enqueue($value): void
    {
        $new = new Node($value);
        if (is_null($this->front)) {
            $this->front = $this->rear = $new;

            return;
        }

        $this->rear->setNext($new);
        $this->rear = $new;
    }

    /**
     * @inheritdoc
     */
    public function dequeue()
    {
        if (is_null($this->front)) {
            throw new QueueEmptyException();
        }
        $top = $this->front;
        $this->front = $top->getNext();

        return $top->getValue();
    }

    /**
     * @inheritdoc
     */
    public function peek()
    {
        if (is_null($this->front)) {
            throw new QueueEmptyException();
        }

        return $this->front->getValue();
    }
}
