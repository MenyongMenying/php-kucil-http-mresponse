<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MResponse;

use MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray;
use MenyongMenying\MLibrary\Kucil\Utilities\MData\MData;
use MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger;
use MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject;
use MenyongMenying\MLibrary\Kucil\Utilities\MString\MString;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-01
 */
final class MResponse
{
    /**
     * Objek dari class 'MInteger'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger 
     */
    private MInteger $mInteger;

    /**
     * Objek dari class 'MString'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString 
     */
    private MString $mString;

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
     * Konfigurasi response.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MData\MData 
     */
    private MData $response;

    /**
     * Objek dari class turunan 'MResponseJson'.
     * @var MResponseJson 
     */
    private MResponseJson $mResponseJson;

    /**
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger $mInteger 
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString   $mString  
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray     $mArray   
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject   $mObject  
     * @return void
     */
    public function __construct(MInteger $mInteger, MString $mString, MArray $mArray, MObject $mObject)
    {
        $this->mInteger = $mInteger;
        $this->mString = $mString;
        $this->mArray = $mArray;
        $this->mObject = $mObject;
        $this->mResponseJson = new MResponseJson($this->mInteger, $this->mString, $this->mArray, $this->mObject);
        return;
    }

    /**
     * Mengatur konfigurasi response json.
     * @param  int    $code    Kode respon http.
     * @param  string $message Pesan respon.
     * @param  mixed  $data    Data respon.
     * @return self            
     */
    public function json(int $code, string $message = '', mixed $data = null) :self
    {
        $this->response = $this->mResponseJson->setData($code, $message, $data)->getConfig();
        return $this;
    }

    /**
     * Mengirimkan response.
     * @return void 
     */
    public function send():void
    {
        if (isset($this->response)) {
            switch($this->response->type) {
                case 'json':
                        ($this->mResponseJson->createResponse(
                            $this->response->config->code,
                            $this->response->config->success,
                            $this->response->config->message,
                            $this->response->config->data
                        ))();
                    return;
                default:
                    return;
            }
        }
        return;
    }
}
