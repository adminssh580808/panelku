/**
   * Cloutsy Theme
   * Designer: Bekir Can Aydın
   * Front-End Developer: Süleyman Kandilci
   */

/**
   * usestate
   */

const nothing = 'nothing';



const qstr = window.location.search;
const urlPar = new URLSearchParams(qstr);


const dmo = urlPar.get('devMode');
const dmoDoms = document.querySelectorAll('.dev-mode');
if (dmoDoms[0]) {
  [...dmoDoms].forEach(el => {
    if (dmo == 'true') {
      el.classList.remove('dev-mode');
    } else {
      el.style.display = 'none';
    }
  });
}

const mncItems = document.querySelectorAll('.mnc-item');
if (mncItems[0]) {
  [...mncItems].forEach(el => {
    // if url has mnc href add active class
    if (el.getAttribute('href') == window.location.pathname) {
      el.classList.add('active');
    }
  });
}

const spModal = document.getElementById('sp-modal');
if (spModal) {
  const spModalCard = spModal.querySelector('.sp-modal-card');
  const spModalTitle = spModal.querySelector('.sp-modal-title');
  const spModalId = spModal.querySelector('.sp-modal-service-id');
  const spModalBodyCard = spModal.querySelector('.sp-modal-body-card');
  const spModalLink = spModal.querySelector('.sp-modal-link');

  // click event
  spModal.addEventListener('click', (e) => {
    // if target not spModalCard or children
    if (!spModalCard.contains(e.target) && !spModalTitle.contains(e.target) && !spModalId.contains(e.target) && !spModalBodyCard.contains(e.target) && !spModalLink.contains(e.target)) {
      spModalClose();
    }
  });

  var spModalClose = () => {
    spModal.classList.remove('active');
    spModalTitle.innerHTML = '';
    spModalId.innerHTML = '';
    spModalBodyCard.innerHTML = '';
    spModalLink.href = '';

    document.body.style.overflow = '';
  }

  var spModalOpen = (id, title, body, link) => {
    // stop scroll
    document.body.style.overflow = 'hidden';

    spModalTitle.innerHTML = title;
    spModalId.innerHTML = id;
    spModalBodyCard.innerHTML = body;
    spModalLink.href = link;
    spModal.classList.add('active');
  }
}

/**
 * order page bottom modal
 */

const opCards = document.querySelectorAll('.op-card');
if (opCards[0]) {
  [...opCards].forEach((card) => {
    if (card.dataset.isOpen == undefined) {
      card.dataset.isOpen = 'false';
    }

    const detailsButton = card.querySelector('.op-details-btn');
    const detailsModal = card.querySelector('.op-card--bottom');
    const closeButton = card.querySelector('.op-card--bottom-close');

    detailsButton.addEventListener('click', () => {
      detailsModal.style.display = 'block';
      detailsModal.style.transition = '.14s ease';
      setTimeout(() => {
        detailsModal.style.transform = 'translateY(0)';
      }, 10)
      card.dataset.isOpen = 'true';
    });

    closeButton.addEventListener('click', () => {
      detailsModal.style.transform = '';
      setTimeout(() => {
        detailsModal.style.display = 'none';
        detailsModal.style.transition = '';
        card.dataset.isOpen = false;
      }, 200);
    });
  });
}

/**
 * new order video pop up
 */
const nwoVideo = document.querySelector('.nwo-video');
if (nwoVideo) {
  const nwoShowed = localStorage.getItem('nwoShowed') ? localStorage.getItem('nwoShowed') : 'not showed';
  const closeBtn = nwoVideo.querySelector('.nwo-video-close');

  closeBtn.addEventListener('click', e => {
    console.log('closed');
    nwoVideo.innerHTML = '';
    nwoVideo.classList.remove('active');
  });

  if (nwoShowed != 'showed') {
    nwoVideo.classList.add('active');
    localStorage.setItem('nwoShowed', 'showed');
  }
}


/**
   * order refill and cancel
   */

const refillButtons = document.querySelectorAll('[data-refill]');
if (refillButtons[0]) {
  [...refillButtons].forEach(btn => {
    const btnText = btn.querySelector('span');
    const firstText = btnText.innerHTML;
    btn.addEventListener('click', e => {
      e.preventDefault();
      const url = btn.getAttribute('data-href');
      btn.setAttribute('disabled', 'disabled');
      btnText.innerHTML = 'Loading...';

      let reqHeader = new Headers();
      reqHeader.append('X-Requested-With', 'XMLHttpRequest');

      let initObject = {
        method: 'GET', headers: reqHeader,
      };

      var userRequest = new Request(url, initObject);

      fetch(userRequest).then(res => res.json()).then(res => {
        if (res.status == "success") {
          btnText.innerHTML = res.btn_text;
        } else {
          btnText.innerHTML = firstText;
          alert('Something went wrong' + res.error);
        }
      }).catch(err => {
        alert('Something went wrong:' + err);
      });
    });
  });
}

(function () {
  function onTidioChatApiReady() {
    const tidioIframe = document.getElementById('tidio-chat-iframe');
    const iBody = tidioIframe.contentWindow.document.querySelector('body');
    const maxW = 1500;
    const minW = 992;

    const zoomFix = () => {
      if (window.innerWidth < maxW && window.innerWidth > minW) {
        iBody.style.zoom = .8;
      } else {
        iBody.style.zoom = 1;
      }
    }

    zoomFix();

    window.addEventListener('resize', () => zoomFix());

  }
  if (window.tidioChatApi) {
    window.tidioChatApi.on("ready", onTidioChatApiReady);
  } else {
    document.addEventListener("tidioChat-ready", onTidioChatApiReady);
  }
})();