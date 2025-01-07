<?php

namespace App\Traits;

trait RenderToJson
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage()
        ], $this->getCode());
    }
}
