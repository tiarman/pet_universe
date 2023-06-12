@extends('layouts.admin')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/admin2/dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Create new animal</h2>
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="mb-3 text-right col-lg-12 col-md-12 col-xl-12">
                                    <a href="{{route('animal.list')}}" class="brn btn-success btn-sm">List of animal</a>
                                </div>
                            </div>

                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif
                            <form action="{{route('animal.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" placeholder="Enter name" value="{{ old('name') }}"
                                                   class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Stock Quantity</label>
                                            <input type="text" name="stock_quantity" placeholder="Enter stock quantity" value="{{ old('stock_quantity') }}"
                                                   class="form-control @error('stock_quantity') is-invalid @enderror">
                                            @error('stock_quantity')
                                            <strong class="text-danger">{{ $errors->first('stock_quantity') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Category<span class="text-danger">*</span></label>
                                            <select name="category_id" id="category_id"  class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($categories as $e)
                                                    <option value="{{ $e->id }}" @if(old('category_id') == $e->category_name) selected @endif>{{ ucfirst($e->category_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Sub Category<span class="text-danger">*</span></label>
                                            <select name="subcategory_id" id="subcategory_id"  class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="">Choose a category Status</option>
                                                @foreach($subcategory as $e)
                                                    <option value="{{ $e->id }}" @if(old('subcategory_id') == $e->subcategory_name) selected @endif>{{ ucfirst($e->subcategory_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <strong class="text-danger">{{ $errors->first('subcategory_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>


                                



                                    

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Thumbnail <label class="text-danger">*</label></label>
                                            <input type="file" name="image"  placeholder="Slider image" value="{{ old('image') }}"
                                                   class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="mt-2 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Status<span class="text-danger">*</span></label>
                                            <select name="status"  class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Choose a status</option>
                                                @foreach(\App\Models\Product::$statusArrays as $statys)
                                                    <option value="{{ $statys }}"
                                                            @if(old('status') == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Pickup Point<span class="text-danger">*</span></label>
                                            <select name="pickup_point_id" id="pickup_point_id"  class="form-control @error('pickup_point_id') is-invalid @enderror">
                                                <option value="">Choose a Pickup Point</option>
                                                @foreach($pickup_point as $e)
                                                    <option value="{{ $e->id }}" @if(old('pickup_point_id') == $e->pickup_point_name) selected @endif>{{ ucfirst($e->pickup_point_name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('pickup_point_id')
                                            <strong class="text-danger">{{ $errors->first('pickup_point_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Purchase Price</label>
                                            <input type="text" name="purchase_price" placeholder="Enter purchase price" value="{{ old('purchase_price') }}"
                                                   class="form-control @error('purchase_price') is-invalid @enderror">
                                            @error('purchase_price')
                                            <strong class="text-danger">{{ $errors->first('purchase_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    




                                    
                                </div>

                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Selling Price</label>
                                            <input type="text" name="selling_price" placeholder="Enter selling price" value="{{ old('selling_price') }}"
                                                   class="form-control @error('selling_price') is-invalid @enderror">
                                            @error('selling_price')
                                            <strong class="text-danger">{{ $errors->first('selling_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Discount Price</label>
                                            <input type="text" name="discount_price" placeholder="Enter discount price" value="{{ old('discount_price') }}"
                                                   class="form-control @error('discount_price') is-invalid @enderror">
                                            @error('discount_price')
                                            <strong class="text-danger">{{ $errors->first('discount_price') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Product Details</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                
                                    <div class="text-right col-sm-12">
                                        <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')

  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.select2').select2({
        tags: true,
      })
    })
  </script>

  <script>
    $('select[name="category_id"]').change(function () {
        const $this = $('select[name="subcategory_id"]')
        var idCategory = this.value;
        $this.html('');
        $.ajax({
          url: "{{url('api/fetch-subcategory')}}/" + idCategory,
          type: "GET",
          dataType: 'json',
          success: function (result) {
            $this.html('<option value="">Choose a district</option>');
            $.each(result.subcategories, function (key, value) {
              $this.append('<option value="' + value
                .id + '">' + value.subcategory_name + '</option>');
            });
          }
        });
      });
  </script>

@endsection
