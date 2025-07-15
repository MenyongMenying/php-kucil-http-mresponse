<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MResponse;

use Closure;
use MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray;
use MenyongMenying\MLibrary\Kucil\Utilities\MData\MData;
use MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger;
use MenyongMenying\MLibrary\Kucil\Utilities\MObject\MObject;
use MenyongMenying\MLibrary\Kucil\Utilities\MString\MString;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-10
 */
final class MResponseJson
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
     * Objek dari class turunan 'MResponseJsonData'.
     * @var MResponseJsonData 
     */
    private MResponseJsonData $data;

    /**
     * Objek dari class turunan 'MResponseJsonCreator'.
     * @var MResponseJsonCreator 
     */
    private MResponseJsonCreator $creator;

    /**
     * Objek dari class turunan 'MResponseJsonValidator'.
     * @var MResponseJsonValidator 
     */
    private MResponseJsonValidator $validator;

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
        $this->data = new MResponseJsonData($this->mArray, $this->mObject);
        $this->creator = new MResponseJsonCreator($this->mInteger, $this->mString);
        $this->validator = new MResponseJsonValidator($this->mArray);
        return;
    }

    /**
     * Set data respon json.
     * @param  int    $code    
     * @param  string $message 
     * @param  mixed  $data    
     * @return self            
     */
    public function setData(int $code, string $message, mixed $data) :self
    {   
        $this->data->setCode($code);
        $this->data->setMessage($message);
        $this->data->setSuccess($this->validator->isSuccessResponse($code));
        $this->data->setData($data);
        return $this;
    }

    /**
     * Meneruskan konfigurasi response json.
     * @return \MenyongMenying\MLibrary\Kucil\Utilities\MData\MData 
     */
    public function getConfig() :MData
    {
        return new MData($this->mString, [
            'type' => 'json',
            'config' => new MData($this->mString, [
                'code' => $this->data->getCode(),
                'message' => $this->data->getMessage(),
                'success' => $this->data->getSuccess(),
                'data' => $this->data->getData()
            ])
        ]);
    }

    /**
     * Meneruskan methode 'createResponse()' dari class turunan 'MResponseJsonCreator'.
     * @param  int      $code    Kode respon http.
     * @param  bool     $success Status keberhasilan request.
     * @param  string   $message Pesan respon.
     * @param  mixed    $data    Data respon.
     * @return \Closure          
     */
    public function createResponse(int $code, bool $success, string $message, mixed $data) :Closure
    {
        return $this->creator->createResponse($code, $success, $message, $data);
    }
}

