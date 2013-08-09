<?php

namespace KAC\SiteBundle\Manager\Order;

use ArrayAccess;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Queue implements ArrayAccess {
    private $orders;
    private $session;
    private $serializer;

    public function __construct(SessionInterface $session, Serializer $serializer)
    {
        $this->session = $session;
        $this->serializer = $serializer;
    }

    private function getQueue()
    {
        if($this->orders === null)
        {
            if($this->session->has('order.queue'))
            {
                $this->orders = $this->serializer->deserialize($this->session->get('order.queue'), 'array', 'json');
            } else {
                $this->orders = array();
            }
        }

        return $this->orders;
    }

    private function saveQueue()
    {
        if($this->orders !== null)
        {
            $this->session->set('order.queue', $this->serializer->serialize($this->orders, 'json'));
        }
    }

    public function offsetSet($offset, $value) {
        $this->getQueue();

        if(!in_array($value, $this->orders))
        {
            if (is_null($offset)) {
                $this->orders[] = $value;
            } else {
                $this->orders[$offset] = $value;
            }

            $this->saveQueue();
        }
    }
    public function offsetExists($offset) {
        $this->getQueue();

        return isset($this->orders[$offset]);
    }
    public function offsetUnset($offset) {
        $this->getQueue();

        unset($this->orders[$offset]);

        $this->saveQueue();
    }
    public function offsetGet($offset) {
        $this->getQueue();

        return isset($this->orders[$offset]) ? $this->orders[$offset] : null;
    }
    public function all()
    {
        return $this->getQueue();
    }

    public function clear()
    {
        $this->orders = null;
        $this->session->remove('order.queue');
    }
}