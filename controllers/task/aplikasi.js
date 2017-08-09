$(document).ready(function(){ 
 

// end fungsi ubah judul




//end fungsi kirim data ke modal


      // $("#b_cat_task").click(function(event){
      //   event.preventDefault();
      //   var string = $("#f_task_cat").serialize();
      //   var nama_task_cat = $("input:text[name=nama_task_cat]");
      //   var url = "models/task/simpan_task_cat.php";
      //    //alert(nama_task_cat.val()); 
      //    if(nama_task_cat.val().length==0){
      //     alert('nama masih kosong');
      //    nama_task_cat.focus();
      //    return false;
      //   }
      //    simpan_cat(url,string);
      // });   

// end fungsi tombol simpan modal


   

//end simpan data dari modal

          




//   $(".t_cat_task,.e_cat_task").click(function(){
//     var id = $(this).attr("data-id");
//     $("#m_cat_task").modal('show');
//     $.ajax({
//       type  : "POST",
//       url   : "controllers/task/f_cat_task.php",
//       data  : "id="+id,
//       success : function(data){
//         $(".modal-body").html(data);
//          judul_m_cat_task(id);
//       }
//     });
//   }); 
  

//     $(".t_detail").click(function(){
//     var id = $(this).attr("data-id");
//     $("#m_detail").modal('show');
//     $.ajax({
//       type  : "POST",
//       url   : "mod/task/f_task.php",
//       data  : "id="+id,
//       success : function(data){
//         $(".modal-body").html(data);
//          judul_m_task(id);
//       }
//     });
//   }); 




// $('#task_cat').change(function(event) {
//   var url='mod/task/ambil_kat.php';
//   var id_task = $("#task_cat").val();
//   var main = 'mod/task/ambil_kat.php';
//   $.ajax({
//     type  : "POST",
//     url   : url,
//     data  : "id_task="+id_task,
//     success : function(data){
//       //alert(data);
//       $("#spek").html(data);
//     }
//   }); 
// });






}); 