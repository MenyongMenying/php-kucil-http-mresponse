<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MResponse;

use MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-10
 */
final class MResponseJsonValidator
{
    /**
     * Kode respon http yang berhasil.
     */
    private const SUCCESS_CODE = [200, 201, 202, 203, 204, 205, 206];

    /**
     * Objek dari class 'MArray'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray 
     */
    private MArray $mArray;

    /**
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MArray\MArray $mArray 
     * @return void
     */
    public function __construct(MArray $mArray)
    {
        $this->mArray = $mArray;
        return;
    }
    
    /**
     * Mengecek apakah request berhasil atau tidak berdasarkan kode respon http.
     * @param  int  $code Kode respon http.
     * @return bool       Status keberhasilan request.
     */
    public function isSuccessResponse(int $code) :bool
    {
        return $this->mArray->valueExists(self::SUCCESS_CODE, $code);
    }
}

