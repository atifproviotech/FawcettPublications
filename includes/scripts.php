<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<script src="/assets/js/form-submit.js"></script>
<script type="module" src="/assets/js/custom.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<script>
    AOS.init();
    document.body.removeAttribute('data-aos-easing');
    document.body.removeAttribute('data-aos-duration');
    document.body.removeAttribute('data-aos-delay');
</script>
<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
</script>
<script>
(function () {
  const ZENDESK_KEY = "2152a1f9-69c1-47f7-8bd1-ead0e3c665d9";
  const SNIPPET_ID = "ze-snippet";
  const SNIPPET_SRC = "https://static.zdassets.com/ekr/snippet.js?key=" + ZENDESK_KEY;

  // Open Zendesk or Zopim chat
  function openChat() {
    try {
      if (window.zE && typeof zE === "function") {
        zE("webWidget", "open");
        return;
      }
    } catch (e) {}

    try {
      if (window.$zopim && $zopim.livechat) {
        $zopim.livechat.window.show();
      }
    } catch (e) {}
  }

  // Wait until chat widget is ready
  function onChatReady(callback) {
    let tries = 0;
    const maxTries = 120; // Retry up to ~60s

    (function poll() {
      tries++;
      if (window.zE || (window.$zopim && $zopim.livechat)) {
        callback();
        return;
      }
      if (tries < maxTries) {
        setTimeout(poll, 500);
      }
    })();
  }

  // jQuery-dependent enhancements
  function runJqueryTasks() {
    if (!window.jQuery) return;

    const $ = jQuery;

    // Lazy-load images
    $(".lazy").each(function () {
      const $el = $(this);
      const src = $el.attr("data-src");
      if (src) $el.attr("src", src);
    });

    // Replace d-href with href
    $("[d-href]").each(function () {
      const $el = $(this);
      const href = $el.attr("d-href");
      if (href) $el.attr("href", href);
    });

    // Load deferred scripts
    $("script[r-src]").each(function () {
      const $el = $(this);
      const rsrc = $el.attr("r-src");
      if (rsrc) $el.attr("src", rsrc);
    });
  }

  // Wire up .chat and .chatt elements to open chat on click
  function wireClickToOpen() {
    document.addEventListener("click", function (e) {
      const t = e.target;
      if (!t) return;
      if (t.closest && (t.closest(".chat") || t.closest(".chatt"))) {
        e.preventDefault();
        openChat();
      }
    }, true);
  }

  // Auto-open chat when unread messages appear
  function wireUnreadAutoOpen() {
    try {
      if (window.zE && typeof zE === "function") {
        zE("webWidget:on", "chat:unreadMessages", function (count) {
          if (count >= 1) zE("webWidget", "open");
        });
      }
    } catch (e) {}

    try {
      if (window.$zopim && $zopim.livechat && $zopim.livechat.setOnUnreadMsgs) {
        $zopim.livechat.setOnUnreadMsgs(function (count) {
          if (count >= 1) $zopim.livechat.window.show();
        });
      }
    } catch (e) {}
  }

  // Load the Zendesk snippet after a delay
  function loadZendesk() {
    if (document.getElementById(SNIPPET_ID)) return; // Prevent multiple loads

    const script = document.createElement("script");
    script.id = SNIPPET_ID;
    script.src = SNIPPET_SRC;
    script.async = true;
    script.onload = function () {
      runJqueryTasks();
      onChatReady(wireUnreadAutoOpen);
    };

    document.head.appendChild(script);
  }

  // Initialize script
  function init() {
    wireClickToOpen();
    setTimeout(loadZendesk, 6000); // Load widget after 6s
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
 </script>