<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "{{ 'Dach Dalin Website' }}",
      "description": "{{  getWebsiteConfig('description') }}",
      "url": "{{ url()->current() }}"
    }
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id={{ trim(getWebsiteConfig('google_analytics')) }}">
</script>
<script>
    "use strict";
    $(document).ready(function() {
        var MEASUREMENT_ID = "{{ getWebsiteConfig('google_analytics') }}";
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', MEASUREMENT_ID);
    });
</script>
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '{{ getWebsiteConfig('google_tags') }}');
</script>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ getWebsiteConfig('google_tags') }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
