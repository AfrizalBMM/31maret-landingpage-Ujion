(() => {
  const state = {
    sessionId: localStorage.getItem('lp_session_id') || crypto.randomUUID(),
    sentMilestones: new Set(),
  };

  localStorage.setItem('lp_session_id', state.sessionId);

  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
  const trackingEndpoint = window.lpConfig?.trackingEndpoint;

  const postEvent = async (eventName, label = '', value = null, metadata = {}) => {
    if (!trackingEndpoint) {
      return;
    }

    try {
      await fetch(trackingEndpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
          Accept: 'application/json',
        },
        body: JSON.stringify({
          event_name: eventName,
          event_category: 'landing-page',
          event_label: label,
          event_value: value,
          metadata,
          session_id: state.sessionId,
        }),
        keepalive: true,
      });
    } catch (_) {
      // Tracking failure should not block user actions.
    }
  };

  const revealElements = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
        }
      });
    },
    { threshold: 0.15 }
  );

  revealElements.forEach((el) => observer.observe(el));

  document.querySelectorAll('.js-track').forEach((el) => {
    el.addEventListener('click', () => {
      postEvent(el.dataset.event || 'cta_click', el.dataset.label || '', 1, {
        href: el.getAttribute('href') || null,
      });
    });
  });

  const btnPresentation = document.getElementById('btn-presentation');
  const ctaVariantInput = document.getElementById('cta_variant');
  if (btnPresentation && ctaVariantInput) {
    btnPresentation.addEventListener('click', () => {
      ctaVariantInput.value = 'Jadwalkan Presentasi';
      btnPresentation.form?.requestSubmit();
    });
  }

  const trackScrollDepth = () => {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    if (docHeight <= 0) {
      return;
    }

    const depth = Math.round((scrollTop / docHeight) * 100);
    [25, 50, 75, 100].forEach((milestone) => {
      if (depth >= milestone && !state.sentMilestones.has(milestone)) {
        state.sentMilestones.add(milestone);
        postEvent('scroll_depth', `scroll_${milestone}`, milestone);
      }
    });
  };

  const throttle = (fn, delay) => {
    let timer = null;
    return () => {
      if (timer) {
        return;
      }
      timer = setTimeout(() => {
        fn();
        timer = null;
      }, delay);
    };
  };

  window.addEventListener('scroll', throttle(trackScrollDepth, 220), { passive: true });
  window.addEventListener('load', () => {
    postEvent('page_view', 'landing_home', 1, {
      path: location.pathname,
      title: document.title,
    });
  });
})();
