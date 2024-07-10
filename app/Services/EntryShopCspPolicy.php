<?php

namespace App\Services;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class EntryShopCspPolicy extends Policy
{
    public function configure()
    {
        $this
            ->configureForDefault()
            ->configureForGoogle()
            ->configureForCDN()
            ->reportOnly();

        if (app()->hasDebugModeEnabled()) {
            $this->configureForDebug();
        }
    }

    protected function configureForDebug()
    {
        return $this
            ->addDirective(Directive::CONNECT, 'ws:');
    }

    protected function configureForDefault()
    {
        return $this->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::FONT, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF)
            ->addDirective(Directive::DEFAULT, Keyword::SELF)
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, Keyword::SELF)
            ->addDirective(Directive::IMG, 'data:')
            ->addDirective(Directive::FONT, 'data:')
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::SCRIPT, Keyword::SELF)
            ->addDirective(Directive::STYLE, Keyword::SELF)
            ->addNonceForDirective(Directive::SCRIPT)
            ->addNonceForDirective(Directive::STYLE);
    }

    protected function configureForGoogle()
    {
        return $this
            ->addDirective(Directive::FONT, 'fonts.gstatic.com')
            ->addDirective(Directive::FONT, 'fonts.googleapis.com')
            ->addDirective(Directive::FONT, 'fonts.bunny.net')
            ->addDirective(Directive::STYLE, 'fonts.googleapis.com')
            ->addDirective(Directive::STYLE, 'fonts.gstatic.com')
            ->addDirective(Directive::FRAME, ['https://www.google.com/recaptcha/', 'https://recaptcha.google.com/recaptcha/'])
            ->addDirective(Directive::SCRIPT, ['https://www.google.com/recaptcha/', 'https://www.gstatic.com/recaptcha/']);
    }

    protected function configureForCDN()
    {
        return $this
            ->addDirective(Directive::STYLE, 'https://cdn.jsdelivr.net')
            ->addDirective(Directive::STYLE, 'https://api.mapbox.com')
            ->addDirective(Directive::STYLE, 'https://fonts.bunny.net')
            ->addDirective(Directive::STYLE, 'https://unpkg.com')
            ->addDirective(Directive::SCRIPT, 'https://cdn.jsdelivr.net')
            ->addDirective(Directive::SCRIPT, 'https://api.mapbox.com')
            ->addDirective(Directive::SCRIPT, 'https://cdnjs.cloudflare.com')
            ->addDirective(Directive::SCRIPT, 'https://unpkg.com');
    }

}
