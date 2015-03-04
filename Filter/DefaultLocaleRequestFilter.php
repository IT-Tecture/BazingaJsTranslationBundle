<?php

namespace Bazinga\Bundle\JsTranslationBundle\Filter;

use Symfony\Component\HttpFoundation\Request;

class DefaultLocaleRequestFilter implements LocaleRequestFilter {
    function filterLocalesFromRequest(Request $request)
    {
        if (null !== $locales = $request->query->get('locales')) {
            $locales = explode(',', $locales);
        } else {
            $locales = array($request->getLocale());
        }

        $locales = array_filter($locales, function ($locale) {
            return 1 === preg_match('/^[a-z]{2}([-_]{1}[a-zA-Z]{2})?$/', $locale);
        });

        $locales = array_unique(array_map(function ($locale) {
            return trim($locale);
        }, $locales));

        return $locales;
    }
}
