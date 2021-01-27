(function(){
    console.log('masuk hehe');
    var url_in = 'absen/in';
    var url_out = 'absen/out';
    var message_elem = document.getElementById('message');
    var absen_btn = document.getElementById('absen-btn');
    var flag_elem = document.getElementById('type');

    function absenIn(){
        absen_btn.disabled = true;
        axios.post(url_in)
        .then(function(data){
            if(data.data.status === 'SUCCESS'){
                message_elem.innerHTML = data.data.message;
                message_elem.classList.add('blue-500');
                absen_btn.classList.add('btn-danger');
                absen_btn.innerHTML = 'ABSEN KELUAR';
                flag_elem.value = 'keluar';
            }
        })
        .catch(function(err){
            console.log('Gagal',err);
        })
        .finally(function(){
            absen_btn.disabled = false;
        })
    }

    function absenOut(){
        absen_btn.disabled = true;
        axios.post(url_out)
        .then(function(data){
            if(data.data.status === 'SUCCESS'){
                message_elem.innerHTML = data.data.message;
                message_elem.classList.add('red-500');
            }
        })
        .catch(function(err){
            console.log('Gagal',err);
        })
    }

    absen_btn.onclick = function(){
        var t = flag_elem.value;
        if(t === 'masuk'){
            absenIn();
        }
        else if(t === 'keluar'){
            absenOut();
        }
    }
})();
