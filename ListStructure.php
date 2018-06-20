<?php

/**
 * 链表数据结构
 */

class Node
{
    public $data; //数据
    public $next; //下一个指向

    public function __construct($data, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }

}

//单链表
class SingleLinkList
{
    private $header = null;
    private $last = null;
    private $size = 0;

    public function __construct()
    {
    }


    public function add($data)
    {
        $node = new Node($data);
        if ($this->header == null && $this->last == null) {
            $this->header = $node;
            $this->last = $node;
        } else {
            $this->last->next = $node;
            $this->last = $node;
        }
    }

    public function del($data)
    {
        $node = $this->header;
        if ($node->data == $data) {
            $this->header = $this->header->next;
            return true;
        } else {
            while ($node->next->data == $data) {
                $node->next = $node->next->next;
                return true;
            }
        }
        return false;
    }


    /**
     * 数据更新
     * @param $old
     * @param $new
     * @return bool
     */
    public function update($old, $new)
    {
        $node = $this->header;
        while ($node->next != null) {
            if ($node->data == $old) {
                $old->data == $new;
                return true;
            }
            $node = $node->next;
        }
    }

    /**
     * 查找
     * @param $data
     */
    public function find($data)
    {
        $node = $this->header;
        while ($node->next != nuill) {
            if ($node->data == $data) {
                echo 'found';
                return;
            }
            $node = $node->next;
        }
        echo 'not found';
    }
}