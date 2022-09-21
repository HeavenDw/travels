//Меню бургер
const menuClick = document.querySelector('.header__mobile');
const iconMenu = document.querySelector('.menu__icon');
const menuBody = document.querySelector('.header__menu');
const bg = document.querySelector('.mainscreen__bg');
if (iconMenu){
    menuClick.addEventListener('click', function(e) {
        iconMenu.classList.toggle('_active');
        menuBody.classList.toggle('_active');
        bg.classList.toggle('_active');
        document.body.classList.toggle('_lock');
    });
}

bg.addEventListener('click', closeMenu);
function closeMenu() {
    if (iconMenu.classList.contains('_active')){
        iconMenu.classList.remove('_active');
        menuBody.classList.remove('_active');
        bg.classList.remove('_active');
        document.body.classList.remove('_lock');
    };
}

//Smoth scroll
//находим все элементы с классом .menu__link и атт data-goto, помещаем их в список gotoLinks
const gotoLinks = document.querySelectorAll('a[data-goto]');
//проверяем, что список не пустой
if (gotoLinks.length > 0) {
    //вешаем на каждый элемент списка слушатель по клику, при клике запускаю функцию
    gotoLinks.forEach(gotoLink => {
        gotoLink.addEventListener('click', ongotoLinkClick);
    });

    //функция скролла
    function ongotoLinkClick(e) {
        //чекаем объект по которому кликнули на наличие атт data-goto и записываем его в gotoLink
        const gotoLink = checkTarget(e.target);
        
        //проверяем не пустой ли атт и есть ли элементы, которые подходят по описанию из атт
        if(gotoLink.dataset.goto && document.querySelector(gotoLink.dataset.goto)) {
            //записываем в переменную блок, до которого надо проскролить
            const gotoBlock = document.querySelector(gotoLink.dataset.goto);
            //высчитываем верхней точки блока - высота шапки
            const gotoBlockValue = gotoBlock.getBoundingClientRect().top + pageYOffset;

            //убираем активные классы, если при клике открыто меню
            closeMenu();

            //запускаем скролл до блока
            window.scrollTo({
                top: gotoBlockValue,
                behavior: "smooth"
            });
            //убираем обычное поведение ссылки
            e.preventDefault();
        }
    }

    //принимает на вход объект по которому кликнули
    function checkTarget(target) {
        //проверяет есть ли у объекта атт data-goto
        if(target.dataset.goto){
            //возвращает объект, если есть атт
            return target;
        }else {
            //возвращает ближайщую ссылку-родителя, если нет атт
            return target.closest('a');
        }
    }
}