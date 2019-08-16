function category() {
    // if (document.getElementById("checkall").hasAttribute('checked')) {
    //     document.getElementById("checkall").removeAttribute('disabled');
    //     document.getElementById("checkall").removeAttribute('checked');
    //     let catarray = document.getElementsByClassName("sortcat");
    //     for (let index = 0; index < catarray.length; index++) {
    //         if (catarray[index].checked == true) {
    //             console.log(catarray[index].value);
    //         }

    //     }
    // }
    var catarrpush = [];
    var catarray = document.getElementsByClassName("sortcat");
    for (let index = 0; index < catarray.length; index++) {
        if (catarray[index].checked == true) {
            catarrpush.push(catarray[index].value);
        }

    }
    if (catarrpush.length == 0) {
        document.getElementById("checkall").setAttribute('disabled', '');
        document.getElementById("checkall").setAttribute('checked', '');
    } else {
        document.getElementById("checkall").removeAttribute('disabled');
        document.getElementById("checkall").removeAttribute('checked');
    }
}

function checkall() {
    document.getElementById("checkall").setAttribute('disabled', '');
    let catarray = document.getElementsByClassName("sortcat");

    for (let element of catarray) {
        element.checked = false;
    }
}