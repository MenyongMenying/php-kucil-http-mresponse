<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MResponse;

use Closure;
use MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger;
use MenyongMenying\MLibrary\Kucil\Utilities\MString\MString;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2026-07-01
 */
final class MResponseJsonCreator
{
    /**
     * Content type respon API.
     */
    private const CONTENT_TYPE = 'application/json';

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
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MInteger\MInteger $mInteger 
     * @return void
     */
    public function __construct(MInteger $mInteger, MString $mString)
    {
        $this->mInteger = $mInteger;
        $this->mString = $mString;
        return;
    }

    /**
     * Meneruskan respon json.
     * @param  int    $code    
     * @param  bool   $success 
     * @param  string $message 
     * @param  mixed  $data    
     * @return Closure            
     */
    public function createResponse(int $code, bool $success, string $message, mixed $data) :Closure
    {
        return function() use ($code, $success, $message, $data) {
            header('Content-Type: ' . self::CONTENT_TYPE);
            header('HTTP/1.1 ' . $code);  
            echo json_encode([
                'code' => $code,
                'success' => $success,
                'message' => $message,
                'data' => $data
            ]);
        };
    }
}