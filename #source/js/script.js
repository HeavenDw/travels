var lazyLoadInstance = new LazyLoad({
});

baguetteBox.run('._gallery');


//находим все ссылки на открытие табов
var tabOpeners = document.querySelectorAll('.open-tab');
//записываем первую ссылку
var firstTabOpener = tabOpeners[0];

//если есть ссылки
if(tabOpeners.length > 0) {
    //открываем первый таб
    openTab(firstTabOpener);
    //для каждой ссылки слушаем клик
    tabOpeners.forEach(tabOpener => {
        tabOpener.addEventListener('click', openTab);
    });

    //функция открытия таба
    function openTab(e) {
        //убираем активный класс у всех ссылок
        tabOpeners.forEach(tabOpener => {
            tabOpener.classList.remove('_active');
        });
        //присваем кликнутой ссылке актив
        if(e.target===undefined) {
            var tabOpener = e;
        } else {
            var tabOpener = e.target;
        };
        tabOpener.classList.add('_active');
        //находим фильтр из ссылки
        var tabFilter = tabOpener.dataset.tab;
        //находим все табы
        var tabs = document.querySelectorAll('.tab');
        //закрываем все табы
        tabs.forEach(tab => {
            tab.classList.remove('_open');
        });
        tabs.forEach(tab => {
            //если таб соответствует фильтру, то открываем
            if(tab.dataset.tab == tabFilter) {
                tab.classList.add('_open');
                //записываем слайдер и пагинацию текущего таба
                var slider = tab.querySelector('.swiper-container');
                var pag = tab.querySelector('.routes__pagination');
                //если слайдер не инициализировал, то инициазируем слайдер для каждого таба
                if(!tab.dataset.slider) {
                    new Swiper(slider, {
                        slidesPerView: 1,
                        pagination: {
                            el: pag,
                            clickable: true,
                        },
                        autoplay: {
                            delay: 3000,
                            stopOnLastSlide: true,
                            disableOnInteraction: true
                        },
                    });
                    tab.dataset.slider = true;
                };
            };
        });

        
        
    }
};

//открытие нижнего таба
const bottomOpeners = document.querySelectorAll('.bottomOpeners');
if(bottomOpeners.length > 0) {
    bottomOpeners.forEach(bottomOpener => {
        bottomOpener.addEventListener('click', openBottomTab);
    });

    function openBottomTab(e) {
        const elem = e.target;
        list = elem.closest('ul');
        list = list.querySelectorAll('li');
        list.forEach(li => {
            li.classList.remove('_active'); 
        });
        elem.classList.add('_active'); 
        const bottom = elem.closest('.routes__bottom');
        if(elem.dataset.filter == 'desc') {
            bottom.querySelector('.routes__pricetab').classList.remove('_open'); 
            bottom.querySelector('.routes__description').classList.add('_open'); 
        } else {
            bottom.querySelector('.routes__description').classList.remove('_open'); 
            bottom.querySelector('.routes__pricetab').classList.add('_open'); 
        };
    }
}

//скролл к нижнему таба при открытии
const btnOpen = document.querySelectorAll('._btn-open');
btnOpen.forEach(element => {
    element.addEventListener('click', function(e) {
        const tab = element.closest('.routes__tab');
        const bottom = tab.querySelector('.routes__bottom');
        element.classList.toggle('_active');
        bottom.classList.toggle('_open');
        const gotoBottomBlock = bottom.getBoundingClientRect().top + pageYOffset;
        window.scrollTo({
            top: gotoBottomBlock,
            behavior: "smooth"
        });
        e.preventDefault();
    });
});

//плейсхолдер для селекта в форме
const formSelect = document.querySelector('.wpcf7-select');
const firstSelectOption = formSelect.querySelector('option:first-child');
firstSelectOption.setAttribute('disabled', '');
firstSelectOption.setAttribute('hidden', '');
formSelect.onchange = function () {
    formSelect.classList.add('_selected');
};


//маска ввода телефона
var inputPhone = document.querySelector('.phone-mask');

var mask = new IMask(inputPhone, {
    mask: '+7 (000) 000-00-00',
    lazy: true,
    placeholderChar: '_'
});

inputPhone.addEventListener('focus', function() {
    mask.updateOptions({ lazy: false });
}, true);

inputPhone.addEventListener('blue', function() {
    mask.updateOptions({ lazy: true });
}, true);