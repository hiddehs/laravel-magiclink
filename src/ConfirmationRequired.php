<?php

namespace MagicLink;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

trait ConfirmationRequired
{
    abstract protected function confirmationRequired();

    abstract protected function getMagikLinkId();
    
    public function getResponseConfirmationRequired()
    {
        $responseFromForm = $this->getResponseConfirmationRequiredForm();

        return $responseFromForm;
    }

    private function getConfirmationRequiredFromForm()
    {
        return request()->get('auto-confirm');
    }


    private function getResponseConfirmationRequiredForm()
    {
        $autoConfirmed = $this->getConfirmationRequiredFromForm();
        if ($this->protectWithConfirmation()) {
            if ($autoConfirmed) {
                return null; // middleware will continue redirect to action
            }

            return response()->view('magiclink::auto-confirm', [], 403);
        }

        return null;
    }
}