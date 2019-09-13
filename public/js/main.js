// const button = document.getElementById('btn111');
// const paragraph = document.getElementById('para111');

// button.addEventListener('click', updateButton);
function bundel(id) {
    alert('hi');
    // event.preventDefault();
    // console.log(id);
}


function updateButton() {
    if (button.value === 'Start machine') {
        button.value = 'Stop machine';
        paragraph.textContent = 'The machine has started!';
    } else {
        button.value = 'Start machine';
        paragraph.textContent = 'The machine is stopped.';
    }
}


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
        // document.getElementById("checkall").setAttribute('disabled', 'disabled');
        // document.getElementById("checkall").setAttribute('checked', 'checked');
        document.getElementById("checkall").disabled = true;
        document.getElementById("checkall").checked = true;
        loadDocFull();
    } else {
        // document.getElementById("checkall").removeAttribute('disabled');
        // document.getElementById("checkall").removeAttribute('checked');
        document.getElementById("checkall").disabled = false;
        document.getElementById("checkall").checked = false;
        loadDoc(catarrpush);
    }

}

function checkall() {
    // document.getElementById("checkall").setAttribute('disabled', '');
    document.getElementById("checkall").disabled = true;
    let catarray = document.getElementsByClassName("sortcat");

    for (let element of catarray) {
        element.checked = false;
    }
    loadDocFull();
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

function loadDocFull() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bloggies").innerHTML = this.responseText;
        }
    };
    // xhttp.open("GET", "ajax.php", true);
    xhttp.open("GET", "ajax2", true);
    xhttp.send();
}

function checkpremfunc(blogid) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("checkprem").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "/checkprem/" + blogid, true);
    let csrfToken = getMeta('csrf-token');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhttp.send();
    // document.myform.submit();
}

function getMeta(metaName) {
    const metas = document.getElementsByTagName('meta');

    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute('name') === metaName) {
            return metas[i].getAttribute('content');
        }
    }

    return '';
}

function test(sel) {
    // var optval = document.getElementById('optval').textContent;
    var optionvalue = sel.value;
    var neww = document.getElementById(optionvalue);
    var neww2 = document.getElementById('s' + sel.value).innerHTML;
    console.log(sel.value);

    // document.getElementById('msg').innerHTML = optionvalue + " already has it!";
    // document.getElementById('btnx').disabled = true;
}