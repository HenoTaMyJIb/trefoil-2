<?php

namespace App\Helpers;

class Datatable
{
    private $query;
    private $order = 'id|asc';
    private $perPage = 25;
    private $columns = null;

    /**
     *
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     *
     */
    public function get()
    {
        return $this->query
            ->orderBy($this->getOrderColumn(), $this->getOrderDirection())
            ->paginate($this->perPage, $this->columns);
    }

    /**
     *
     */
    public function order($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     *
     */
    public function perPage($perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     *
     */
    public function columns($columns)
    {
        $this->columns = $columns;

        return $this;
    }

    private function getOrderColumn()
    {
        if (count($this->getOrderBy()) == 2) {
            return $this->getOrderBy()[0];
        }

        return 'id';
    }

    private function getOrderDirection()
    {
        if (count($this->getOrderBy()) == 2) {
            return $this->getOrderBy()[1];
        }

        return 'asc';
    }

    private function getOrderBy()
    {
        return explode('|', $this->order);
    }
}
