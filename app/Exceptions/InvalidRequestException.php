<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidRequestException extends Exception
{
    public function __construct(string $message = "", int $code = 400)
    {
        $message  = "系统返回:<br>".$message;
        parent::__construct($message, $code);
    }

    public function render(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([ 'code'=>$this->code,'msg' => $this->message]);
        }
        return redirect()->back()->withErrors([ 'msg' => $this->message]);
    }
}
