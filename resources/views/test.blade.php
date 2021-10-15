@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Coupon</h5>
    <div class="card-body">
      <form method="post" action="{{route('coupon.store')}}">
        {{csrf_field()}}
        <div class="form-group">
        <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"  value="{{old('code')}}" class="form-control">
        @error('code')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-control">
                        <option value="fixed">Fixed</option>
                        <option value="percent">Percent</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inputTitle" class="col-form-label">Value <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"  value="{{old('value')}}" class="form-control">
                    @error('value')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="inputTitle" class="col-form-label">Service Type<span class="text-danger">*</span></label>
                    <select name="our_service" class="form-control" onChange="load_services()">
                        <option value="" data-src="">All</option>
                        <!-- <option value="doctor" data-src="doctor">Doctor Booking</option> -->
                        <option value="covid" data-src="covid">Covid Test</option>
                        <option value="lab_test" data-src="lab_test">Lab Test</option>
                    </select>

                    @error('test')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="lab_test_box box1 col-md-4">
                    <label for="inputTitle" class="col-form-label">Lab<span class="text-danger">*</span></label>
                    <select name="lab_id" id="tests" class="form-control" onChange="load_tests()">
                        <option value="">All</option>
                        @foreach($lab as $key => $test)
                            <option value="{{$test->id}}" data-name="{{$test->description}}">{{$test->description}}</option>
                        @endforeach
                    </select>
                    @error('test')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="covid_test_box box1 col-md-4">
                    <label for="inputTitle" class="col-form-label">Service Detail<span class="text-danger">*</span></label>
                    <select name="test_id" id="tests" class="form-control">
                        <option value="">All</option>
                        @foreach($covid_test as $key => $test)
                            <option value="{{$test->id}}" data-name="{{$test->description}}">{{$test->description}}</option>
                        @endforeach
                    </select>
                    @error('test')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>

          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    function load_services(){

        let service = $('[name="our_service"]').val();
        if(service == "")
        {
            $('.lab_test_box').hide();
            $('.covid_test_box').hide();
        }
        else if(service == "doctor")
        {
            $('.lab_test_box').hide();
            $('.covid_test_box').hide();
        }
        else if(service == "covid")
        {
            $('.lab_test_box').hide();
            load_covid();
            $('.covid_test_box').show();
        }
        else{
            $('.lab_test_box').show();
            load_tests();
            $('.covid_test_box').show();
        }
               
        console.log("service",service);
    }

    function load_tests(){
        let lab_id = $('[name="lab_id"]').val() ? $('[name="lab_id"]').val() : 0;
        $.ajax('{{url("/fetch/lab/test")}}/'+lab_id).then((data)=>{
            if(data.test)
            {   let str = `<option value="">All</option>`;
                data.test.forEach((d)=>{
                    str += `<option value="${d.id}">${d.description}</option>`
                })  

                $('[name="test_id"]').html(str);
            }
        })
    }
    
    function load_covid(){
        let lab_id = $('[name="lab_id"]').val();
        $.ajax('{{url("/fetch-covid-test")}}').then((data)=>{
            if(data.test)
            {   let str = `<option value="">All</option>`;
                data.test.forEach((d)=>{
                    str += `<option value="${d.id}">${d.description}</option>`
                })  

                $('[name="test_id"]').html(str);
            }
        })
    }

    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('.lab_test_box').hide();
        $('.covid_test_box').hide();
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
//Additional Code
    $(document).ready(function(){
        // $("select").change(function(){
        //     $(this).find("option:selected").each(function(){
        //         var optionValue = $(this).attr("data-src");
        //         if(optionValue){
        //             $(".box1").not("." + optionValue).hide();
        //             $("." + optionValue).show();
        //         } else{
        //             $("." + optionValue).show();
        //         }
        //     });
        // }).change();
    });

    $(document).ready(function(){
        // $("select").change(function(){
        //     $(this).find("option:selected").each(function(){
        //         var optionValue = $(this).attr("data-name");
        //         if(optionValue){
        //             $(".box").not("." + optionValue).hide();
        //             $("." + optionValue).show();
        //         } else{
        //             $(".box").hide();
        //         }
        //     });
        // }).change();
    });

</script>
@endpush