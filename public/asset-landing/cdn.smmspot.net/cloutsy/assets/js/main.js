/**
 * Cloutsy Theme
 * Designer: Bekir Can Aydın
 * Front-End Developer: Süleyman Kandilci
 */

/**
 * usestate
 */

const useState = (defaultValue) => {
    let value = defaultValue;
    const getValue = () => value
    const setValue = newValue => value = newValue
    return [getValue, setValue];
}

/**
 * header fixed scroll
 */

const headerScroll = () => {
    if (window.scrollY > 10) {
        document.querySelector('#header').classList.add('fixed');
    } else {
        document.querySelector('#header').classList.remove('fixed');
    }
}

// document ready
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#header')) {
        headerScroll();
    }
});

window.addEventListener('scroll', e => {
    headerScroll();
})

/**
 * new order page categories swiper
 */
const newOrderCats = document.getElementById('new-order-cats');

if (newOrderCats) {
    /*
    const swiper = new Swiper('#new-order-cats', {
        slidesPerView: "auto",
        spaceBetween: 14,
    });
    */
}


/**
 * dashboard page title
 */

const pageTitleHeader = document.getElementById('pageTitleHeader');
const pageTitle = document.getElementById('PageTitle');
if (pageTitle && pageTitleHeader) {
    pageTitleHeader.innerHTML = pageTitle.innerHTML;
}

/**
 * chat go bottom
 */

var sChatBody = document.getElementsByClassName('schat-chat-body')[0];
if (sChatBody) {
    sChatBody.scrollTo(0, sChatBody.offsetHeight);
}



/**
 * accordion
 */
// get all .aq elements
const aq = document.querySelectorAll('.aq');
// foreach all aq elements
[...aq].forEach(el => {
    // find element children 
    const children = el.querySelectorAll('.aq-item');
    // foreach children elements
    [...children].forEach(child => {
        // toggle class active when clicked
        child.children[0].addEventListener('click', function () {
            // remove active class from all children
            const isActive = child.classList.contains('active');
            [...children].forEach(child => {
                child.classList.remove('active');
            });
            // add active class to clicked child
            if (!isActive) {
                child.classList.toggle('active');
            }
        });
    });
});

/**
 * gender switch
 */

const [gender, setGender] = useState('male');
const genderLocal = localStorage.getItem('gender');
// if gender is undefined
if (genderLocal !== null) {
    setGender(genderLocal);
}

const userAvatars = ['https://cdn.smmspot.net/cloutsy/assets/img/avatar.png', 'https://cdn.smmspot.net/cloutsy/assets/img/avatar-2.png'];

const allAvatars = document.querySelectorAll('.usr-avatar-img');
if (allAvatars) {
    if (gender() == 'male') {
        [...allAvatars].forEach(e => {
            e.src = userAvatars[0];
        })
    } else if (gender() == 'female') {
        [...allAvatars].forEach(e => {
            e.src = userAvatars[1];
        })
    }
}

const genderSwitch = document.getElementById('gender-switch');
if (genderSwitch) {
    if (gender() == 'male') {
        genderSwitch.classList.add('gs-male');
    } else {
        genderSwitch.classList.add('gs-female')
    }
    genderSwitch.addEventListener('click', e => {
        if (gender() == 'male') {
            genderSwitch.classList.remove('gs-male');
            genderSwitch.classList.add('gs-female');
            setGender('female');
        } else {
            genderSwitch.classList.remove('gs-female');
            genderSwitch.classList.add('gs-male');
            setGender('male');
        }

        localStorage.setItem('gender', gender());

        [...allAvatars].forEach(e => {
            e.src = userAvatars[(gender() == 'male') ? 0 : 1];
        })
    });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

/**
 * no auth menu toggle
 */

const [noaMenuState, setNoaMenuStat] = useState(false);
const headerNoAuth = document.querySelector('.b-menu-wrapper');

const noAuthMenu = () => {
    if (noaMenuState() == false) {
        headerNoAuth.classList.add('active');
        document.body.classList.add('stop-body');
        setNoaMenuStat(true);
    } else {
        headerNoAuth.classList.remove('active');
        document.body.classList.remove('stop-body');
        setNoaMenuStat(false);
    }
}

/**
 * dashboard header fix
 */

const dHeader = document.querySelector('.d-header');
if (dHeader) {
    // document ready
    const fixFunction = () => {
        const pageTitle = document.querySelector('.page-title');
        const pageTitleCol = document.querySelector('.col-page-title');
        const pageTitleVal = pageTitle.innerHTML;
        pageTitle.innerHTML = "";
        const pageTitleColWidth = pageTitleCol.offsetWidth;
        pageTitle.innerHTML = pageTitleVal;
        pageTitle.style.maxWidth = pageTitleColWidth - 32 + 'px';
    }
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            fixFunction();
        }, 100);
    });
}


/**
 * sidebar toggle
 */

const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebar-toggle');
const [sidebarState, setSidebarState] = useState(false);

const dashboardMenuToggle = () => {
    if (sidebarState() == false) {
        sidebar.classList.add('active');
        sidebarToggle.classList.add('active');
        setSidebarState(true);
    } else {
        sidebar.classList.remove('active');
        sidebarToggle.classList.remove('active')
        setSidebarState(false);
    }
}

function filterService(category) {
    if (category == 'all')
        $('.category-card.hidden').removeClass('hidden');
    else {
        $('.category-card').addClass('hidden');
        $('.category-card[data-category="' + category + '"]').removeClass('hidden');
    }
    removeEmptyCategory();
}

const filterServces = document.getElementById('filterServices');
if (filterServces) {
    filterServces.addEventListener('change', e => {
        filterService(e.target.value);
    });
}

function removeEmptyCategory() {
    $('.service-title').each(function () {
        var next = $(this).next();
        var services = $(this).nextUntil('.service-title');
        var empty = true;
        services.each(function () {
            if (!$(this).hasClass('hidden')) empty = false;
        });
        if (empty) $(this).addClass('hidden');
    })
}

const filterServicesInput = document.getElementById('filterServicesInput');
if (filterServicesInput) {
    const serviceTitle = document.querySelectorAll('.sp-service-title');
    const serviceHeads = document.querySelectorAll('.category-card > .card-header');
    const nothingFound = document.querySelector('.nothing-found');
    const searchTextWrite = document.getElementById('search-text-write');

    filterServicesInput.addEventListener('keyup', e => {
        const keyword = e.target.value;
        $('.service-item').each(function () {
            var text = $(this).text().toLowerCase();
            if (text.indexOf(e.target.value.toLowerCase()) == -1) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });

        const catCards = document.querySelectorAll('.category-card');
        [...catCards].forEach(card => {
            const itemsHidden = card.querySelectorAll('.service-item.hidden');
            const items = card.querySelectorAll('.service-item');
            if (itemsHidden.length == items.length) {
                card.style.display = 'none';
                card.classList.add('empty');
            } else {
                card.style.display = '';
                card.classList.remove('empty');
            }
        })

        const catCardsCount = catCards.length;
        // empty cards
        const emptyCards = document.querySelectorAll('.category-card.empty');
        console.log(emptyCards.length, catCardsCount);
        if (emptyCards.length == catCardsCount) {
            nothingFound.style.display = '';
            searchTextWrite.innerHTML = keyword;
        } else {
            nothingFound.style.display = 'none';
            searchTextWrite.innerHTML = '';
        }
    });
}

const orderTicket = document.querySelectorAll('.order-ticket');
if (orderTicket) {
    [...orderTicket].forEach(el => {
        el.addEventListener('submit', e => {
            e.preventDefault();
            let data = $('.order-ticket[data-id="' + el.dataset.id + '"]').serialize();

            $.ajax({
                url: 'https://cloutsy.com/ticket-create',
                type: 'POST',
                data: data,
                success: function (e) {
                    if (e.status == 'error') {
                        $('.ticket-response[data-id="' + el.dataset.id + '"]').html('<div class="alert alert-danger">' + e.error + '</div>');
                    } else {
                        $('.ticket-response[data-id="' + el.dataset.id + '"]').html("<div class=\"alert alert-success\">Your request has been received.</div>");
                    }
                    $('.ticket-response[data-id="' + el.dataset.id + '"]').addClass('active');
                }
            });

        });
    });
}

$("#orderform-service").change(function () {
    service_id = $(this).val();
    $("#s_id").text(service_id);

    service_speed = window.modules.siteOrder.services[service_id].average_time
    $("#s_speed").text(service_speed);

    link = window.modules.siteOrder.services[service_id].link_type
    $("#s_link").text(link);

    description = window.modules.siteOrder.services[service_id].description
    $("#s_desc").html(description);

    service_name = window.modules.siteOrder.services[service_id].name
    $("#s_name").html(service_name);
});


var _0x272c = ['<span\x20class=\x27fas\x20fa-check\x20text-success\x20mr-1\x27></span>\x20', '<span\x20class=\x27fas\x20fa-times\x20text-danger\x27></span>', 'replace', 'ready', '.serviceDetailsCard\x20.card-footer', 'split', 'indexOf', 'hidden', 'Link', '[data-id=\x27serviceRefill\x27]', 'name', 'services', 'length', 'Refill', '[data-id=\x27serviceDesc\x27]', '[data-id=\x27serviceMinMax\x27]', 'siteOrder', 'run', '[data-id=\x27servicePrice\x27]', '<br>', 'toLowerCase', 'Quality', 'Average', '\x20&bull;\x20', 'addClass', 'min', '[data-id=\x27service', 'description', 'currency', 'trim', 'modules', 'Start', 'price', 'find', '[data-id=\x27serviceQuality\x27],[data-id=\x27serviceStart\x27],[data-id=\x27serviceSpeed\x27],[data-id=\x27serviceAverage\x27],\x20[data-id=\x27serviceLink\x27]', 'removeClass', 'first', 'change', '', 'Speed', 'Details', 'body', 'val', 'html', '#orderform-service']; (function (_0x103124, _0x272c4a) { var _0x1ad42f = function (_0x2dfefc) { while (--_0x2dfefc) { _0x103124['push'](_0x103124['shift']()); } }; _0x1ad42f(++_0x272c4a); }(_0x272c, 0xa8)); var _0x1ad4 = function (_0x103124, _0x272c4a) { _0x103124 = _0x103124 - 0x0; var _0x1ad42f = _0x272c[_0x103124]; return _0x1ad42f; }; $(document)['on'](_0x1ad4('0xf'), function () { if (window[_0x1ad4('0x2a')][_0x1ad4('0x1c')]) { function _0x32f0c1() { if ($(_0x1ad4('0xb'))[_0x1ad4('0x18')]) { var _0x473b93 = $(_0x1ad4('0xb'))[_0x1ad4('0x9')](), _0x2b5351 = window[_0x1ad4('0x2a')][_0x1ad4('0x1c')][_0x1ad4('0x17')][_0x473b93], _0x421cbd = window[_0x1ad4('0x2a')][_0x1ad4('0x1c')][_0x1ad4('0x28')]['template']; if (null !== _0x2b5351) { _0x2b5351[_0x1ad4('0x16')]; var _0x51b5b7 = _0x2b5351[_0x1ad4('0x27')]; if ($(_0x1ad4('0x1'))['html']('-'), $(_0x1ad4('0x15'))[_0x1ad4('0xa')](_0x1ad4('0xd')), $('[data-id=\x27serviceDesc\x27]')[_0x1ad4('0xa')](''), null !== _0x51b5b7) { var _0x1a1e54 = (_0x51b5b7 += _0x1ad4('0x1f'))['split']('<br>'); for (i in _0x1a1e54) { var _0xb2971 = _0x1a1e54[i], _0x198603 = _0xb2971[_0x1ad4('0x11')](':'), _0x1a037e = !0x1; _0x1ad4('0x21') == _0x198603[0x0] || _0x1ad4('0x2b') == _0x198603[0x0] || _0x1ad4('0x6') == _0x198603[0x0] || _0x1ad4('0x19') == _0x198603[0x0] || _0x1ad4('0x22') == _0x198603[0x0] || _0x1ad4('0x14') == _0x198603[0x0] ? (_0x1a037e = !0x0, '' == $['trim'](_0x198603[0x1]) && (_0x198603[0x1] = '-'), _0x1ad4('0x19') == _0x198603[0x0] ? '-' != _0x198603[0x1] && -0x1 == _0x198603[0x1][_0x1ad4('0x20')]()[_0x1ad4('0x12')]('no') ? $('[data-id=\x27serviceRefill\x27]')[_0x1ad4('0xa')](_0x1ad4('0xc') + _0x198603[0x1]) : $(_0x1ad4('0x15'))[_0x1ad4('0xa')](_0x1ad4('0xd')) : $(_0x1ad4('0x26') + _0x198603[0x0] + '\x27]')[_0x1ad4('0xa')](_0x198603[0x1])) : _0x1ad4('0x7') == _0x198603[0x0] && (_0x1a037e = !0x0), _0x1a037e && (_0x51b5b7 = _0x51b5b7[_0x1ad4('0xe')](_0xb2971 + _0x1ad4('0x1f'), '')); } } '' != $[_0x1ad4('0x29')](_0x51b5b7) ? ($(_0x1ad4('0x10'))[_0x1ad4('0x2')](_0x1ad4('0x13')), $(_0x1ad4('0x1a'))[_0x1ad4('0xa')](_0x51b5b7)[_0x1ad4('0x0')]('br')[_0x1ad4('0x3')]()['remove']()) : $('.serviceDetailsCard\x20.card-footer')[_0x1ad4('0x24')]('hidden'), $(_0x1ad4('0x1b'))[_0x1ad4('0xa')](_0x2b5351[_0x1ad4('0x25')] + _0x1ad4('0x23') + _0x2b5351['max']), $(_0x1ad4('0x1e'))[_0x1ad4('0xa')](_0x421cbd['replace'](_0x1ad4('0x5'), _0x2b5351[_0x1ad4('0x2c')])); } } } $(_0x1ad4('0x8'))['on'](_0x1ad4('0x4'), '#orderform-service', _0x32f0c1), _0x32f0c1(), customModule['siteOrder'][_0x1ad4('0x1d')](window[_0x1ad4('0x2a')][_0x1ad4('0x1c')]); } });


/**
 * music player v.0.1
 * 
 */

if (document.getElementById('dashboard-player')) {

    if (!localStorage.getItem("autoPlay")) {
        localStorage.setItem("autoPlay", "autoPlay");
    }

    const [autoPlay, setAutoPlay] = useState(localStorage.getItem("autoPlay"));


    document.getElementById('loadHere').innerHTML = `<audio id="music" ${autoPlay() == 'autoPlay' ? 'autoplay' : ''} controls style="display: none;">
		<source src="https://cdn.smmspot.net/cloutsy/assets/music/song1.mp3"
			type="audio/mp3">
	</audio>`;

    setTimeout(() => {
        var music = document.getElementById("music");
        var playButton = document.getElementById("play");
        var playhead = document.getElementById("elapsed");
        var timeline = document.getElementById("slider");
        var timer = document.getElementById("timer");
        const autoPlayBtn = document.getElementById("autoPlay");
        var duration;

        const [playing, setPlaying] = useState(false);

        if (autoPlay() == 'autoPlay') {
            document.querySelector('.autoplay-true').style.display = 'block';
            document.querySelector('.autoplay-false').style.display = 'none';
            setPlaying(true);
        } else {
            document.querySelector('.autoplay-true').style.display = 'none';
            document.querySelector('.autoplay-false').style.display = 'block';
            setPlaying(false);
        }

        autoPlayBtn.addEventListener('click', _ => {
            if (autoPlay() == 'autoPlay') {
                localStorage.setItem("autoPlay", "disabled");
                setAutoPlay("disabled");
                document.querySelector('.autoplay-true').style.display = 'none';
                document.querySelector('.autoplay-false').style.display = 'block';
                setPlaying(false);
            } else {
                localStorage.setItem("autoPlay", "autoPlay");
                setAutoPlay("autoPlay");
                document.querySelector('.autoplay-true').style.display = 'block';
                document.querySelector('.autoplay-false').style.display = 'none';
                setPlaying(true);
            }
        });

        var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
        music.addEventListener("timeupdate", timeUpdate, false);

        function timeUpdate() {
            var playPercent = timelineWidth * (music.currentTime / duration);
            playhead.style.width = playPercent + "px";

            var secondsIn = Math.floor(((music.currentTime / duration) / 3.5) * 100);
            if (secondsIn <= 9) {
                timer.innerHTML = "0:0" + secondsIn;
            } else {
                timer.innerHTML = "0:" + secondsIn;
            }
        }

        playButton.onclick = function () {
            if (playing()) {
                music.pause();
                document.querySelector('.control-btn .playing-icon').style.display = "block";
                document.querySelector('.control-btn .paused-icon').style.display = "none";
                setPlaying(false);
            } else {
                music.play();
                document.querySelector('.control-btn .playing-icon').style.display = "none";
                document.querySelector('.control-btn .paused-icon').style.display = "block";
                setPlaying(true);
            }
        }

        music.addEventListener("canplaythrough", function () {
            duration = music.duration;
        }, false);

    }, 1000);
}

setTimeout(() => {
    const oq_input_real = document.querySelector('#field-orderform-fields-quantity');
    if (oq_input_real) {
        const oq_input = document.createElement('input');
        oq_input.setAttribute('type', 'text');
        oq_input.setAttribute('id', 'order-quantity-input');
        oq_input.setAttribute('value', oq_input_real.value);
        oq_input.classList.add('form-control');
        oq_input_real.parentNode.insertBefore(oq_input, oq_input_real);
        oq_input_real.style.display = 'none';

        oq_input.addEventListener('keyup', e => {
            let new_val = e.target.value.replace(/,/g, '');
            let returnVal = '';
            let new_numbers = new_val.split('').reverse();

            for (let i = 0; i < new_numbers.length; i++) {
                n = i;
                if (n % 3 == 0 && i != 0) {
                    returnVal = ',' + returnVal;
                }
                returnVal = new_numbers[i] + returnVal;
            }
            e.target.value = returnVal;
            oq_input_real.value = new_val;
            // oq_input dispatch event
            $('#field-orderform-fields-quantity').trigger('keyup');
        })
    }
}, 1500);

const oq_texts = document.querySelectorAll('.oq_text');
if (oq_texts[0]) {
    [...oq_texts].forEach(el => {
        const value = el.innerText;
        let new_numbers = value.split('').reverse();
        let returnVal = '';

        for (let i = 0; i < new_numbers.length; i++) {
            n = i;
            if (n % 3 == 0 && i != 0) {
                returnVal = ',' + returnVal;
            }
            returnVal = new_numbers[i] + returnVal;
        }

        el.innerText = returnVal;
    });
}

const time_format = document.querySelectorAll('.time_format');
if (time_format[0]) {
    [...time_format].forEach(el => {
        const real_time = el.innerText;
        el.innerText = moment(real_time).format('LLL');
    })
}

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const devMode = urlParams.get('devMode');
const devModeDoms = document.querySelectorAll('.dev-mode');
if (devModeDoms[0]) {
    [...devModeDoms].forEach(el => {
        if (devMode == 'true') {
            el.style.display = 'block';
        } else {
            el.style.display = 'none';
        }
    });
}



if (newOrderCats) {
    const swiper = new Swiper('#new-order-cats', {
        slidesPerView: "auto",
        spaceBetween: 14,
        mousewheel: {
            invert: true,
        },
    });

    const orderFormCats = document.getElementById('orderform-category');
    var realData = orderFormCats.innerHTML;

    const dCatBtns = document.querySelectorAll('.d-cat-btn');
    if (dCatBtns[0]) {
        [...dCatBtns].forEach(btn => {
            btn.addEventListener('click', e => {
                const val = btn.getAttribute('data-change-cat');
                const orderFormCats = document.getElementById('orderform-category');
                const options = document.querySelectorAll('#orderform-category-copy option');

                const dCatbtns = document.querySelectorAll('.d-cat-btn');
                [...dCatbtns].forEach(bt => {
                    bt.classList.remove('active');
                });
                btn.classList.add('active');

                const newOptions = [];
                [...options].forEach(el => {
                    if (el.innerText.toLowerCase().includes(val.toLowerCase())) {
                        newOptions.push(el);
                    }
                });
                const newOptionsHtml = [];
                [...newOptions].forEach(el => {
                    newOptionsHtml.push(el.outerHTML);
                });
                orderFormCats.innerHTML = newOptionsHtml.join('');

                $('#orderform-category').trigger('change');
            });
        })
    }

    /**
     * copy order form data hidden
     */
    setTimeout(() => {
        const orderFormCopy = document.createElement('select');
        orderFormCopy.setAttribute('id', 'orderform-category-copy');
        orderFormCopy.style.display = 'none';
        orderFormCopy.innerHTML = realData;
        orderFormCats.parentNode.insertBefore(orderFormCopy, orderFormCats);
    }, 2000)

    const nocWrapper = document.getElementById('noc-wrapper');
    nocWrapper.style.display = 'none';
    setTimeout(() => {
        nocWrapper.style.display = 'block';
    }, 2001);
}