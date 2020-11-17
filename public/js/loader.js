

window.addEventListener('load', (event) => {
    add_hidden(event);
});

const forms = document.querySelectorAll('form');
const btns = document.querySelectorAll('button');
for (let form of forms) {
    form.addEventListener('submit', (e) => {
        console.log(form);

        // document.querySelector('.loader').classList.remove('hidden');
        // form.children('button[type=submit]').prop('disabled', true);
        // for (let btn of btns) {
        //     btn.disabled = true;
        // }
    })
}
window.onload = (event) => {
    console.log('page is fully loaded');
    for (let btn of btns) {
        btn.addEventListener('click', () => {
            // console.log(btn.children);
            console.log(btn.firstElementChild.nodeName);
            console.log(btn.firstElementChild.className);

        })
    }
};





function add_hidden(event) {
    const loader = event.target.querySelector('.loader');
    loader.classList.add('hidden');
}


