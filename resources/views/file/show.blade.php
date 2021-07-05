@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

        <div class="card card-style">

            <div class="divider mb-0"></div>
            <div class="gallery-view-controls">
                <a href="#" class="color-highlight gallery-view-1"><i class="fa fa-th"></i></a>
                <a href="#" class="gallery-view-2"><i class="fa fa-th-large"></i></a>
                <a href="#" class="gallery-view-3"><i class="fa fa-bars"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="content my-n1">
                <div class="gallery-views gallery-view-1">
                    
                    @foreach($files as $file)
                      @if($file->count() > 0)
                        @if($file->file_extension == "pdf")    
                          <a class="text-center" href="{{asset('storage/' . $file->pathfile)}}" target="_blank">
                            <div class="rounded-m preload-img ">
                                <img src="{{asset('images/document/svg/pdf.svg')}}"
                                    class="p-2 rounded-m preload-img w-75" alt="img">
                            </div>
                            <p class="text-center mx-0">{{$file->name}}</p>
                          </a>
                        @elseif($file->file_extension == 'docx' || $file->file_extension == 'doc')
                            <a class="text-center" href="{{asset('storage/' . $file->pathfile)}}" target="_blank">
                            <div class="rounded-m preload-img ">
                                <img src="{{asset('images/document/svg/doc.svg')}}"
                                    class="p-2 rounded-m preload-img w-75" alt="img">
                            </div>
                            <p class="text-center mx-0">{{$file->name}}</p>
                          </a>
                        @else
                          <a class="text-center" data-gallery="gallery-1" href="{{asset('storage/' . $file->pathfile)}}" title="{{$file->name}}" >
                            <div class="rounded-m preload-img ">
                                <img src="{{asset('storage/' . $file->pathfile)}}" style="height: auto;width:55%;"
                                    data-src="{{asset('storage/' . $file->pathfile)}}"
                                    class="p-2 rounded-m preload-img" alt="img">
                            </div>
                            <p class="text-center mx-0">{{$file->name}}</p>
                          </a>
                        @endif
                      @else
                      <div>
                       <p>
                        There is no file, create a new one
                      </p>
                      </div>
                      @endif
                    @endforeach
                </div>
            </div>
        </div>
    
    </div>
</div>





@endsection

@section('content2')

        <a href="#" data-menu="menu-upload"
            class="btn px-0 mb-3 rounded-xl text-uppercase font-900 shadow-s border-highlight  bg-highlight" style="
                position: fixed; 
                width: 50px; 
                height: 50px; 
                bottom: 60px; 
                right: 20px; 
                border-radius: 50px; 
                writing-mode: vertical-rl;">

            <table style="width:100%;height:100%;background-color: #1b1d2100!important;border:none">
                <tr>
                    <td style="text-align:center;vertical-align:middle;background-color: #1b1d2100!important;border:none">
                        <i class="fas fa-plus" style="
                            font-size: 18px;
                            text-align: center;"></i>
                    </td>
                </tr>
            </table>

        </a>


        <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="225"
            data-menu-effect="menu-parallax">
            <div class="menu-title text-center mt-4">
                <h4>File Management</h4>
            </div>
            <div class="list-group list-custom-small ps-2 me-4">
                <a href="#" data-menu="menu-sharing">
                    <i class="font-14 fa fa-share color-gray-dark"></i>
                    <span class="font-13">Share with</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <div class="list-group list-custom-small ps-2 me-4">
                <a href="/file/{{$id_folder}}/createFile">
                    <i class="font-14 fa fa-file-upload color-gray-dark"></i>
                    <span class="font-13">Upload File</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <div class="list-group list-custom-small ps-2 me-4">
                <a href="/file">
                    <i class="font-14 fa fa-folders color-gray-dark"></i>
                    <span class="font-13">Back to folder list</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <div id="menu-sharing" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="650" data-menu-effect="menu-parallax">
            <div class="menu-title mt-n1">
                <h1>Sharing Folder</h1>
                <p class="color-highlight">Add Registered Users to the list.</p>
                <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
            </div>
            
            <div class="content mt-2">
            <div class="divider mb-3"></div>
              <form class="needs-validation" id="addUserSharingForm" novalidate>
                @csrf
                  <div class="input-style input-style-always-active has-borders mb-4">
                    <input type="hidden" id="id_folder" class="id_folder" name="id_folder" value="{{$id_folder}}">

                    <select class="form-select form-control" aria-label="Default select example" id="userTo" name ="userTo">
                        <option selected>Select User..</option>
                        @foreach($users as $user)
                            <option  value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center">
                      <button type="submit" id="submitUserSharing" class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add</button>
                    </div>
                  </div>
              </form>
              <div class="card card-style">
                  <div class="content mb-2" style="height: 260px;overflow-y: scroll;">
                      <h3 class="mb-2">List of Sharing Users</h3>
                      <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                      <thead>
                          <tr>
                          <th scope="col" class="bg-dark-dark border-dark-dark color-white">Users</th>
                          <th scope="col" class="bg-dark-dark border-dark-dark color-white">Phone No.</th>
                          <th scope="col" class="bg-dark-dark border-dark-dark color-white">Action</th>
                          </tr>
                      </thead>
                      <tbody id="tbl-usersharing">
                          
                      </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
        <div id="menu-delete-user" class="menu menu-box-modal rounded-m" data-menu-width="310" data-menu-height="270">
            <div class="text-center"><i class="fal fa-times-circle color-red-light mt-4" style="font-size: 45px;"></i></div>
            <h1 class="text-center mt-3">Are You Sure?</h1>
            <p class="ps-3 pe-3 text-center color-theme opacity-60">
                Do you realy want to delete the record ? This action cannot be undone.
            </p>
            <form class="needs-validation" novalidate id="deleteUserForm">
                <input type="hidden" name="idUserDelete" id="idUserDelete">
                <button type="submit" id="delete-user"
                  class="btn btn-m font-900 text-uppercase bg-highlight rounded-sm btn-center-l">Confirm</button>
            </form>
          </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
        let id_folder = document.getElementById('id_folder').value;
        getAllUserSharing(id_folder)
      $("#submitUserSharing").change(function(e){
        e.preventDefault()
      })

      $('#deleteUserForm').on('submit', function (event) {
        
        event.preventDefault();
        if (navigator.onLine) {
            var formElement = $(this);
  
            var formdata = new FormData();
            formdata.append("_method", "DELETE");
  
            // Loop over them and prevent submission if validation fail
            Array.prototype.slice.call(formElement)
                .forEach(function (formValidate) {
                    if (!formValidate.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        let form = new FormData(formElement[0]);
                        let btnSubmitForm = $('#delete-user');
  
                        btnSubmitForm.addClass('off-btn').trigger('classChange');
                        // var deleteTerrainId = $('#idTerrainDelete').val();
  
                        fetch("folderUserSharing/" + form.get('idUserDelete') + "/", {
                                method: 'DELETE',
                                credentials: "same-origin",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                            })
                            .then(function (response) {
                                return response.json();
                            }).then(function (resultsJSON) {
  
                                var results = resultsJSON
                                console.log(results.status)
                                if (results.status == 'success') {
  
  
                                    btnSubmitForm.removeClass('off-btn').trigger('classChange');
  
                                    menu('menu-delete-user', 'hide', 250);
  
                                    snackbar(results.status, results.message)
  
                                    getAllUserSharing(id_folder)
  
                                } else {
                                    if (results.type == 'Validation Error') {
                                        btnSubmitForm.removeClass('off-btn').trigger('classChange');
  
                                        validationErrorBuilder(results);
                                    } else {
                                        snackbar(results.status, results.message)
                                    }
                                }
  
                            })
                            .catch(function (err) {
                                console.log(err);
                            });
  
  
                    }
                    formValidate.classList.add('was-validated');
                });
        } else {
            menu('menu-offline', 'show', 250);
        }
        });

    //Add User
  $('#addUserSharingForm').on('submit', function (event) {
    event.preventDefault();
    if (navigator.onLine) {
    var formElement = $(this);
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(formElement)
        .forEach(function (formValidate) {
            if (!formValidate.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            } else {
                let form = formElement[0];
                let btnSubmitForm = $('#submitUserSharing');

                btnSubmitForm.addClass('off-btn').trigger('classChange');

                fetch("folderUserSharing/store", {
                        method: 'POST',
                        credentials: "same-origin",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        body: new FormData(form),
                    })
                    .then(function (response) {
                        return response.json();
                    }).then(function (resultsJSON) {

                        var results = resultsJSON

                        if (results.status == 'success') {

                            getAllUserSharing(id_folder);

                            btnSubmitForm.removeClass('off-btn').trigger('classChange');

                            snackbar(results.status, results.message)

                            form.reset();

                        } else {
                            if (results.type == 'Validation Error') {
                                btnSubmitForm.removeClass('off-btn').trigger('classChange');

                                validationErrorBuilder(results);
                            } else {
                                snackbar(results.status, results.message)
                            }
                        }

                    })
                    .catch(function (err) {
                        console.log('Error Share to User: ' + err);
                    });
            }

            formValidate.classList.add('was-validated');
        });
    } else {
        menu('menu-offline', 'show', 250);
    }
    });
///////////////////////////////////////////////////////////////////////
    })



function getAllUserSharing(id_folder) {
      fetch('folderUserSharing/'+ id_folder).then(function (response) {
          console.log('masuk')
          return response.json();
      }).then(function (resultsJSON) {

        var results = resultsJSON

        if (results.status == 'success') {

            if (results.data) {
                if (results.data.length) {


                    if (document.querySelector('#tbl-usersharing')) {
                        $('#tbl-usersharing').html('');

                        results.data.map(user => {
                            $('#tbl-usersharing').append(`
                            <tr class="bg-dark-light">
                            <th scope="row">${user.user_to.name}</th>
                            <th scope="row">${user.user_to.phone_number}</th>
                            <td>
                            <a class="deleteUser" data-iduser="${user.id}" href="#"><i class="far fa-trash-alt color-red-dark"></i></a>
                            </td>
                            </tr>
                        `);
                        });

                        $('.deleteUser').on('click', function () {
                            let idUser = $(this).data('iduser');
                            console.log(idUser);
                            $('#idUserDelete').val(idUser);
                            menu('menu-delete-user', 'show', 250);
                        })

                    }


                } else {
                    $('#tbl-usersharing').html('');
                }
            }

        } else {
            if (results.type == 'Validation Error') {
                validationErrorBuilder(results);
            } else {
                snackbar(results.status, results.message)
            }
        }

      }).catch(function (err) {
          console.log('Error Get All Users: ' + err);
      });
}
  </script>
@endpush