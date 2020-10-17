
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
function onlyCapitalString(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
    if (key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) {
        return;
    }
    var ch = String.fromCharCode(theEvent.which);
    if (!(/[A-Z]/.test(ch))) {
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// ================================ replaced by Regxe function
// function filterNamesss(event) {
//     let inputID = event.target.id;
//     let inputName = event.target.name;
//     let inputValue = event.target.value.toLowerCase();
//     let tds = document.querySelectorAll('.' + inputName);
//     // ---------------------------------------------------
//     // to remove extra spaces in text
//     while (inputValue.indexOf('  ') > -1) {
//         inputValue = inputValue.replace('  ', ' ');
//     }
//     inputValue = inputValue.trim();
//     // ---------------------------------------------------
//     if (inputValue.indexOf(' ') > -1) {
//         let inputValueArr = inputValue.split(" ");
//         tds.forEach(td => {
//             // ------------------------------------
//             // to remove extra spaces in text
//             td_value = td.innerHTML.toLowerCase();
//             while (td_value.indexOf('  ') > -1) {
//                 td_value = td_value.replace('  ', ' ');
//             }
//             td_value = td_value.trim();

//             // ------------------------------------
//             td_value_arr = td_value.split(' ');
//             // ...............................
//             let test;
//             test = inputValueArr.every(val => td_value_arr.includes(val));
//             // ...............................

//             if (test) {
//                 td.parentNode.style.display = '';
//             } else {
//                 td.parentNode.style.display = 'none';
//             }
//         });
//     } else {
//         tds.forEach(td => {
//             if (td.innerHTML.toLowerCase().indexOf(inputValue) > -1) {
//                 td.parentNode.style.display = '';
//             } else {
//                 td.parentNode.style.display = 'none';
//             }
//         });
//     }
// }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// ================================
function filterNames(event) {
    let inputID = event.target.id;
    let inputName = event.target.name;
    let inputValue = event.target.value.toLowerCase();
    let tds = document.querySelectorAll('.' + inputName);
    // ---------------------------------------------------
    // to remove extra spaces in text
    while (inputValue.indexOf('  ') > -1) {
        inputValue = inputValue.replace('  ', ' ');
    }
    inputValue = inputValue.trim();
    // ---------------------------------------------------
    if (inputValue.indexOf(' ') > -1) {
        let inputValueArr = inputValue.split(" ");
        let testValue = '';
        inputValueArr.forEach(inputValue => {
            // testValue += '(' + inputValue + ')' + '.*?\\w?.*?';
            testValue += '(' + inputValue + ')' + '.*?';
        });
        tds.forEach(td => {
            let matchFound = new RegExp(testValue, 'gi').test(td.innerHTML.toLowerCase());
            if (matchFound) {
                td.parentNode.style.display = '';
            } else {
                td.parentNode.style.display = 'none';
            }
        });

    } else {
        tds.forEach(td => {
            let matchFound = new RegExp(inputValue, 'gi').test(td.innerHTML.toLowerCase());
            if (matchFound) {
                td.parentNode.style.display = '';
            } else {
                td.parentNode.style.display = 'none';
            }
        });
    }
}

// ================================
function activeatList(event) {
    event.target.nextElementSibling.classList.toggle('active');
}
// ---------------------------------------------------
function selectOption(event) {
    let labels = event.target.parentElement.parentElement.children;
    event.target.parentElement.parentElement.previousSibling.previousSibling.value = event.target.parentElement.innerText;
    event.target.parentElement.parentElement.classList.remove('active');
    event.target.parentElement.classList.add('selected-optin');
    for (let label of labels) {
        if (label.firstChild.checked) {
            label.classList.add('selected-optin');
        } else {
            label.classList.remove('selected-optin');
        }
    }
}
// ---------------------------------------------------
function filterSselect(event) {
    let labels = event.target.nextElementSibling.children
    let inputValue = event.target.value.toLowerCase();
    event.target.nextElementSibling.classList.add('active');
    // ---------------------------------------------------
    // to remove extra spaces in text
    while (inputValue.indexOf('  ') > -1) {
        inputValue = inputValue.replace('  ', ' ');
    }
    inputValue = inputValue.trim();
    // ---------------------------------------------------
    if (inputValue.indexOf(' ') > -1) {
        let inputValueArr = inputValue.split(" ");
        let testValue = '';
        inputValueArr.forEach(inputValue => {
            // testValue += '(' + inputValue + ')' + '.*?\\w?.*?';
            testValue += '(' + inputValue + ')' + '.*?';
        });
        for (let label of labels) {
            let matchFound = new RegExp(testValue, 'gi').test(label.innerText.toLowerCase());
            if (matchFound) {
                label.style.display = 'block';
            } else {
                label.style.display = 'none';
            }
        }
    } else {
        for (let label of labels) {
            let matchFound = new RegExp(inputValue, 'gi').test(label.innerText.toLowerCase());
            if (!matchFound) {
                label.style.display = 'none';
            } else {
                label.style.display = 'block';
            }
        }
    }
}
// ---------------------------------------------------
function checkSearchBoxValue(event) {
    let labels = event.target.nextElementSibling.children
    let inputValue = event.target.value.toLowerCase();
    let labels_text_arr = Array();
    let matchFound = false;
    for (let label of labels) {
        labels_text_arr.push(label.innerText.toLowerCase().trim());
    }
    // to remove extra spaces in text
    while (inputValue.indexOf('  ') > -1) {
        inputValue = inputValue.replace('  ', ' ');
    }
    inputValue = inputValue.trim();
    // to clear search box if not in the option
    for (let label of labels_text_arr) {
        if (labels_text_arr.includes(inputValue)) {
            matchFound = true;
        }
    }
    if (!matchFound) {
        event.target.value = '';
        for (let label of labels) {
            label.firstChild.checked = false;
        }
    }
    for (let label of labels) {
        if (!label.firstChild.checked) {
            label.classList.remove('selected-optin');
        }
    }
    // to close the list
    event.target.nextElementSibling.classList.remove('active');
}
// ================================
function filterSidebar(event) {
    let inputID = event.target.id;
    let inputName = event.target.name;
    let inputValue = event.target.value.toLowerCase();
    let tds = document.querySelectorAll('.sidebar-item');
    // ---------------------------------------------------
    // to remove extra spaces in text
    while (inputValue.indexOf('  ') > -1) {
        inputValue = inputValue.replace('  ', ' ');
    }
    inputValue = inputValue.trim();
    // ---------------------------------------------------
    if (inputValue.indexOf(' ') > -1) {
        let inputValueArr = inputValue.split(" ");
        let testValue = '';
        inputValueArr.forEach(inputValue => {
            // testValue += '(' + inputValue + ')' + '.*?\\w?.*?';
            testValue += '(' + inputValue + ')' + '.*?';
        });
        tds.forEach(td => {
            let matchFound = new RegExp(testValue, 'gi').test(td.innerHTML.toLowerCase());
            if (matchFound) {
                td.parentNode.style.display = '';
            } else {
                td.parentNode.style.display = 'none';
            }
        });

    } else {
        tds.forEach(td => {
            let matchFound = new RegExp(inputValue, 'gi').test(td.innerHTML.toLowerCase());
            if (matchFound) {
                td.parentNode.style.display = '';
            } else {
                td.parentNode.style.display = 'none';
            }
        });
    }
}
// ================================
function show_side_bar(event) {
    let sidebar = document.getElementById('sidebar');

    if (sidebar.classList.contains('active-side-bar')) {
        sidebar.classList.remove('active-side-bar');
    } else {
        sidebar.classList.add('active-side-bar');
    }
}