<?php

namespace Queue\Tests;

use Queue\TransactionalQueue;

class TransactionalQueueTest extends BaseTest
{
    public function testTransactions()
    {
        $queue = new TransactionalQueue();
        $this->assertNull($queue->enqueue(1));
        $this->assertNull($queue->enqueue(2));
        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(1, $queue->dequeue());
        $queue->start();
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->dequeue());
        $this->assertTrue($queue->rollback());
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->dequeue());
        $queue->start();
        $queue->start();
        $queue->start();
        $this->assertNull($queue->enqueue(1));
        $this->assertTrue($queue->commit());
        $this->assertNull($queue->enqueue(2));
        $this->assertTrue($queue->commit());
        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(1, $queue->dequeue());
        $this->assertTrue($queue->commit());
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->dequeue());
        $this->assertFalse($queue->commit());
        $this->assertFalse($queue->rollback());
    }
}
