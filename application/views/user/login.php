<form action="" id="login"> <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4">

                                
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <span id="error-email"></span>
                                                <input type="email" name="email" id="email" class="form-control" />
                                                <label class="form-label" for="email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <span id="error-password"></span>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>

                                  <div id="message"></div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" id="submit"
                                                class="btn btn-primary btn-lg">Login</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>


  
<script>
 var baseurl = '<?php echo base_url(); ?>';
    $('#submit').on('click', function () { 
       
        $.ajax({
            
            url: baseurl + 'user/login',
            data: new FormData(document.querySelector('#login')),
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'post',
            beforeSend(xhr) {


            },
            success: function (result) {
                
                if(result.error==1){
                   
                  
                    if(result.error_message.email){
                      $('#error-email').html(result.error_message.email);
                    }else{
                        $('#error-email').html('');
                    }

                    if(result.error_message.password){
                      $('#error-password').html(result.error_message.password);
                    }else{
                        $('#error-password').html('');
                    }

                    $('#message').html(result.error_message.message);
                  
                   
                }else{
                   
                    $('#error-email').html('');
                    $('#error-password').html('');
                    $('#message').html(result.success_message.message);
                 
                }

              
             //   $('#success-message').html(result.message);

            }
        });
    });
</script>