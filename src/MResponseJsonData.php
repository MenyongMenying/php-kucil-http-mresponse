<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MResponse;

use MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray;
use MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2026-07-01
 */
final class MResponseJsonData
{
    /**
     * Objek dari class 'MArray'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray 
     */
    private MArray $mArray;

    /**
     * Objek dari class 'MObject'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject 
     */
    private MObject $mObject;

    /**
     * Kode respon http.
     * @var int 
     */
    private int $code;

    /**
     * Status kesuksesa request.
     * @var bool 
     */
    private bool $success;

    /**
     * Pesan respon.
     * @var string 
     */
    private string $message;

    /**
     * Data yang dikirimkan pada respon.
     * @var mixed 
     */
    private mixed $data;

    /**
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray   $mArray  
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject $mObject 
     * @return void
     */
    public function __construct(MArray $mArray, MObject $mObject)
    {
        $this->mArray = $mArray;
        $this->mObject = $mObject;
        return;
    }

    /**
     * Set property $this->code.
     * @param  int  $code Nilai yanng akan diset ke property $this->code.
     * @return void       
     */
    public function setCode(int $code) :void
    {
        $this->code = $code;
        return;
    }

    /**
     * Meneruskan nilai property $this->code.
     * @return int Nilai property $this->code.
     */
    public function getCode() :int
    {
        if ($this->mObject->indexExists($this, 'code')) {
            return $this->code;
        }
        return 0;
    }

    /**
     * Set property $this->success.
     * @param  bool $success Nilai yang akan diset ke property $this->success.
     * @return void          
     */
    public function setSuccess(bool $success) :void
    {
        $this->success = $success;
        return;
    }

    /**
     * Meneruskan nilai property $this->success.
     * @return bool Nilai property $this->success.
     */
    public function getSuccess() :bool
    {
        if ($this->mObject->indexExists($this, 'success')) {
            return $this->success;
        }
        return false;
    }

    /**
     * Set property $this->message.
     * @param  string $message Niliai yang akan diset ke property $this->message.
     * @return void            
     */
    public function setMessage(string $message) :void
    {
        $this->message = $message;
        return;
    }

    /**
     * Meneruskan nilai property $this->message.
     * @return string Nilai property $this->message.
     */
    public function getMessage() :string
    {
        if ($this->mObject->indexExists($this, 'message')) {
            return $this->message;
        }
        return '';
    }

    /**
     * Meneruskan nilai property $this->data.
     * @param  mixed $data Nilai yang akan diset ke property $this->data.
     * @return void        
     */
    public function setData(mixed $data) :void
    {
        $this->data = $data;
        return;
    }

    /**
     * Meneruskan nilai property $this->data.
     * @return mixed Nilai property $this->data.
     */
    public function getData() :mixed
    {
        if ($this->mObject->indexExists($this, 'data')) {
            return $this->data;
        }
        return null;
    }
}