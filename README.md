<p align="center">
<a href="https://travis-ci.org/ecodrutz/transactional-queue"><img src="https://travis-ci.org/ecodrutz/transactional-queue.svg" alt="Build Status"></a>
</p>

## Module for a transactional queue

### Usage for simple queue
```
<?php
...
use Queue\Queue;
...
$queue = new Queue();
$queue->enqueue('my value');
$queue->peek(); // my value
$queue->dequeue(); // my value
```

### Usage for transactional queue

```
<?php
...
use Queue\TransactionalQueue;
...
$queue = new TransactionalQueue();
$queue->enqueue('my value');
$queue->peek(); // my value
$queue->dequeue(); // my value
$queue->start(); // new transaction started
$queue->enqueue('my value');
$queue->enqueue('my new value');
$queue->dequeue(); // my value
// end and confirm the transaction
$queue->commit();
$queue->peek(); // my new value
$queue->start();
$queue->enqueue('another value');
// end and rollback the transaction
$queue->rollback();
$queue->peek(); // my new value
```

Feel free to submit improvements!
Thanks.
