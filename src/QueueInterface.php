<?php

namespace Queue;

interface QueueInterface
{
    /**
     * Pushes value at bottom of the queue
     *
     * @param mixed $value
     */
    public function enqueue($value): void;

    /**
     * Removes the top-most value from the queue and returns it.
     *
     * @return mixed
     */
    public function dequeue();

    /**
     * Returns the top-most value from the queue.
     *
     * @return mixed
     */
    public function peek();
}
