
  const weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];

  var months = ["Januari", "Februari", "Maret", "April", "Mai", "Juni", "Juli",
            "Agustus", "September", "October", "November", "December"];

  const date = new Date()

  let day = weekday[date.getDay()]

  let month = months[date.getMonth()]

  const today = day + "/" + month + "/" + date.getFullYear()

  let dateNavbar = document.querySelector(".tanggal-navbar")

  dateNavbar.innerHTML = today;

  function openNav(){
    document.querySelector(".sidebar").style.left = "0"
    document.querySelector(".right-container").style.marginLeft = "280px"
  }

  function closeNav(){
    document.querySelector(".sidebar").style.left = "-280px"
    document.querySelector(".right-container").style.marginLeft = "0"
  }

  function navButton(x) {
    if(x.classList.contains("change")){
        closeNav();
        x.classList.remove("change"); 
    }else{
       openNav();
       x.classList.add("change");
    }
  }

  window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        console.log("jQuery has loaded!");
    } else {
        // jQuery is not loaded
        console.log("jQuery has not loaded!");
    }
}

$(document).ready(function(){
    
    //Cari nama anggota berdasarkan id anggota
    $('#inputIdAnggota').change(function(){
        let id = $(this).val();
    //   alert(id);
        if(id != ""){
            $.ajax({
                url: 'cariNamaAnggota.php',
                method: "POST",
                data: {id : id},

                success:function(data){
                    $('#namaAnggota').html(data);
                }
            });
        }
    });

    //Cari nama buku berdasarkan id buku
    $('#inputIdBuku').change(function(){
        let id = $(this).val();
    //   alert(id);
        if(id != ""){
            $.ajax({
                url: 'cariBuku.php',
                method: "POST",
                data: {id : id},

                success:function(data){
                    $('#namaBuku').html(data);
                }
            });
        }
    });

    $('#exampleModal').on('show.bs.modal', function (e) {
        var idPeminjaman = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'modal_id_peminjaman.php', //Here you will fetch records 
            data :  'idPeminjaman='+ idPeminjaman, //Pass $id
            success : function(data){
            $('.id-peminjaman-modal').html(data);//Show fetched data from database
            }
        });
     });

});


