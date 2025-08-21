@php
    $uniqueId = 'html_content_' . rand(111111111, 999999999);
@endphp

<div class="html-content">
    <iframe id="{{ $uniqueId }}" scrolling="no" srcdoc="{!! htmlspecialchars($slot) !!}" frameborder="0"
        style="width:100%; overflow:hidden;"></iframe>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const iframe = document.getElementById("{{ $uniqueId }}");
        const doc = iframe.contentDocument || iframe.contentWindow.document;

        let contentHeight = doc.body.scrollHeight;

        if (contentHeight < 40) {
            contentHeight = contentHeight * 2;
        } else if (contentHeight < 100) {
            contentHeight = contentHeight * 1.5;
        } else if (contentHeight < 500) {
            contentHeight = contentHeight * 1.1;
        } else if (contentHeight < 800) {
            contentHeight = contentHeight * 1.03;
        } else {
            contentHeight = contentHeight * 1.04;
        }

        iframe.style.height = contentHeight + "px";

        doc.dir = "{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}";
        doc.body.setAttribute('lang', "{{ app()->getLocale() }}");
        doc.body.setAttribute('dir', doc.dir);
    });
</script>