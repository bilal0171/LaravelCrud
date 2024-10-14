<!-- resources/views/user_register.blade.php -->
@extends('layouts.master')

@section('title', 'User Registration')

@section('content')
<section>
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="post" action="{{ route('save') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-12 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <label for="profile" class="form-label"><strong>Profile Pic</strong></label>
                      <input type="file" name="profile" id="profile" class="form-control" required>
                    </div>

                    <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="name">Name</label>
                      <input type="text" name="name" class="form-control form-control-lg" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div data-mdb-input-init class="form-outline datepicker w-100">
                      <label for="dob" class="form-label">Birthday</label>
                      <input type="date" class="form-control form-control-lg" name="dob" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <h6 class="mb-2 pb-1">Gender: </h6>
                    <select name="gender" class="form-control form-control-lg" required>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="phone">Phone Number</label>
                      <input type="tel" name="phone" class="form-control form-control-lg" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">
                    <label class="form-label" for="address">Address</label>
                    <textarea name="address" cols="50" rows="5" class="form-control form-control-lg" required></textarea>
                  </div>
                </div>

                <div class="row form-group">
  <div class="col-12 col-md-12">
    <div class="control-group" id="fields">
      <label class="control-label" for="documents">Upload Supporting Documents</label>
      <div class="controls">
        <div class="entry input-group upload-input-group">
          <input class="form-control" name="documents[]" type="file">
          <button class="btn btn-upload btn-success btn-add" type="button">
            <i class="fa fa-plus"> </i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

                <div class="mt-4 pt-2">
                  <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit"><br><br>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('scripts')
<script>
    $(function () {
        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();
            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            newEntry.find('input').attr('name', 'documents[]');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"> </span>');
        }).on('click', '.btn-remove', function (e) {
            $(this).parents('.entry:first').remove();
            e.preventDefault();
            return false;
        });
    });
</script>
@endpush
@endsection
