<?php

namespace Bazinga\Bundle\JsTranslationBundle\Filter;

use Symfony\Component\HttpFoundation\Request;

interface LocaleRequestFilter {
    function filterLocalesFromRequest(Request $request);
}
