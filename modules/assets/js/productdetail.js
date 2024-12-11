const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const tabs = $$('.tab_item');
const panes = $$('.tabs_pane');
tabs.forEach((tab, index) => {
    const pane = panes[index]
    tab.onclick = function () {


        $('.tab_item.active').classList.remove('active')
        $('.tab_item.bottom').classList.remove('bottom')
        $('.tabs_pane.active').classList.remove('active')
        this.style.transition = '0.2s ease-in-out'
        this.classList.add('active')
        this.classList.add('bottom')
        pane.classList.add('active')
    }
});