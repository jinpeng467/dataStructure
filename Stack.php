<?php
/**
 * 栈  是一种运算受限的线性表， 其限制是仅允许在表的一端进行插入和删除运算
 * 允许操作的一端被称为栈顶， 相对地， 把另一端称为栈底
 * 向一个栈插入新元素又称为压栈，它把新元素放到栈顶元素的上面
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/21
 * Time: 11:27
 */

class Node
{
    public $data = null;
    public $pre = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

}

class Stack
{
    private $top = null;
    public $size = 0;

    public function push($data)
    {
        if ($this->top == null) {
            $this->top = new Node($data);
        } else {
            $n = new Node($data);
            $n->pre = $this->top;
            $this->top = $n;
        }
        $this->size++;
    }

    public function pop()
    {
        $data = $this->top->data;
        $this->top = $this->top->prev;
        $this->size--;
        return $data;
    }

    public function getAll()
    {
        $result = [];
        while ($this->top) {
            $result[] = $this->top->data;
            $this->top = $this->top->pre;
        }

        return $result;
    }
}
/*$s = new Stack();
$s->push('aaaaa');
$s->push('bbbbb');
$s->push('ccccc');
$res = $s->getAll();*/
//var_dump($res);
//var_dump(4324);
//exit();


//栈匹配括号

$stack = new SplStack();
$str = '[[()]][]';
echo $str . "<br>";

for ($i = 0; $i < strlen($str); $i ++) {
    if ($str[$i] == "[") {
        $stack->push(']');
    } else if ($str[$i] == '(') {
        $stack->push(')');
    } else if ($str[$i] == ')') {
        if (!$stack->isEmpty()) {
            $pop = $stack->pop();
            if ($pop != ')') {
                echo "not match";
                exit();
            }
        } else {
            echo 'not match';
            exit();
        }
    } else if ($str[$i] == '}') {
        if (!$stack->isEmpty()) {
            $pop = $stack->pop();
            if ($pop != ']') {
                echo "not match";
                exit();
            }
        } else {
            echo "not match";
            exit();
        }
    }
}
if ($stack->isEmpty()){
    echo '匹配';
} else {
    echo '不匹配';
}
