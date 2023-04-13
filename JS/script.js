const items = document.querySelector('.nav_items');
const opennav = document.querySelector('#open_nav-btn');
const closenav = document.querySelector('#close_nav-btn');

const opennavbtn = () => {
    items.style.display = 'flex';
    opennav.style.display = 'none';
    closenav.style.display = 'inline-block';
}

const closebtn = () => {
    items.style.display = 'none';
    opennav.style.display = 'inline-block';
    closenav.style.display = 'none';
}

opennav.addEventListener("click", opennavbtn);
closenav.addEventListener("click", closebtn);

const sidebar = document.querySelector('aside');
const showsidebar = document.querySelector('#show_sidebar-btn');
const hidesidebar = document.querySelector('#hide_sidebar-btn');

const showbar = () => {
    sidebar.style.left = '0';
    showsidebar.style.display = 'none';
    hidesidebar.style.display = 'inline-block';
}

const hidebar = () => {
    sidebar.style.left = '-100%';
    showsidebar.style.display = 'inline-block';
    hidesidebar.style.display = 'none';
}
showsidebar.addEventListener("click", showbar);
hidesidebar.addEventListener("click", hidebar);