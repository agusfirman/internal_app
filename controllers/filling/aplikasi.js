
//ini untuk buat judul modal u filling
  function judul_filling(id){
        if(id!=0){
        $(".modal-title").text("Edit Filling");
        }else{
        $(".modal-title").text("Tambah Filling");
         }
     }

// ini untuk judul modal filling
 function judul_ufilling(id){
    if(id!=0){
        $(".modal-title").text("Edit U-Filling");
        }else{
        $(".modal-title").text("Tambah U-Filling");
         }
    }

        //ini untuk hapus data filling
        function hapus(ID) {
        var id  = ID;
        var nama_departemen  =$(this).attr("data-name");
        var pilih = confirm('Departemen akan dihapus'+ id);
        if (pilih==true) {
        $.ajax({
            type  : "POST",
            url   : "controllers/filling/hapus_filling.php",
            data  : "id="+id,
            success : function(data){
             location.reload();
          }
        });
     }
}

//jquery
$(document).ready(function(){
    //ini buat tombol tambah dan edit
    $(".t_filling,.e_filling").click(function(){
        //alert("test");
        var id = $(this).attr("data-id");
        $("#m_filling").modal('show');
        $.ajax({
            type    : "POST",
            url     : "controllers/filling/f_filling.php",
            data    : "id="+id,
            success : function(data){
                $(".modal-body").html(data);
                 judul_filling(id);
            }
        });
    }); 

    //in untuk simpan filling
    $('#b_simpan_filling').bind("click", function(event) {  
    
    var id  = $('input:hidden[name=id]');
    var nama_departemen = $('input:text[name=nm_dep]');
        
        var url="controllers/filling/simpan_filling.php";
        var string = $('#f_filling').serialize();
        //alert(string);
        $.ajax({
            type    : "POST",
            url     : url,
            data    : string,
            success : function(data){
                $("#m_filling").modal("hide");
                location.reload();
            }
            });

    });


    //ini untuk tambah u filling
 $(".t_ufilling").click(function(){
        var id_ufil = $(this).attr("data-id");
        $("#u_filling").modal('show');
        $.ajax({
            type    : "POST",
            url     : "controllers/filling/f_ufilling.php",
            data    : "id="+id_ufil,
            success : function(data){
                $(".modal-body").html(data);
                 judul_ufilling(id);
            }
        });
    }); 

    //ini untuk simpan ufilling
    $('#b_usimpan_filling').click(function(){
        var nama_dep    = $('select[name=nama_dep]');
        var Nama_File   = $('input:text[name=file]');
        var Gambar  = $('input:file[name=gambar]');
        var data = $('#f_ufilling   filling').serialize();
            alert(data);
    });
      
});
