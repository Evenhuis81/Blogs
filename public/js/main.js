function category() {
    // debugger;
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
        // document.getElementById("checkall").setAttribute('disabled', 'disabled');
        // document.getElementById("checkall").setAttribute('checked', 'checked');
        document.getElementById("checkall").disabled = true;
        document.getElementById("checkall").checked = true;
    } else {
        // document.getElementById("checkall").removeAttribute('disabled');
        // document.getElementById("checkall").removeAttribute('checked');
        document.getElementById("checkall").disabled = false;
        document.getElementById("checkall").checked = false;
    }
    loadDoc(catarrpush);
}

function checkall() {
    // document.getElementById("checkall").setAttribute('disabled', '');
    document.getElementById("checkall").disabled = true;
    let catarray = document.getElementsByClassName("sortcat");

    for (let element of catarray) {
        element.checked = false;
    }
    loadDoc(catarrpush);
}

function loadDoc(arrr) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bloggies").innerHTML = this.responseText;
        }
    };
    // xhttp.open("GET", "ajax.php", true);
    xhttp.open("GET", "ajax?numbers=" + arrr, true);
    xhttp.send();
}

// function indexDefault() {
//     var output = ''

// }