
    <div class="card-body">
                 <div class="form-group">
                    <label>إسم المستفيد </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" إسم المستفيد" value="{{ old('name') }}">
                     @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>الكمية </label>
                    <input type="string" class="form-control @error('quantity') is-invalid @enderror" name="quantity"  placeholder=" الكمية" value="{{ old('quantity') }}">
                     @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label> إسم السلة  </label>
                      <select class="form-control  {{ $errors->has('basket_id') ? 'is-invalid' : '' }}" name="basket_id" id="basket_id">
                        <option value="">--</option>
                        @foreach($baskets as $id => $basket)
                        <option value="{{ $id }}" {{ (( old('basket_id'))) ? 'selected' : '' }}>{{ $basket }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>ملاحظات </label>
                    <input type="text" class="form-control" value="{{ old('note') }}" name="note" placeholder="ملاحظات ...">
                     {{-- @error('note')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror --}}
                  </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('exchange.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>