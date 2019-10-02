<?php

namespace Queue;

class Node
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var Node|null
     */
    protected $next;

    /**
     * Node constructor.
     * @param $value
     * @param Node|null $next
     */
    public function __construct($value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

    /**
     * @param Node|null $node
     */
    public function setNext(?Node $node)
    {
        $this->next = $node;
    }

    /**
     * @return Node|null
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
