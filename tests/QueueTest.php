<?php

namespace Queue\Tests;

use Queue\Queue;
use Queue\QueueEmptyException;
use StdClass;

class QueueTest extends BaseTest
{
    public function testBasicFlowIntegers()
    {
        $queue = new Queue();
        $this->assertNull($queue->enqueue(1));
        $this->assertNull($queue->enqueue(2));
        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->dequeue());
    }

    public function testBasicFlowString()
    {
        $queue = new Queue();
        $this->assertNull($queue->enqueue('a'));
        $this->assertNull($queue->enqueue('b'));
        $this->assertEquals('a', $queue->peek());
        $this->assertEquals('a', $queue->dequeue());
        $this->assertEquals('b', $queue->peek());
        $this->assertEquals('b', $queue->dequeue());
    }

    public function testBasicFlowRandom()
    {
        $queue = new Queue();
        $this->assertNull($queue->enqueue(1));
        $this->assertNull($queue->enqueue('b'));
        $this->assertNull($queue->enqueue(new StdClass));
        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals('b', $queue->peek());
        $this->assertEquals('b', $queue->dequeue());
        $this->assertEquals(new StdClass, $queue->peek());
        $this->assertEquals(new StdClass, $queue->dequeue());
    }

    public function testDequeueException()
    {
        $queue = new Queue();
        $this->expectException(QueueEmptyException::class);
        $queue->peek();
    }

    public function testPeekException()
    {
        $queue = new Queue();
        $this->expectException(QueueEmptyException::class);
        $queue->dequeue();
    }
}
