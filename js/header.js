const btn_green = document.querySelector('.color_green');
const btn_red = document.querySelector('.color_red');
const btn_pink = document.querySelector('.color_pink');
const btn_blue = document.querySelector('.color_blue');

function toggleTheme(themeName){
    document.documentElement.className = themeName;
}

btn_green.addEventListener('click', (e) => {
    toggleTheme('green_theme');
})
btn_red.addEventListener('click', (e) => {
    toggleTheme('red_theme');
})
btn_pink.addEventListener('click', (e) => {
    toggleTheme('pink_theme');
})
btn_blue.addEventListener('click', (e) => {
    toggleTheme('blue_theme');
})