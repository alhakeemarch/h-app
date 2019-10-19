// window._ = require('lodash');

// to refresh page without asking , after post ..
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

function onlyNumber(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }
    var ch = String.fromCharCode(theEvent.which);
    if (!(/[0-9]/.test(ch))) {
        theEvent.preventDefault();
    }
}
// ================================
function onlyString(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }
    var ch = String.fromCharCode(theEvent.which);
    // arabic letters will be in this group as regex [\u0621-\u064A\u0660-\u0669 ]+$
    if (!(/[a-z\u0621-\u064A\u0660-\u0669 ]/i.test(ch))) {
        theEvent.preventDefault();
    }
}
// ================================
function onlyArabicString(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }
    var ch = String.fromCharCode(theEvent.which);
    // arabic letters will be in this group as regex [\u0621-\u064A\u0660-\u0669 ]+$
    if (!(/[\u0621-\u064A\u0660-\u0669 ]/.test(ch))) {
        theEvent.preventDefault();
    }
}
// ================================
function onlyEnglishString(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }
    var ch = String.fromCharCode(theEvent.which);
    if (!(/[a-z ]/i.test(ch))) {
        theEvent.preventDefault();
    }
}
// ================================
function userNameString(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }

    let str = theEvent.target.value;
    if (theEvent.key === '(') {
        // event.target.value = str.replace('(', '');
        theEvent.target.value = str.replace(/\(/g, '');
    }
    if (theEvent.key === '&') {
        // event.target.value = str.replace('&', '');
        theEvent.target.value = str.replace(/\&/g, '');
    }
    if (theEvent.key === '%') {
        // event.target.value = str.replace('%', '');
        theEvent.target.value = str.replace(/\%/g, '');
    }
    if (theEvent.key === '.') {
        // event.target.value = str.replace('%', '');
        theEvent.target.value = str.replace(/\./g, '');
    }

    let str2 = theEvent.target.value;
    theEvent.target.value = str2.replace(/^[0-9]/g, '');

    var ch = String.fromCharCode(theEvent.which);
    if (!(/[a-z0-9_-]/.test(ch))) {
        theEvent.preventDefault();
    }
}