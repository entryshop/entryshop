<?php

namespace App\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class EntryShopCspPolicy extends Policy
{
    public function configure()
    {
        $this
            ->configureForDefault()
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

}
