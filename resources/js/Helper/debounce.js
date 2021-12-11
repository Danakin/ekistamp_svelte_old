import {Inertia} from '@inertiajs/inertia';

let timer;

function debounce(callback, timeout = 500) {
    clearTimeout(timer);
    timer = setTimeout(() => {
        callback()
    }, timeout)
}

export default debounce
