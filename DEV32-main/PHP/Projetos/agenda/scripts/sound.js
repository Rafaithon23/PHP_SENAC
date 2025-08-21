const buttons = document.querySelectorAll('.menu2 a button');
buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        new Audio('../sounds/click.m4a').play();
    });
});
