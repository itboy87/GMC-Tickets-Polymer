<?php

/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 10:33 AM
 */
class Response
{
    public $success = true;
    public $error = "";
    public $data = [];
    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->$success;
    }

    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return string
     */
    public  function getError()
    {
        return $this->$error;
    }

    public function setError($error)
    {
        $this->error = $error;
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->$data;
    }

    /**
     * @param null $data
     * @return Response
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function echo_json()
    {
        echo json_encode($this);
    }
}