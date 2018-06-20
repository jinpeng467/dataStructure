<?php
/**
 *
 * 队列是一种特殊的线性表， 特殊之处在于表的前端进行删除操作， 表的后端进行插入操作
 * 队列是一种受限制的线性表，进行插入操作的端称为队尾，进行删除操作的称为队头
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/20
 * Time: 22:03
 */

class Node
{
    public $data;
    public $next;

    public function __construct($data, $next = null)
    {
        $this->data = $data;
        $this->next  = $next;
    }
}


class Queue
{
    public $front = null;
    public $rear = null;

    public $size = 0;

    public function __construct()
    {
    }

    public function push($data)
    {
        $n = new Node($data);
        if ($this->front == null && $this->rear == nill){
            $this->front = $n;
            $this->rear = $n;
        } else {
            $this->rear->next = $n;
            $this->rear = $n;
        }
        $this->size++;
    }

    public function shift()
    {
        if ($this->front) {
            $this->size--;
            $data = $this->front->data;
            $this->front = $this->front->next;
            return $data;
        }
        return null;
    }
}

