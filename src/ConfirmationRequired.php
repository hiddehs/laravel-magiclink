<?php

namespace MagicLink;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

trait ConfirmationRequired
{
    abstract protected function confirmationRequired(): bool;

    abstract protected function getMagikLinkId();
//
//    protected $cookieName = 'magic-link-access-code';
//
    public function getResponseConfirmationRequired()
    {
        $responseFromForm = $this->getResponseAccessCodeFromForm();

        return $responseFromForm
            ? $responseFromForm
            : $this->getResponseAccessCodeFromCookie();
    }
//
//    /**
//     * Check if access code is right.
//     */
//    private function checkAccessCode(?string $accessCode): bool
//    {
//        if ($accessCode === null) {
//            return false;
//        }
//
//        return Hash::check($accessCode, $this->getAccessCode());
//    }
//
//    /**
//     * The action was protected with an access code.
//     */
//    private function protectedWithAccessCode(): bool
//    {
//        return ! is_null($this->getAccessCode() ?? null);
//    }
//
//    private function getResponseAccessCodeFromForm()
//    {
//        $accessCode = $this->getAccessCodeFromForm();
//
//        if (
//            $this->protectedWithAccessCode()
//            && $accessCode
//            && $this->checkAccessCode($accessCode)
//        ) {
//            return redirect(request()->url())->withCookie(
//                cookie(
//                    $this->cookieName,
//                    encrypt($this->getMagikLinkId().'|'.$accessCode),
//                    0,
//                    '/'
//                )
//            );
//        }
//
//        return null;
//    }
//
//    private function getResponseAccessCodeFromCookie()
//    {
//        if ($this->protectedWithAccessCode()) {
//            if ($this->getAccessCodeFromCookie()) {
//                if ($this->checkAccessCode($this->getAccessCodeFromCookie())) {
//                    return null;
//                }
//            }
//
//            return response()->view('magiclink::auto-confirm', [], 403);
//        }
//
//        return null;
//    }
//
//    private function getAccessCodeFromForm()
//    {
//        return request()->get('access-code');
//    }
//
//    private function getAccessCodeFromCookie()
//    {
//        $accessCodeCookies = request()->cookie($this->cookieName);
//
//        if (! $accessCodeCookies) {
//            return null;
//        }
//
//        try {
//            $cookie = Arr::last((array) $accessCodeCookies);
//
//            [$magiclinkId, $accessCode] = explode('|', decrypt($cookie));
//
//            if ($magiclinkId === $this->getMagikLinkId()) {
//                return $accessCode;
//            }
//        } catch (DecryptException $e) {
//        }
//
//        return null;
//    }
}
