// Когда пользователь прокручивает вниз 80px от верхней части документа, измените размер заполнения навигационной панели и размер шрифта логотипа
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (window.scrollY > 80) {
    document.getElementById("nav").style.height = "156px";
    document.getElementById("nav-bar").style.height = "156px";
    document.getElementById("nav-gamburger").style.height = "80px";

  }

  if (window.scrollY < 80) {
    document.getElementById("nav").style.height = "156px";
    document.getElementById("nav-bar").style.height = "156px";
    document.getElementById("nav").style.background = "none";
    document.getElementById("nav-gamburger").style.background = "none";
  }

  if (window.scrollY !== 0) {
    document.getElementById("nav").style.height = "110px";
    document.getElementById("nav").style.background = "#f5f5f5";
    document.getElementById("nav-bar").style.height = "110px";
    document.getElementById("nav-gamburger").style.background = "#f5f5f5";
  }
  
}

AOS.init();

[].forEach.call(document.querySelectorAll('a'), function (el) {
  el.addEventListener('click', function () {
    document.querySelector('input[type="checkbox"]').checked = false;
  });
});

[].forEach.call(document.querySelectorAll('label'), function (el) {
  el.addEventListener('click', function () {
    document.getElementById("nav-gamburger").style.background = "#f5f5f5";
  });
});

// Modal form (pure js)

// тут храним все элементы модалок
const modals = document.querySelectorAll('.mymodal')
// тут храним элемент активной модалки
let activeModal = null

// получаем все элементы при клике на которые должна открываться модалка
const modalOpeners = document.querySelectorAll('[data-mymodal]')

// функция закрытия модалки
const closeActiveModal = function () {
  if (!activeModal) return
  activeModal.classList.remove('active')
  activeModal = null
  document.body.style.overflow = 'auto' // возвращаем прокрутку страницы
}
// функция открытия модалки
const openActiveModal = function () {
  if (!activeModal) return
  activeModal.classList.add('active')
  document.body.style.overflow = 'hidden' // убираем прокрутку страницы
}

// пробегаемся по ним 
modalOpeners.forEach((element) => {
  // добавляем обработчик клика
  element.addEventListener('click', function (e) {
    // отменяем действия клика по умолчанию, чтобы не изменялся адрес при клике по ссылкам
    e.preventDefault()
    // читаем атрибут data-id, который соответствует айдишнику открываемой модалки
    const id = element.getAttribute('data-id')
    // получаем элемент модалки
    const modal = document.getElementById(id)
    // показываем путем добавления класса active
    activeModal = modal
    openActiveModal()
  })
})

// получаем все элементы закрывашек модалок
const modalCloseButtons = document.querySelectorAll('.mymodal__close')

modalCloseButtons.forEach((element) => {
  element.addEventListener('click', function (e) {
    e.preventDefault()
    // скрываем путем добавления класса active
    closeActiveModal()
  })
})

// Дополнительные фишки для модалок

// добавляем обработчик нажатия эскейпа, который будет закрывать активную модалку
document.addEventListener('keydown', function (event) {
  if (event.key === 'Escape' && activeModal) {
    closeActiveModal()
  }
})

// это для закрытия при клике по подложке модалки
modals.forEach((element) => {
  element.addEventListener('click', function (e) {
    e.preventDefault()
    // проверяем что кликнули именно по подложке, а не по дочернему элементу
    if (e.target === element) {
      closeActiveModal()
    }
  })
})

// табы
let prevTab = null
let prevContent = null

const tabs = document.querySelectorAll('.mytabs-nav__item')

const showTab = function (tab) {
  if (prevTab === tab) return;

  const id = activeTab.getAttribute('data-id')
  const content = document.querySelector(`.mytabs-content__item[data-id="${id}"]`)

  if (prevTab) prevTab.classList.remove('active')
  if (prevContent) prevContent.classList.remove('active')

  content.classList.add('active')
  tab.classList.add('active')
  prevContent = content
  prevTab = tab
}

tabs.forEach((element) => {
  element.addEventListener('click', function (e) {
    e.preventDefault()
    activeTab = element
    showTab(element)
  })
})

const tabOpeners = document.querySelectorAll('[data-mytab]')

tabOpeners.forEach((element) => {
  element.addEventListener('click', function (e) {
    const id = element.getAttribute('data-mytab')
    const tab = document.querySelector(`.mytabs-nav__item[data-id="${id}"]`)

    // эмулируем клик по табу
    tab.dispatchEvent(new Event('click'));
  })
})