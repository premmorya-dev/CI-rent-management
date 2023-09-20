<div class="row" style="background-color:white;">
   <div class="col-md-9" id="list">
      <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
         style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
         aria-describedby="datatable_info">
         <thead>
            <tr role="row">
               <th class="sorting_desc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                  style="width: 189px;" aria-label="Name: activate to sort column ascending" aria-sort="descending">Room
                  No. </th>
               <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 286px;"
                  aria-label="Position: activate to sort column ascending">Room Name</th>
               <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 137px;"
                  aria-label="Office: activate to sort column ascending">Tenent Name</th>
               <th class="sorting text-center" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                  style="width: 137px;" aria-label="Office: activate to sort column ascending">Action</th>

            </tr>
         </thead>
         <tbody>

            <?php foreach ($rooms as $room) { ?>
               <tr class="odd">
                  <td class="dtr-control sorting_1" tabindex="0">
                     <?php echo $room['room_no']; ?>
                  </td>
                  <td class="dtr-control sorting_1" tabindex="0">
                     <?php echo $room['room_name']; ?>
                  </td>
                  <td class="dtr-control sorting_1" tabindex="0">
                     <?php echo $room['tenent_name']; ?>
                  </td>

                  <td class="text-center">
                     <a href="<?php echo $room['edit']; ?>" class="p-2"><i class="fa fa-edit" aria-hidden="true"
                           style="font-size: 15px;"></i></a>
                     <a href="<?php echo $room['delete']; ?>" room_no="<?php echo $room['room_no']; ?>"
                        class="p-2 delete"><i class="fa fa-trash" aria-hidden="true"
                           style="font-size: 15px; color:red;"></i></a>
                  </td>

               </tr>
            <?php } ?>


         </tbody>
      </table>

      <div class="clearfix">


         <div id="pagination">
            <?php echo $pagination; ?>
         </div>
         <?php echo $result ?>

      </div>
   </div>

   <div class="col-md-3">

      <div class="card">
         <div class="card-body">
            <h3 class="filter-title">Filter</h3>
<form id="filter">
            <div>
               <div class="mb-4">
                  <label for="validationCustom01" class="form-label">Room No.</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="Room No." name="filter_room_no" value=""
                     required="">
               </div>
               <div class="mb-4">
                  <label for="validationCustom01" class="form-label">Room Name</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="Room Name" name="filter_room_name" value=""
                     required="">
               </div>
               <div class="mb-4">
                  <label for="validationCustom01" class="form-label">Tenent Name</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="Tenent Name" name="filter_tenent_name" value=""
                     required="">
               </div>
            </div>
            <button type="submit" id="filter-form" class="btn btn-primary waves-effect waves-light me-1 filter-button">
            <i class="fa fa-filter" aria-hidden="true"></i> Filter
                                                    </button>
            </form>
         </div>

       
      </div>
   </div>

</div>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript">

   <?php if ($this->session->flashdata('success')) { ?>
      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
   <?php } else if ($this->session->flashdata('error')) { ?>
         toastr.error("<?php echo $this->session->flashdata('error'); ?>");
   <?php } else if ($this->session->flashdata('warning')) { ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
   <?php } else if ($this->session->flashdata('info')) { ?>
               toastr.info("<?php echo $this->session->flashdata('info'); ?>");
   <?php } ?>

</script>


<script type="text/javascript">

$('#filter-form').on('click',function(e){
	e.preventDefault();    console.log('asdfa'); 
   var baseurl = '<?php echo base_url(); ?>';
   var from_url = baseurl + 'Room/test';

   $.ajax({

            url: from_url,
            data: new FormData(document.querySelector('#filter')),
            dataType: 'html',
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend(xhr) {


            },
            success: function (result) {               
               console.log(result);
               $('#list').html();
            
            }
           });


});

   $('.delete').on('click', function (e) {
      e.preventDefault();
      var id = $(this).attr('room_no');
      var baseurl = '<?php echo base_url(); ?>';
      var from_url = baseurl + 'room/delete';

      $.ajax({

         url: from_url,
         data: { room_no: id },
         dataType: 'json',
         type: 'POST',
         beforeSend(xhr) {


         },
         success: function (result) {
            console.log(result);
            location.reload();

         }
      });


   });



</script>